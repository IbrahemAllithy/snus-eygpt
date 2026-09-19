<?php

namespace App\Http\Controllers\API\Web;

use App\Contract\Web\WalletInterface;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class WalletController extends Controller
{
    private $WalletRepository;

    public function __construct(WalletInterface $WalletRepository)
    {
        $this->WalletRepository = $WalletRepository;
    }

    public function index(Request $request)
    {
        return $this->WalletRepository->all($request);
    }
}
