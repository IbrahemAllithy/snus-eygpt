<?php

namespace App\Listeners;

use App\Events\OrderProcessed;
use App\Models\Web\Order;
use App\Services\Admin\OrderService;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendOrderDetail implements ShouldQueue
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @return void
     */
    public function handle(OrderProcessed $event)
    {
        \Log::info("event order processed triggered");
        $orderQtyData = new OrderService;
        $orders = Order::find($event->order);
        $sql = $orderQtyData->getCartItemQty($orders->customer_id);
        //dd($orders);
        $sql = $orderQtyData->orderDetail($sql, $orders);
    }
}
