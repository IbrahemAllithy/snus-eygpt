<?php

namespace App\Contract\Admin;

interface MenuInterface
{
    public function all();

    public function show($menu);

    public function store(array $parms);

    public function update(array $parms, $menu);

    public function destroy($menu);
}
