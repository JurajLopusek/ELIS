<?php

namespace App\Filament\Resources\DeviceInUseResource\Pages;

use App\Filament\Resources\DeviceInUseResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditDeviceInUse extends EditRecord
{
    protected static string $resource = DeviceInUseResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
