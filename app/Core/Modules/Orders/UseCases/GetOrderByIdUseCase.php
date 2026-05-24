<?php

namespace App\Core\Modules\Orders\UseCases;

use App\Models\Order;

class GetOrderByIdUseCase
{
    public function execute(int $id)
    {
        return Order::query()
            ->where('id', $id)
            ->first();
    }
}