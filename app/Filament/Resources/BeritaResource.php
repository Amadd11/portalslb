<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Berita;
use Filament\Forms\Set;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Illuminate\Support\Str;
use Filament\Resources\Resource;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\BeritaResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\BeritaResource\RelationManagers;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\DateTimePicker; // Pastikan ini diimpor jika belum

class BeritaResource extends Resource
{
    protected static ?string $model = Berita::class;

    protected static ?string $navigationIcon = 'heroicon-o-newspaper';

    protected static ?string $navigationGroup = 'Manajemen Artikel';

    protected static ?string $navigationLabel = 'Artikel';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                // Label untuk Kategori
                Select::make('category_id')
                    ->label('Kategori')
                    ->relationship('category', 'nama_category')
                    ->required(),
                // Label untuk Judul Artikel
                TextInput::make('judul')
                    ->label('Judul Artikel') // Label ditambahkan di sini
                    ->required()
                    ->afterStateUpdated(fn(Set $set, ?string $state) => $set('slug', Str::slug($state)))
                    ->lazy()
                    ->maxLength(255),
                // Slug otomatis di-generate, tidak perlu label eksplisit jika disabled
                TextInput::make('slug')
                    ->label('Slug')
                    ->hidden()
                    ->disabled(),
                // Label untuk Thumbnail
                FileUpload::make('thumbnail')
                    ->label('Gambar Thumbnail') // Label diubah untuk lebih deskriptif
                    ->disk('public')
                    ->image()
                    ->directory('berita-thumbnails')
                    ->required(),
                // Label untuk Isi Artikel
                RichEditor::make('isi')
                    ->label('Isi Artikel') // Label ditambahkan di sini
                    ->disableToolbarButtons([
                        'blockquote', // atau tombol lain yang kamu tidak perlukan
                    ])
                    ->extraInputAttributes([
                        'style' => 'text-indent: 0; margin: 0;',
                    ])
                    ->columnSpanFull(),
                // Label untuk Lampiran PDF
                FileUpload::make('attachments')
                    ->label('Lampiran Dokumen PDF') // Label diubah untuk lebih deskriptif
                    ->disk('public')
                    ->directory('berita-attachments')
                    ->acceptedFileTypes(['application/pdf'])
                    ->openable() // Bisa dibuka langsung jika PDF
                    ->downloadable() // Aktifkan tombol download di CMS jika perlu
                    ->multiple()
                    ->reorderable(),
                // Label untuk Tanggal Publikasi
                DateTimePicker::make('tanggal_publish')
                    ->label('Tanggal Publikasi'), // Label ditambahkan di sini
                // Label untuk Status Publikasi
                Select::make('status')
                    ->label('Status Publikasi') // Label ditambahkan di sini
                    ->options([
                        'draft' => 'Draft',
                        'publish' => 'Publish',
                    ])
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('category.nama_category')
                    ->label('Kategori') // Label untuk kolom tabel
                    ->sortable(),
                Tables\Columns\TextColumn::make('judul')
                    ->label('Judul Artikel') // Label untuk kolom tabel
                    ->searchable(),
                Tables\Columns\ImageColumn::make('thumbnail')
                    ->label('Thumbnail'),
                Tables\Columns\TextColumn::make('tanggal_publish')
                    ->label('Tanggal Publikasi') // Label untuk kolom tabel
                    ->dateTime()
                    ->sortable(),
                Tables\Columns\TextColumn::make('status')
                    ->label('Status'), // Label untuk kolom tabel
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Dibuat Pada') // Label untuk kolom tabel
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->label('Diperbarui Pada') // Label untuk kolom tabel
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('status')
                    ->label('Filter Status') // Label untuk filter
                    ->options([
                        'draft' => 'Draft',
                        'publish' => 'Publish',
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
            'index' => Pages\ListBeritas::route('/'),
            'create' => Pages\CreateBerita::route('/create'),
            'edit' => Pages\EditBerita::route('/{record}/edit'),
        ];
    }
}
