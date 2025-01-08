<?php

namespace App\Filament\Widgets;
use Filament\Support\Enums\IconPosition;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use App\Models\Certificate;
class CertificateWidget extends BaseWidget
{
    protected function getStats(): array
    {
        return [
             Stat::make('Certificated',Certificate::count())
                ->description('New Certificated is Add')
                ->descriptionIcon('heroicon-m-user-group',IconPosition::Before)
                ->chart([1,3,6,12,24,80])
                ->color('danger')
        ];
    }
}
