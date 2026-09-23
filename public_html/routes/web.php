<?php

use App\Http\Controllers\LocalizationController;
use App\Http\Controllers\Web;
use App\Http\Middleware\GeneralMiddlwware;
use App\Http\Middleware\Installer;
use App\Mail\ContactUs;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
 */

// if(!file_exists(storage_path('installed'))){
// 	return redirect('/install');
// }

Route::get('contact-us-email', function () {
    $data = ['first_name' => 'Umar', 'last_name' => 'Aslam', 'email' => 'umar@abc.com', 'message' => 'lorem ipsum', 'phone' => ''];

    return (new ContactUs($data))->render();
});

// Route::get('install', function () {

// });

Route::get('clear', function () {
    Artisan::call('cache:clear');
    Artisan::call('config:clear');
    Artisan::call('config:cache');

});

Route::get('site-content', function () {
    return view('site-content');
})->name('site-content');

Route::any('admin/{all}', function () {
    return view('layouts.admin-master');
})
    ->where(['all' => '.*']);

// Route::group(['middleware' => ['general','installer']], function () {
//     Route::get('/', function () {
//         return redirect('/admin/login');
//     });
// });
Route::get('/hyperpay', [Web\IndexController::class, 'getcall']);

Route::middleware([GeneralMiddlwware::class, Installer::class])->group(function () {

    Route::get('/product/{id}/{slug}', [Web\IndexController::class, 'productDetail']);
    Route::get('/brand/{slug}', [Web\IndexController::class, 'brand'])->name('brand.show');
    Route::get('/shop', [Web\IndexController::class, 'shop']);
    Route::get('/cart', [Web\IndexController::class, 'cartPage']);
    Route::get('/blog-detail/{slug}', [Web\IndexController::class, 'blogDetail']);
    Route::get('/blog', [Web\IndexController::class, 'blog']);
    Route::get('/checkout', [Web\IndexController::class, 'checkout']);
    Route::get('/login', [Web\IndexController::class, 'login']);
    Route::get('/compare', [Web\IndexController::class, 'compare']);
    Route::get('/orders', [Web\IndexController::class, 'orders']);
    Route::get('/orders/{id}', [Web\IndexController::class, 'ordersDetail']);
    Route::get('/profile', [Web\IndexController::class, 'profile']);
    Route::get('/thankyou', [Web\IndexController::class, 'thankyou'])->name('thankyou');
    Route::get('/shipping-address', [Web\IndexController::class, 'shippingAddress']);

    Route::get('/wishlist', [Web\IndexController::class, 'wishlist']);
    Route::get('/change-password', [Web\IndexController::class, 'changePassword']);
    Route::get('/forget-password', [Web\IndexController::class, 'forgetPassword']);
    Route::get('/reset-password', [Web\IndexController::class, 'resetPassword']);

    Route::get('/page/{slug}', [Web\IndexController::class, 'page']);

    Route::get('/privacy', [Web\IndexController::class, 'privacy']);
    Route::get('/refund', [Web\IndexController::class, 'refund']);
    Route::get('/term', [Web\IndexController::class, 'term']);
    Route::get('/contact-us', [Web\IndexController::class, 'contactUs']);
    Route::get('/about-us', [Web\IndexController::class, 'aboutUs']);

    Route::get('set_currency/{currency}', [Web\IndexController::class, 'setCurrency']);
    Route::get('paytm-pay', [Web\IndexController::class, 'paytmPayment']);
    Route::get('order-web-view', [Web\IndexController::class, 'orderWebView']);
    Route::get('lang/{locale}', [LocalizationController::class, 'index']);

    Route::get('print-invoice/{id}', [Web\IndexController::class, 'printInvoice']);
    Route::get('show-invoice', function () {
        return view('invoice');
    });

    Route::get('/', [Web\IndexController::class, 'index']);

    Route::get('/product/{id}/{slug}', [Web\IndexController::class, 'productDetail']);
    Route::get('/shop', [Web\IndexController::class, 'shop']);
    Route::get('/cart', [Web\IndexController::class, 'cartPage']);
    Route::get('/blog-detail/{slug}', [Web\IndexController::class, 'blogDetail']);
    Route::get('/blog', [Web\IndexController::class, 'blog']);
    Route::get('/checkout', [Web\IndexController::class, 'checkout']);
    Route::get('/login', [Web\IndexController::class, 'login']);
    Route::get('/loginwithsocial', [Web\IndexController::class, 'loginwithsocial']);
    Route::get('/compare', [Web\IndexController::class, 'compare']);
    Route::get('/orders', [Web\IndexController::class, 'orders']);
    Route::get('/orders/{id}', [Web\IndexController::class, 'ordersDetail']);
    Route::get('/profile', [Web\IndexController::class, 'profile']);
    Route::get('/thankyou', [Web\IndexController::class, 'thankyou']);
    Route::get('/shipping-address', [Web\IndexController::class, 'shippingAddress']);

    Route::get('/wishlist', [Web\IndexController::class, 'wishlist']);
    Route::get('/change-password', [Web\IndexController::class, 'changePassword']);
    Route::get('/page/{slug}', [Web\IndexController::class, 'page']);
    Route::get('/privacy', [Web\IndexController::class, 'privacy']);
    Route::get('/refund', [Web\IndexController::class, 'refund']);
    Route::get('/term', [Web\IndexController::class, 'term']);
    Route::get('/contact-us', [Web\IndexController::class, 'contactUs']);
    Route::get('/about-us', [Web\IndexController::class, 'aboutUs']);

    Route::get('set_currency/{currency}', [Web\IndexController::class, 'setCurrency']);
    Route::post('paytm-pay', [Web\IndexController::class, 'paytmPayment']);
    Route::post('paytm_response', [Web\IndexController::class, 'paytmResponse']);
    Route::get('mollie-payment/{order_id}', [Web\IndexController::class, 'molliePayment']);
    Route::post('mollie-webhook', [Web\IndexController::class, 'mollieWebHook']);

    Route::get('order-web-view', [Web\IndexController::class, 'orderWebView']);
    Route::get('lang/{locale}', [LocalizationController::class, 'index']);

    Route::get('/payment-paystck/callback', [Web\IndexController::class, 'handleGatewayCallback'])->name('payment');
    Route::get('/payment-desgin', function () {
        return view('paymentdesign');
    });
    Route::get('update-settings-by-user', [Web\IndexController::class, 'updateSettingsByUser']);
    Route::get('reset-demo-settings', [Web\IndexController::class, 'ResetDemoSettings']);
    Route::get('reset-accounts', [Web\IndexController::class, 'seedFromExistingData']);
    Route::get('points', [Web\IndexController::class, 'points']);
    Route::get('wallet', [Web\IndexController::class, 'wallet']);
    Route::get('print-invoice/{id}', [Web\IndexController::class, 'printInvoice']);
    Route::get('show-invoice', function () {
        return view('invoice');
    });
});
