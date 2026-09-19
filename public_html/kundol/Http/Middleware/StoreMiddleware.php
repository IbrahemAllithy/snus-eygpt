<?php

namespace App\Http\Middleware;

use App\Models\Admin\Product;
use App\Traits\ApiResponser;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class StoreMiddleware
{
    use ApiResponser;

    /**
     * Handle an incoming request.
     *
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $current_path = \Request::route()->getName();
        // for product
        if ($current_path == 'admin.product.store' || $current_path == 'admin.product.update') {
            if (isset($request->product_type) && strtolower($request->product_type) != 'digital' && Gate::allows('isDigital')) {
                return $this->errorResponse('Sorry You have Digital Store!');
            } elseif (isset($request->product_type) && strtolower($request->product_type) == 'digital' && Gate::denies('isDigital')) {
                return $this->errorResponse('Sorry You have a Physical Store!');
            }
        }
        // for cart
        elseif ($current_path == 'client.cart.store' || $current_path == 'client.cart.delete') {
            if (isset($request->product_id)) {
                $product = Product::findOrFail($request->product_id);
                if (isset($product->product_type) && strtolower($product->product_type) != 'digital' && Gate::allows('isDigital')) {
                    return $this->errorResponse('Sorry You have Digital Store!');
                } elseif (isset($product->product_type) && strtolower($product->product_type) == 'digital' && Gate::denies('isDigital')) {
                    return $this->errorResponse('Sorry You have a Physical Store!');
                }
            }
        } else {
            if (Gate::allows('isDigital')) {
                return $this->errorResponse('Sorry You have Digital Store!');
            }
        }

        return $next($request);
    }
}
