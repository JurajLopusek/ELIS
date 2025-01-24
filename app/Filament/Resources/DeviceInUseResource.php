<?php

namespace App\Filament\Resources;

use App\Filament\Resources\DeviceInUseResource\Pages;
use App\Models\DeviceInUse;
use App\Models\Devices;
use App\Models\Products;
use Filament\Forms;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Get;
use Filament\Forms\Set;
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
                TextInput::make('serial_number')
                    ->regex('/^ER[\dA-Z]\d{4}[A-Z]\d{4}$/')
                    ->live(onBlur: true)
                    ->afterStateUpdated(function (Get $get, Set $set, ?string $old, ?string $state) {
                        $prefix = substr($state, 0, 3);
                        $product = Products::findPrefix($prefix);
                        if ($product) {
                            $set('device_name', $product->name);
                            $set('product_id', $product->id);
                        }
                    })
                    ->required()
                    ->unique(),
                Select::make('product_id')
                    ->relationship('products', 'name')
                    ->disabled(),
                Hidden::make('product_id'),

                Select::make('partner_id')
                    ->relationship('partners', 'company_name'),  // Relácia na serial_number zariadenia
                TextInput::make('cost')->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('serial_number')->searchable()
                    ->label('Serial number')
                    ->searchable(),
                TextColumn::make('device_type')->searchable(),
                TextColumn::make('partners.company_name')->searchable()->label('Partner Name'),
                TextColumn::make("calibration"),
                TextColumn::make('subscription'),
                TextColumn::make('products.name')->searchable()->label('Name'),


                // Add other columns as necessary
            ])
            ->filters([
                // Add filters as necessary
            ])
            ->actions([
                // Define actions as necessary
                Tables\Actions\ViewAction::make(),

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
    public static function afterSave($record)
    {
        // Ak sa záznam upravuje, aktualizujte hodnotu serial_number v zariadení
        if ($record->devices) {
            $device = $record->devices;
            $device->serial_number = $record->serial_number; // Predpokladám, že serial_number je v DeviceInUse
            $device->save();
        }
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListDeviceInUses::route('/'),
            'create' => Pages\CreateDeviceInUse::route('/create'),
            'edit' => Pages\EditDeviceInUse::route('/{record}/edit'),
        ];
    }
}

