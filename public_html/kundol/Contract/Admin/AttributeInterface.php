<?php

namespace App\Contract\Admin;

interface AttributeInterface
{
    public function all();

    public function show($attribute);

    public function store(array $parms);

    public function update(array $parms, $attribute);

    public function destroy($attribute);
}
