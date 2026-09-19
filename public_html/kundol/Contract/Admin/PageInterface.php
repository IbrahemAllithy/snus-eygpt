<?php

namespace App\Contract\Admin;

interface PageInterface
{
    public function all();

    public function show($page);

    public function store(array $parms);

    public function update(array $parms, $page);

    public function destroy($page);
}
