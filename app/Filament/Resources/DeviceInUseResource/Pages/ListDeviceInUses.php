<?php

namespace App\Filament\Resources\DeviceInUseResource\Pages;

use App\Filament\Resources\DeviceInUseResource;
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
}
