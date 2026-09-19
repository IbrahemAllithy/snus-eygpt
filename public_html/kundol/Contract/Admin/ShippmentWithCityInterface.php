<?php

namespace App\Contract\Admin;

interface ShippmentWithCityInterface
{
    public function all();

    public function show($shippmentWithCity);

    public function store(array $parms);

    public function update(array $parms, $shippmentWithCity);

    public function destroy($shippmentWithCity);
}
