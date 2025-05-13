<?php

namespace App\Filament\Widgets;

use App\Models\Order;
use App\Models\Product;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        $stats = Order::query()
            ->selectRaw("COUNT(*) as orders_count, SUM(total) as revenue, COUNT(DISTINCT contact_email) as customers_count")
            ->first();

        return [
            Stat::make('Total Products', Product::count()),
            Stat::make('Customers', $stats->customers_count),
            Stat::make('Orders', $stats->orders_count),
            Stat::make('Revenue', '$' . number_format($stats->revenue, 2))
                ->description('Total revenue from all orders'),
        ];
    }
}
