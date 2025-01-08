<?php

namespace App\Filament\Widgets;
use Filament\Support\Enums\IconPosition;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use App\Models\Students;
class StudentWidget extends BaseWidget
{
    protected function getStats(): array
    {
        return [
                Stat::make('New Student',Students::count())
                ->description('New Student is Add')
                ->descriptionIcon('heroicon-m-user-group',IconPosition::Before)
                ->chart([1,3,6,12,24,80])
                ->color('success')
        ];
    }
}
