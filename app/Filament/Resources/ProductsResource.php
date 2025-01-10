<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProductsResource\Pages;
use App\Filament\Resources\ProductsResource\RelationManagers;
use App\Models\Products;
use Filament\Forms;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Infolists\Components\Section;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Infolist;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Actions\Action;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ProductsResource extends Resource
{
    protected static ?string $model = Products::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationGroup = 'System Management';
    protected static ?string $navigationLabel = 'Products';


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Product information')
                    ->description('Put the product information here')
                    ->schema([
                        TextInput::make('serial_number')
                            ->label('Prefix Serial Number')
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
                Tables\Columns\TextColumn::make('name')
                    ->sortable()
                    ->searchable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function infolist(Infolist $infolist): Infolist
    {
        return $infolist
            ->schema([
                Section::make('Product information')
                    ->schema([
                        TextEntry::make('serial_number'),
                        TextEntry::make('name'),
                        TextEntry::make('product_type'),
                    ])->columns(3),
                Section::make('Detail information')
                    ->schema([
                        TextEntry::make('calibration_time'),
                        TextEntry::make('service_interval_time'),
                        TextEntry::make('service_interval_m2'),
                        TextEntry::make('service_interval_km'),
                        TextEntry::make('application_subscription'),
                        TextEntry::make('warning'),
                    ])->columns(3),
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
