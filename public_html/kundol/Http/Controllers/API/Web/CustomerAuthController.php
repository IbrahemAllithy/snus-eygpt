<?php

namespace App\Http\Controllers\API\Web;

use App\Contract\Web\CustomerAuthInterface;
use App\Http\Controllers\Controller as Controller;
use App\Http\Requests\ChangeRequest;
use App\Http\Requests\CustomerLoginRequest;
use App\Http\Requests\CustomerStoreRequest;
use App\Http\Requests\ForgetRequest;
use App\Http\Requests\ResetRequest;
use App\Models\Admin\Customer;
use App\Models\Admin\Setting;
use App\Services\Admin\AccountService;
use App\Services\Admin\PointService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Mail;
use Session;
use Socialite;
use Twilio\Exceptions\TwilioException;
use Twilio\Rest\Client;

class CustomerAuthController extends Controller
{
    private $CustomerAuthRepository;

    private $callFromWeb = 0;

    public function __construct(CustomerAuthInterface $CustomerAuthRepository)
    {
        $this->CustomerAuthRepository = $CustomerAuthRepository;
    }

    public function register(CustomerStoreRequest $request)
    {
        $parms = $request->all();

        return $this->CustomerAuthRepository->store($parms);
    }

    public function forgetPassword(ForgetRequest $request)
    {
        $parms = $request->all();

        return $this->CustomerAuthRepository->forgetPassword($parms);
    }

    public function resetPassword(ResetRequest $request)
    {

        $parms = $request->all();

        return $this->CustomerAuthRepository->resetPassword($parms);
    }

    public function changePassword(ChangeRequest $request)
    {
        $parms = $request->all();

        return $this->CustomerAuthRepository->changePassword($parms);
    }

    public function login(CustomerLoginRequest $request)
    {
        if (auth()->guard('customer')->user() || $request->cookie('_customer_token')) {
            return response()->json(['status' => 'Warning', 'message' => 'Already logged in', '_token' => $request->cookie('_token')], 200);
        }

        $parms = $request->all();

        return $this->CustomerAuthRepository->login($parms);
    }

    public function Callback($provider)
    {
        $userSocial = Socialite::driver($provider)->stateless();
        if (isset($_GET['fromApp']) && $_GET['fromApp'] == '1') {
            $userSocial = $userSocial->userFromToken($_GET['code']);
            $callFromWeb = 0;
        } else {
            $userSocial = $userSocial->user();
            $callFromWeb = 1;
        }

        $users = Customer::where(['email' => $userSocial->getEmail()])->first();
        if ($users) {
            if ($callFromWeb == 1) {
                $users['callFromWeb'] = true;
                $returndata = $this->CustomerAuthRepository->loginWithProvider($users);
                $url = \URL::to('/');
                $url = $url.'/loginwithsocial?customer_id='.$users['id'].'first_name='.$returndata['first_name'].'&last_name='.$returndata['last_name'].'&email='.$returndata['email'].'&hash='.$returndata['hash'].'&token='.$returndata['token'];

                return redirect()->to($url);
            } else {
                return $this->CustomerAuthRepository->loginWithProvider($users);
            }

        } else {

            //return redirect()->to('https://aytlidergrup.ro/login?code='.$_GET['code'].'&scope='.$_GET['scope'].'&authuser='.$_GET['authuser'].'&prompt='.$_GET['prompt']);

            if ($userSocial->getEmail() == '') {
                $user_email = 'dummyaytemail'.rand(1, 10000000).'@gmail.com';
            } else {
                $user_email = $userSocial->getEmail();
            }
            $users = Customer::create([
                'first_name' => $userSocial->getName(),
                'last_name' => $userSocial->getName(),
                'email' => $user_email,
                'provider_id' => $userSocial->getId(),
                'provider' => $provider,
            ]);

            $accounts = new AccountService;
            $accounts->createAccount('CUSTOMER', $userSocial->getName(), $users->id, 'customer');

            $points = new PointService;
            $points->customerPoints($userSocial, $users->id);

            $welcome_template = Setting::where('key', ['welcome_email_template'])->pluck('value');
            $welcome_template = $welcome_template[0];

            $message = '';
            $email = $user_email;

            Mail::send('emails.welcome-email-template', ['welcome_template' => $welcome_template], function ($message) use ($email) {
                $message->to($email)
                    ->subject('Welcome');
            });

            if ($callFromWeb == 1) {
                $users['callFromWeb'] = true;
                $returndata = $this->CustomerAuthRepository->loginWithProvider($users);
                $url = \URL::to('/');
                $url = $url.'/loginwithsocial?customer_id='.$users['id'].'first_name='.$returndata['first_name'].'&last_name='.$returndata['last_name'].'&email='.$returndata['email'].'&hash='.$returndata['hash'].'&token='.$returndata['token'];

                return redirect()->to($url);

            } else {
                return $this->CustomerAuthRepository->loginWithProvider($users);
            }
        }
    }

    public function redirect($provider)
    {
        $this->callFromWeb = isset($_GET['from-web']) ? 1 : 0;
        if ($provider == 'facebook') {
            $fields = ['first_name', 'last_name', 'email', 'gender', 'verified'];
            $scopes = ['email'];

            return Socialite::driver($provider)
                ->fields($fields)->scopes($scopes)
                ->stateless()
                ->redirect();
        }
        if ($provider == 'google') {
            $scopes = [
                'https://www.googleapis.com/auth/plus.me',
                'https://www.googleapis.com/auth/plus.profile.emails.read',
            ];

            return Socialite::driver($provider)
                ->scopes($scopes)
                ->stateless()
                ->redirect();
        }

        return Socialite::driver($provider)
            ->stateless()
            ->redirect();

    }

    public function logout(Request $request)
    {
        $parms = $request->all();

        return $this->CustomerAuthRepository->logout($parms);
    }

    public function verifyNumber(Request $request)
    {
        $verify_number = Customer::where('phone_number', $request->contact_number)->first();
        if ($verify_number) {
            $parms = ['email' => $verify_number->email, 'password' => $verify_number->password, 'id' => $verify_number->id];

            return $this->CustomerAuthRepository->loginWithPhone($parms);
        } else {
            $this->sendCode($request->contact_number);

            return response()->json([
                'status' => 'error',
                'error' => 'number not verified',
                'message' => 'number not verified',
            ]);
        }

    }

    public function sendCode($parm)
    {
        $twilio_sid = Setting::where('key', 'twilio_sid')->first();
        $twilio_auth_token = Setting::where('key', 'twilio_auth_token')->first();
        $twilio_number = Setting::where('key', 'twilio_number')->first();

        $code = rand(1000, 9999);

        Session::put('verify_code', $code);
        Session::put('phone_number', $parm);

        $accountSid = $twilio_sid->value;
        $authToken = $twilio_auth_token->value;
        $twilioNumber = $twilio_number->value;
        $to = $parm;
        $message = 'your activation code is'.$code;

        $client = new Client($accountSid, $authToken);

        try {
            $client->messages->create(
                $to,
                [
                    'body' => $message,
                    'from' => $twilioNumber,
                    //   On US phone numbers, you could send an image as well!
                    //  'mediaUrl' => $imageUrl
                ]
            );
            Log::info('Message sent to '.$to);
        } catch (TwilioException $e) {
            Log::error(
                'Could not send SMS notification.'.
                ' Twilio replied with: '.$e
            );
        }
    }

    public function verifyCode(Request $request)
    {

        $code = Session::get('verify_code');
        if ($request->code == $code) {
            return response()->json([
                'status' => 'success',
                'error' => 'number verified',
                'message' => 'number verified',
            ]);

            // $msg["message"] = "verified";
            // return $msg;
        } else {
            return response()->json([
                'status' => 'error',
                'error' => 'number not verified',
                'message' => 'number not verified',
            ]);

            // $msg["message"] = "not verified";
            // return $msg;
        }
    }
}
