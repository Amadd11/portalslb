<?php

namespace App\Filament\Resources;

use App\Filament\Resources\KomentarResource\Pages;
use App\Filament\Resources\KomentarResource\RelationManagers;
use App\Models\Komentar;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class KomentarResource extends Resource
{
    protected static ?string $model = Komentar::class;

    protected static ?string $navigationIcon = 'heroicon-o-inbox';

    protected static ?string $navigationGroup = 'Manajemen Artikel';

    protected static ?string $navigationLabel = 'Komentar'; // Menambahkan label navigasi

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('berita_id') // Mengubah menjadi Select untuk relasi
                    ->label('Berita Terkait') // Label untuk ID Berita
                    ->relationship('berita', 'judul') // Asumsi ada relasi 'berita' dengan kolom 'judul'
                    ->required(),
                Forms\Components\TextInput::make('nama_pengirim')
                    ->label('Nama Pengirim') // Label untuk nama pengirim
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('email_pengirim')
                    ->label('Email Pengirim') // Label untuk email pengirim
                    ->email()
                    ->maxLength(255),
                Forms\Components\Textarea::make('isi_komentar')
                    ->label('Isi Komentar') // Label untuk isi komentar
                    ->required()
                    ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('berita.judul') // Menampilkan judul berita dari relasi
                    ->label('Berita Terkait') // Label untuk kolom berita
                    ->sortable()
                    ->searchable(), // Menambahkan searchable jika ingin mencari berdasarkan judul berita
                Tables\Columns\TextColumn::make('nama_pengirim')
                    ->label('Nama Pengirim') // Label untuk kolom nama pengirim
                    ->searchable(),
                Tables\Columns\TextColumn::make('email_pengirim')
                    ->label('Email Pengirim') // Label untuk kolom email pengirim
                    ->searchable(),
                Tables\Columns\TextColumn::make('isi_komentar') // Menambahkan kolom isi komentar di tabel
                    ->label('Isi Komentar')
                    ->limit(50) // Membatasi panjang teks yang ditampilkan
                    ->tooltip(fn(string $state): string => $state), // Menambahkan tooltip untuk melihat teks lengkap
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Dibuat Pada') // Label untuk kolom created_at
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->label('Diperbarui Pada') // Label untuk kolom updated_at
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                // Anda bisa menambahkan filter di sini, misalnya berdasarkan berita
                Tables\Filters\SelectFilter::make('berita_id')
                    ->label('Filter Berita')
                    ->relationship('berita', 'judul')
                    ->searchable(),
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
            'index' => Pages\ListKomentars::route('/'),
            'create' => Pages\CreateKomentar::route('/create'),
            'edit' => Pages\EditKomentar::route('/{record}/edit'),
        ];
    }
}
