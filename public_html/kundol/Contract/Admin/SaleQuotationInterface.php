<?php

namespace App\Contract\Admin;

interface SaleQuotationInterface
{
    public function all();

    public function show($sale);

    public function store(array $parms);

    public function destroy($sale);
}
