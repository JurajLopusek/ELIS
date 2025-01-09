<?php

namespace App\Filament\Resources;

use App\Filament\Resources\DeviceInUseResource\Pages;
use App\Models\DeviceInUse;
use Filament\Forms;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class DeviceInUseResource extends Resource
{
    protected static ?string $model = DeviceInUse::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationGroup = 'Device Management';
    protected static ?string $navigationLabel = 'Devices in Use';

    protected static ?string $modelLabel = 'Devices in Use';

    public static function form(Forms\Form $form): Forms\Form
    {
        return $form
            ->schema([
                TextInput::make('device_name')->required(),
                TextInput::make('serial_number')->required(),
                TextInput::make('cost')->required(),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('device_name')->searchable(),
                TextColumn::make('serial_number')->searchable(),
                TextColumn::make('partners.partner_name')->searchable()->label('Partner Name'),
                TextColumn::make("calibration"),
                TextColumn::make('subscription'),

                // Add other columns as necessary
            ])
            ->filters([
                // Add filters as necessary
            ])
            ->actions([
                // Define actions as necessary
            ])
            ->bulkActions([
                // Define bulk actions as necessary
            ]);
    }
//    public static function getEloquentQuery(): \Illuminate\Database\Eloquent\Builder
//    {
//        $user = auth()->user();
//
//        // Ak má používateľ oprávnenie "view_any_devices", zobrazí všetky záznamy
//        if ($user->can('view_any_devices')) {
//            return parent::getEloquentQuery();
//        }
//
//        // Ak nemá oprávnenie, zobrazia sa iba jeho zariadenia
//        return parent::getEloquentQuery()->where('partner_id', $user->id);
//    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListDeviceInUses::route('/'),
            'create' => Pages\CreateDeviceInUse::route('/create'),
            'edit' => Pages\EditDeviceInUse::route('/{record}/edit'),
        ];
    }
}

