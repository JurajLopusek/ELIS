<?php

namespace App\Filament\Resources\DeviceInUseResource\Pages;

use App\Filament\Resources\DeviceInUseResource;
use App\Filament\Resources\DeviceInUseResource\Widgets\DevicesInUserStats;
use App\Filament\Resources\UserResource\Widgets\StatsOverview;
use App\Models\DeviceInUse;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListDeviceInUses extends ListRecords
{
    protected static string $resource = DeviceInUseResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
    public function getHeaderWidgets(): array
    {
        return [
            DevicesInUserStats::class
        ];
    }
}
