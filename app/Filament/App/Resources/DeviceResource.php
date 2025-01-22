<?php

namespace App\Filament\App\Resources;

use App\Filament\App\Resources\DeviceResource\Pages;
use App\Filament\App\Resources\DeviceResource\RelationManagers;
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
    protected static ?string $model = Devices::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
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
                            $set('products_id', $product->id);
                        }
                    })
                    ->required()
                    ->unique(),
                Select::make('products_id')
                    ->relationship('products', 'name')
                    ->disabled(),
                Hidden::make('products_id'),


                Select::make('device_type')
                    ->label('Device Type')
                    ->placeholder('Select device type')
                    ->options([
                        'PRO' => 'PRO',
                        'PRO GPS' => 'PRO GPS',
                        'PRO RTK' => 'PRO RTK',
                        'list' => 'List',
                    ])
                    ->default('PRO')
                    ->searchable()
                    ->preload()
                    ->required(),
                DatePicker::make('registration')
                    ->label('Date of registration')
                    ->displayFormat('d/m/Y') // Frontend display
                    ->native(false)
                    ->default(Carbon::now()->format('Y-m-d')) // Default backend value
                    ->readOnly(),

                TextInput::make('qc_data'),

                Forms\Components\RichEditor::make('text'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('serial_number')->searchable(),
                TextColumn::make('products.name')->searchable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
;
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
