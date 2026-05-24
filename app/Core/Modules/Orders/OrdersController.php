<?php

namespace App\Core\Modules\Orders;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Core\Modules\Orders\UseCases\GetOrdersUseCase;
use App\Core\Modules\Orders\UseCases\GetOrderByIdUseCase;

class OrdersController extends Controller
{
    public function __construct(
        private GetOrdersUseCase $getOrdersUseCase,
        private GetOrderByIdUseCase $getOrderByIdUseCase
    ) {}

    public function index(Request $request)
    {
        $data = $this->getOrdersUseCase->execute($request);

        return response()->json([
            'status' => 200,
            'message' => 'Orders fetched successfully',
            'data' => $data
        ]);
    }

    public function show($id)
    {
        $order = $this->getOrderByIdUseCase->execute($id);

        if (!$order) {
            return response()->json([
                'status' => 404,
                'message' => 'Order not found'
            ], 404);
        }

        return response()->json([
            'status' => 200,
            'data' => $order
        ]);
    }
}