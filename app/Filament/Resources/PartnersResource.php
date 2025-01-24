<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PartnersResource\Pages;
use App\Filament\Resources\PartnersResource\RelationManagers;
use App\Models\Partners;
use Filament\Forms;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Infolist;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PartnersResource extends Resource
{
    protected static ?string $model = Partners::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-group';
    protected static ?string $navigationGroup = 'System Management';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Partner information')
                    ->description('Put the partner information here')
                    ->schema([
                        TextInput::make('partner_name')
                            ->label('Partner Name')
                            ->required()
                            ->maxLength(255),
                        TextInput::make('partner_email')
                            ->label('Partner Email')
                            ->required()
                            ->maxLength(255),
                        TextInput::make('partner_password')
                            ->label('Partner Password')
                            ->required()
                            ->maxLength(255),
                    ])->columns(3),

                Forms\Components\Section::make('Partner company information')
                    ->description('Put the partner information here')
                    ->schema([


                        TextInput::make('ico')
                            ->label('ICO')
                            ->required()
                            ->numeric(),

                        TextInput::make('dic')
                            ->label('DIC')
                            ->required()
                            ->numeric(),

                        TextInput::make('address')
                            ->label('Address')
                            ->required()
                            ->maxLength(255),
                        TextInput::make('country')
                            ->label('Country')
                            ->required()
                            ->maxLength(255),
                        TextInput::make('contact_person1')
                            ->label('Contact Person 1')
                            ->nullable()
                            ->maxLength(255),

                        TextInput::make('distributor')
                            ->label('Distributor')
                            ->required()
                            ->maxLength(255),

                        TextInput::make('servis_distributor')
                            ->label('Service Distributor')
                            ->required()
                            ->maxLength(255),
                        TextInput::make('contact_person2')
                            ->label('Contact Person 2')
                            ->nullable()
                            ->maxLength(255),
                        TextInput::make('gps')
                            ->label('GPS Coordinates')
                            ->required()
                            ->maxLength(255),
                    ])->columns(3),


            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('company_name')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('city')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('ico')
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
                TextEntry::make('partner_name'),
                TextEntry::make('country')
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
            'index' => Pages\ListPartners::route('/'),
            'create' => Pages\CreatePartners::route('/create'),
            'edit' => Pages\EditPartners::route('/{record}/edit'),

        ];
    }
}
