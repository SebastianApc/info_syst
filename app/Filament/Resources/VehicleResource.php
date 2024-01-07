<?php

namespace App\Filament\Resources;

use App\Filament\Resources\VehicleResource\Pages;
use App\Models\Vehicle;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class VehicleResource extends Resource
{
    protected static ?string $model = Vehicle::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationGroup = 'Information Management System';
    protected static ?int $navigationSort = 1;
    protected static ?string $slug = 'Vehicle';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Rate limiting')
                    ->description('Put the Status of information')
                    ->schema([
                        Forms\Components\TextInput::make('make')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('model')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('year')
                            ->required()
                            ->numeric(),
                    ])->columns(2),

                Section::make('Numbering')
                    ->description('Unique ID of the car')
                    ->schema([
                        Forms\Components\TextInput::make('license_plate')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('color')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('chassis_no')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('fuel_type')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('transmission')
                            ->required()
                            ->maxLength(255),
                    ])->columns(2),

                Section::make('Vehicle History')
                    ->description('Put the changes/Fix on the vehicle')
                    ->schema([
                        Forms\Components\Textarea::make('notes')
                            ->maxLength(65535)
                            ->columnSpanFull(),
                    ]),

                Section::make('Account Information')
                    ->schema([
                        Forms\Components\BelongsToSelect::make('account_id')
                        ->relationship('App\Models\Account', 'name') // Provide model class as a string
                        ->required(),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('make')
                    ->searchable(),

                Tables\Columns\TextColumn::make('model')
                    ->searchable(),

                Tables\Columns\TextColumn::make('year')
                    ->numeric()
                    ->sortable(),

                Tables\Columns\TextColumn::make('license_plate')
                    ->searchable(),

                Tables\Columns\TextColumn::make('color')
                    ->searchable(),

                Tables\Columns\TextColumn::make('chassis_no')
                    ->searchable(),

                Tables\Columns\TextColumn::make('fuel_type')
                    ->searchable(),

                Tables\Columns\TextColumn::make('transmission')
                    ->searchable(),

                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),

                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([])
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

    public static function getRelations(): array
    {
        return [
            'account' => BelongsTo::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListVehicles::route('/'),
            'create' => Pages\CreateVehicle::route('/create'),
            'view' => Pages\ViewVehicle::route('/{record}'),
            'edit' => Pages\EditVehicle::route('/{record}/edit'),
        ];
    }
}
