<?php

namespace App\Filament\App\Resources;

use App\Filament\App\Resources\DeviceResource\Pages;
use App\Filament\App\Resources\DeviceResource\RelationManagers;
use App\Models\DeviceInUse;
use App\Models\Devices;
use App\Models\Products;
use Carbon\Carbon;
use Filament\Forms;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Forms\Set;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class DeviceResource extends Resource
{
    protected static ?string $model = DeviceInUse::class;
    protected static ?string $navigationGroup = 'Device Management';
    protected static ?string $navigationLabel = 'Devices';
    protected static ?string $modelLabel = 'Your devices';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {

        return $form

            ->schema([
                //
            ]);
    }

    public static function table(Table $table): Table
    {
        $userId = auth()->id(); // Získa ID prihláseného používateľa
         return $table
            ->columns([
                TextColumn::make('serial_number')->searchable(),
                TextColumn::make('products.name')->searchable(),
                TextColumn::make('products.id')->searchable(),
                TextColumn::make('partners.company_name')->searchable(),
                TextColumn::make('partners.user_id')->searchable(),

            ])->query(DeviceInUse::whereHas('partners', function ($query) use ($userId) {
                $query->where('user_id', $userId);
            }))
            ->filters([
                //
            ])
            ->actions([
            ])
            ->bulkActions([
                    Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);

    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListDevices::route('/'),
            'create' => Pages\CreateDevice::route('/create'),
            'edit' => Pages\EditDevice::route('/{record}/edit'),
        ];
    }
}
