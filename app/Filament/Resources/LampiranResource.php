<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Lampiran;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Illuminate\Support\Str;
use Filament\Resources\Resource;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\LampiranResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\LampiranResource\RelationManagers;

class LampiranResource extends Resource
{
    protected static ?string $model = Lampiran::class;

    protected static ?string $navigationIcon = 'heroicon-o-paper-clip';

    protected static ?string $navigationGroup = 'Manajemen Profil';

    protected static ?string $navigationLabel = 'Lampiran Kurikulum & Profil';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('judul')
                    ->required()
                    ->label('Judul File') // Label sudah ada dan jelas
                    ->maxLength(255),
                Forms\Components\FileUpload::make('file_path')
                    ->label('File Lampiran (PDF)') // Label lebih deskriptif
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
                    ->label('Tipe Lampiran'), // Label sudah ada dan jelas
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('judul')
                    ->label('Judul File') // Label ditambahkan
                    ->searchable(),
                Tables\Columns\TextColumn::make('file_path')
                    ->label('Path File') // Label ditambahkan untuk path file
                    ->searchable(),
                Tables\Columns\TextColumn::make('tipe')
                    ->label('Tipe Lampiran') // Label ditambahkan
                    ->badge()
                    ->colors([
                        'success' => fn(string $state): bool => Str::contains($state, 'kurikulum'), // Menggunakan Str::contains
                        'info' => 'profil',
                    ])
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Dibuat Pada') // Label ditambahkan
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->label('Diperbarui Pada') // Label ditambahkan
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('tipe')
                    ->label('Filter Tipe Lampiran') // Label ditambahkan
                    ->options([
                        'profil' => 'Profil Sekolah',
                        'kurikulum sdlb' => 'Kurikulum SDLB',
                        'kurikulum smplb' => 'Kurikulum SMPLB',
                        'kurikulum smalb' => 'Kurikulum SMALB',
                    ]),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
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
