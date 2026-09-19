<?php

namespace App\Contract\Admin;

interface ProductInterface
{
    public function all();

    public function show($product);

    public function store(array $parms);

    public function update(array $parms, $product);

    public function destroy($product);

    public function priceRange();

    public function sku($params);

    public function deleted_products();

    public function restore_deleted($id);
}
