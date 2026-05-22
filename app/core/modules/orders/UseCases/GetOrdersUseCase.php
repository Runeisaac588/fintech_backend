<?php

namespace App\Core\Modules\Orders\UseCases;

use App\Models\Order;
use Illuminate\Http\Request;

class GetOrdersUseCase
{
    public function execute(Request $request): array
    {
        $query = Order::query();

        if ($request->search) {
            $query->where(function ($q) use ($request) {
                $q->where('customer_name', 'ilike', "%{$request->search}%")
                    ->orWhere('customer_email', 'ilike', "%{$request->search}%");
            });
        }

        if ($request->status) {
            $query->where('status', $request->status);
        }

        $summaryQuery = clone $query;

        $summary = [
            'total_orders' => (clone $summaryQuery)->count(),
            'total_revenue' => (clone $summaryQuery)
                ->where('status', 'paid')
                ->sum('amount'),
            'failed_payments' => (clone $summaryQuery)
                ->where('status', 'failed')
                ->count(),
        ];

        $sortBy = $request->get('sort_by', 'created_at');
        $sortDir = $request->get('sort_dir', 'desc');

        $query->orderBy($sortBy, $sortDir);

        $perPage = $request->get('per_page', 10);

        return [
            'orders' => $query->paginate($perPage),
            'summary' => $summary,
        ];
    }
}