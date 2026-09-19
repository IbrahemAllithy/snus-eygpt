<?php

namespace App\Contract\Admin;

interface UserInterface
{
    public function all();

    public function show($user);

    public function store(array $parms);

    public function update(array $parms, $user);

    public function destroy($user);
}
