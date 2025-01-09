<?php

namespace App\Filament\Resources\DeviceInUseResource\Widgets;

use App\Models\DeviceInUse;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class DevicesInUserStats extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make("eRaptor",DeviceInUse::eRaptor()),
            Stat::make("eRex",DeviceInUse::eRex()),
            Stat::make("eRaptor 2.0",DeviceInUse::eRaptor2()),

        ];
    }
}
