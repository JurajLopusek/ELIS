<?php

namespace App\Filament\Resources\DevicesResource\Pages;

use App\Filament\Resources\DevicesResource;
use Filament\Actions;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\EditRecord;

class EditDevices extends EditRecord
{
    protected static string $resource = DevicesResource::class;

    public function save(bool $shouldRedirect = true, bool $shouldSendSavedNotification = true): void
    {
        Notification::make()
            ->title('Changed Devices!')
            ->success()
            ->body('Your changes have been saved')
            ->send()
            ->sendToDatabase(auth()->user());
    }

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
