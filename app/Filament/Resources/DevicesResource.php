<?php

namespace App\Filament\Resources;

use App\Filament\Resources\DevicesResource\Pages;
use App\Filament\Resources\DevicesResource\RelationManagers;
use App\Models\Devices;
use App\Models\Partners;
use Carbon\Carbon;
use Filament\Forms;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Actions\Action;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use App\Models\DeviceInUse;
use Filament\Notifications\Notification;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class DevicesResource extends Resource
{
    protected static ?string $model = Devices::class;

    protected static ?string $navigationIcon = 'heroicon-o-cog';
    protected static ?string $navigationGroup = 'Device Management';
    protected static ?string $navigationLabel = 'Devices';

    protected static ?string $modelLabel = 'Devices in ELIS store';


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('serial_number')
                    ->required()
                    ->unique()
                    ->regex('/^ER[\dA-Z]\d{4}[A-Z]\d{4}$/'),
                TextInput::make('device_name')->required(),

//                Select::make('products_id')
//                    ->label('device_name')
//                    ->placeholder('Select device name')
//                    ->relationship('products', 'products.name')
//                    ->required(),
                Select::make('device_type')
                    ->label('Device Type')
                    ->placeholder('Select device type')
                    ->options([
                        'PRO' => 'PRO',
                        'PRO GPS' => 'PRO GPS',
                        'PRO RTK' => 'PRO RTK',
                        'list' => 'List',
                    ])
                    ->searchable()
                    ->preload()
                    ->required(),
//                TextInput::make('device_type')->required(),

                TextInput::make('Message')->nullable(),
                DatePicker::make('registration')
                    ->label('Date of registration')
                    ->displayFormat('d/m/Y')
                    ->native(false)
                    ->default(Carbon::now()->format('Y-m-d')) // Nastaví dnešný dátum ako predvolenú hodnotu
                    ->disabled()
                ,
                TextInput::make('qc_data'),
                Forms\Components\RichEditor::make('text'),
            ]);

    }


    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('serial_number')->searchable(),
                TextColumn::make('device_name')->searchable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Action::make('add Partner to device')
                    ->label('Add Partner')
                    ->form([
                        Select::make('partners_id')
                            ->label('Partner')
                            ->relationship('partners', 'partner_name')
                            ->required(),
                        TextInput::make('cost')->numeric(),
                        TextInput::make('Message')->nullable(),

                    ])
                    ->action(function ($record, $data) {
                        $record->partners_id = $data['partners_id'];
                        $record->save();
                        DeviceInUse::create([
                            'device_id' => $record->id,
                            'partner_id' => $data['partners_id'],
                            'device_name' => $record->device_name,
                            'serial_number' => $record->serial_number,
                            'cost' => $data['cost'],
                            'created_at' => now(),
                            'updated_at' => now(),
                            'device_type' => $record['device_type'],
                            'registration' => $record['registration'],
                            'qc_data' => $record['qc_data'],

                        ]);
                        $record->delete();
                    }),
                Tables\Actions\EditAction::make(),
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
            'index' => Pages\ListDevices::route('/'),
            'create' => Pages\CreateDevices::route('/create'),
            'edit' => Pages\EditDevices::route('/{record}/edit'),
        ];
    }
}
