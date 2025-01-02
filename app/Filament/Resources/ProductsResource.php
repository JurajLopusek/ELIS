<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProductsResource\Pages;
use App\Filament\Resources\ProductsResource\RelationManagers;
use App\Models\Products;
use Filament\Forms;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ProductsResource extends Resource
{
    protected static ?string $model = Products::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationGroup = 'System Management';


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Product information')
                    ->description('Put the product information here')
                    ->schema([
                        TextInput::make('serial_number')
                            ->label('Serial Number')
                            ->unique()
                            ->required(),

                        TextInput::make('name')
                            ->label('Name')
                            ->required(),

                        Select::make('product_type')
                            ->label('Product Type')
                            ->options([
                                'pro' => 'PRO',
                                'pro gps' => 'PRO GPS',
                                'pro rtk' => 'PRO RTK',

                            ])
                            ->searchable()
                            ->preload()
                            ->required(),
                    ])->columns(3),
                Forms\Components\Section::make('Detail information')
                    ->description('Put the detail information here')
                    ->schema([
                        TextInput::make('calibration_time')
                            ->label('Calibration Time')
                            ->required(),

                        TextInput::make('service_interval_time')
                            ->label('Service Interval Time')
                            ->required(),

                        TextInput::make('service_interval_m2')
                            ->label('Service Interval m2')
                            ->required(),

                        TextInput::make('service_interval_km')
                            ->label('Service Interval km')
                            ->required(),

                        TextInput::make('application_subscription')
                            ->label('Application Subscription')
                            ->required(),

                        TextInput::make('warning')
                            ->label('Warning')
                            ->required(),
                    ])->columns(2)

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('serial_number')->sortable(),
                Tables\Columns\TextColumn::make('name')->sortable(),
                Tables\Columns\TextColumn::make('product_type')->sortable(),

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
            'index' => Pages\ListProducts::route('/'),
            'create' => Pages\CreateProducts::route('/create'),
            'edit' => Pages\EditProducts::route('/{record}/edit'),
        ];
    }
}
