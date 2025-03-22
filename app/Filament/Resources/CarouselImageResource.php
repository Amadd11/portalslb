<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CarouselImageResource\Pages;
use App\Models\CarouselImage;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class CarouselImageResource extends Resource
{
    protected static ?string $model = CarouselImage::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('title')
                    ->maxLength(255),
                Forms\Components\Select::make('group')
                    ->options([
                        'homepage' => 'Homepage Carousel',
                        'event' => 'Event Carousel',
                        'galeri' => 'Galeri Carousel',
                    ])
                    ->label('Carousel Group')
                    ->required(),

                Forms\Components\FileUpload::make('path')
                    ->image()
                    ->disk('public')
                    ->directory('carousel')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->searchable(),
                Tables\Columns\ImageColumn::make('path')
                    ->label('Gambar')
                    ->disk('public'),
                Tables\Columns\TextColumn::make('group')
                    ->badge()
                    ->colors([
                        'primary' => 'homepage',
                        'success' => 'event',
                        'warning' => 'galeri',
                    ])
                    ->label('Group')
                    ->sortable(),

                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('group')
                    ->label('Filter Group')
                    ->options([
                        'homepage' => 'Homepage',
                        'event' => 'Event',
                        'galeri' => 'Galeri',
                    ])
                    ->attribute('group')
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
            'index' => Pages\ListCarouselImages::route('/'),
            'create' => Pages\CreateCarouselImage::route('/create'),
            'edit' => Pages\EditCarouselImage::route('/{record}/edit'),
        ];
    }
}
