<?php

namespace App\Filament\Resources;

use App\Filament\Resources\GuruResource\Pages;
use App\Filament\Resources\GuruResource\RelationManagers;
use App\Models\Guru;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class GuruResource extends Resource
{
    protected static ?string $model = Guru::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-plus';

    protected static ?string $navigationLabel = 'Guru';

    protected static ?string $navigationGroup = 'Manajemen Profil';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nama_guru')
                    ->label('Nama Guru') // Label ditambahkan
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('nip')
                    ->label('NIP'), // Label sudah ada
                Forms\Components\TextInput::make('pendidikan')
                    ->label('Pendidikan Terakhir') // Label ditambahkan
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('jabatan')
                    ->label('Jabatan') // Label ditambahkan
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('mapel')
                    ->label('Mata Pelajaran') // Label ditambahkan
                    ->maxLength(255),
                Forms\Components\FileUpload::make('foto_url')
                    ->label('Foto Guru') // Label ditambahkan
                    ->image()
                    ->imageEditor()
                    ->directory('guru-attachments')
                    ->openable()
                    ->reorderable(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nama_guru')
                    ->label('Nama Guru') // Label ditambahkan
                    ->searchable(),
                Tables\Columns\TextColumn::make('nip')
                    ->label('NIP') // Label sudah ada
                    ->searchable(),
                Tables\Columns\TextColumn::make('pendidikan')
                    ->label('Pendidikan') // Label ditambahkan
                    ->searchable(),
                Tables\Columns\TextColumn::make('jabatan')
                    ->label('Jabatan') // Label ditambahkan
                    ->searchable(),
                Tables\Columns\TextColumn::make('mapel')
                    ->label('Mata Pelajaran') // Label ditambahkan
                    ->searchable(),
                Tables\Columns\ImageColumn::make('foto_url')
                    ->label('Foto'), // Label sudah ada
                Tables\Columns\TextColumn::make('deleted_at')
                    ->label('Dihapus Pada') // Label ditambahkan
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
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
                Tables\Filters\TrashedFilter::make()
                    ->label('Filter Data Dihapus'), // Label ditambahkan
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                    Tables\Actions\ForceDeleteBulkAction::make(),
                    Tables\Actions\RestoreBulkAction::make(),
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
            'index' => Pages\ListGurus::route('/'),
            'create' => Pages\CreateGuru::route('/create'),
            'edit' => Pages\EditGuru::route('/{record}/edit'),
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]);
    }
}
