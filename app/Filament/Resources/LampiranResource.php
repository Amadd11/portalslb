<?php

namespace App\Filament\Resources;

use App\Filament\Resources\LampiranResource\Pages;
use App\Filament\Resources\LampiranResource\RelationManagers;
use App\Models\Lampiran;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class LampiranResource extends Resource
{
    protected static ?string $model = Lampiran::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('judul')
                    ->required()
                    ->label('Judul File')
                    ->maxLength(255),
                Forms\Components\FileUpload::make('file_path')
                    ->directory('lampiran')
                    ->disk('public')
                    ->acceptedFileTypes(['application/pdf'])
                    ->openable()
                    ->required(),
                Forms\Components\Select::make('tipe')
                    ->options([
                        'profil' => 'Profil Sekolah',
                        'kurikulum sdlb' => 'Kurikulum SDLB',
                        'kurikulum smplb' => 'Kurikulum SMPLB',
                        'kurikulum smalb' => 'Kurikulum SMALB',
                    ])
                    ->required()
                    ->label('Tipe Lampiran')
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('judul')
                    ->searchable(),
                Tables\Columns\TextColumn::make('file_path')
                    ->searchable(),
                Tables\Columns\TextColumn::make('tipe')
                    ->badge()
                    ->colors([
                        'success' => 'kurikulum',
                        'info' => 'profil',
                    ])
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
            ->filters([
                Tables\Filters\SelectFilter::make('tipe')
                    ->options([
                        'profil' => 'Profil Sekolah',
                        'kurikulum sdlb' => 'Kurikulum SDLB',
                        'kurikulum smplb' => 'Kurikulum SMLB',
                        'kurikulum smalb' => 'Kurikulum SMALB',
                    ]),
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
            'index' => Pages\ListLampirans::route('/'),
            'create' => Pages\CreateLampiran::route('/create'),
            'edit' => Pages\EditLampiran::route('/{record}/edit'),
        ];
    }
}
