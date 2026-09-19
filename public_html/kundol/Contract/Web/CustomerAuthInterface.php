<?php

namespace App\Contract\Web;

interface CustomerAuthInterface
{
    public function store(array $parms);

    public function forgetPassword(array $parms);

    public function resetPassword(array $parms);

    public function changePassword(array $parms);

    public function loginWithProvider(array $parms);

    public function login(array $parms);

    public function loginWithPhone(array $parms);

    public function logout(array $parms);

    public function getCookieDetails($token);
}
