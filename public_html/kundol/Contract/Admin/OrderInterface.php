<?php

namespace App\Contract\Admin;

interface OrderInterface
{
    public function all();

    public function show($order);

    public function printInvoice($id);

    public function update(array $parms, $order);

    public function addOrderNotes(array $parms);

    public function addOrderComments(array $parms);
}
