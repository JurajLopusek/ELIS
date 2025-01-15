<?php

namespace App\Filament\Resources;

use App\Filament\Resources\DeviceInUseResource\Pages;
use App\Models\DeviceInUse;
use App\Models\Devices;
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
                TextInput::make('product_id')->required(),
                TextInput::make('partner_id')->required(),
                TextInput::make('device_id')->required(),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->query(DeviceInUse::with(['devices' => function ($query) {
                $query->withTrashed(); // Toto zabezpečí, že aj vymazané zariadenia budú zahrnuté
            }]))->columns([
                TextColumn::make('devices.products_id')->searchable()->label('Name'),
//                TextColumn::make('device_type')->searchable(),
                TextColumn::make('serial_number')->searchable(),
                TextColumn::make('partners.partner_name')->searchable()->label('Partner Name'),
                TextColumn::make("calibration"),
                TextColumn::make('subscription'),
                TextColumn::make('products')->searchable()->label('Name'),


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

