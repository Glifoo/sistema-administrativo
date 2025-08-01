<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PaqueteResource\Pages;
use App\Filament\Resources\PaqueteResource\RelationManagers;
use App\Models\Paquete;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\RichEditor;

class PaqueteResource extends Resource
{
    protected static ?string $model = Paquete::class;

    protected static ?string $navigationIcon = 'heroicon-s-briefcase';
    protected static ?string $navigationGroup = 'Productos Glifoo';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Publicidad')
                    ->columns(3)
                    ->schema([
                        Forms\Components\TextInput::make('nombre')
                            ->required()
                            ->maxLength(255),

                        Forms\Components\TextInput::make('preciounitario')
                            ->label('Precio unitario')
                            ->required()
                            ->numeric()
                            ->default(0.00),

                        Forms\Components\TextInput::make('descuento')
                            ->required()
                            ->numeric()
                            ->default(0.00),

                        Forms\Components\Select::make('duracion')
                            ->options([
                                '1' => '1' . ' meses',
                                '3' => '3' . ' meses',
                                '6' => '6' . ' meses',
                                '12' => '12' . ' meses',
                            ]),

                        Forms\Components\FileUpload::make('image_url')
                            ->image()
                            ->imageEditor()
                            ->directory('paquetes')
                            ->required(),

                        Forms\Components\Toggle::make('estado')
                            ->label('Estado Activo')
                            ->hiddenOn(['create'])
                            ->default(false),
                    ]),
                Section::make('Descripcion')
                    ->columns(1)
                    ->schema([
                        RichEditor::make('descripcion')
                            ->required(),

                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nombre')
                    ->searchable(),
                Tables\Columns\TextColumn::make('preciounitario')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('descuento')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\IconColumn::make('estado')
                    ->boolean(),

                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),

                Tables\Columns\ImageColumn::make('image_url')
                    ->disk('public')
                    ->label('Imagen'),

                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
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
            'index' => Pages\ListPaquetes::route('/'),
            'create' => Pages\CreatePaquete::route('/create'),
            'edit' => Pages\EditPaquete::route('/{record}/edit'),
        ];
    }
}
