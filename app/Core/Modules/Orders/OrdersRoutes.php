<?php
namespace App\Core\Modules\Orders;

use Illuminate\Support\Facades\Route;
use App\Core\Modules\Orders\OrdersController;

Route::prefix('orders')->group(function () {
    Route::get('/', [OrdersController::class, 'index']);
    Route::get('/{id}', [OrdersController::class, 'show']);
});