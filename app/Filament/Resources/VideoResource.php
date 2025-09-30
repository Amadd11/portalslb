<?php

namespace App\Filament\Resources;

use App\Filament\Resources\VideoResource\Pages;
use App\Filament\Resources\VideoResource\RelationManagers;
use App\Models\Video;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class VideoResource extends Resource
{
    protected static ?string $model = Video::class;

    protected static ?string $navigationIcon = 'heroicon-o-video-camera';

    protected static ?string $navigationLabel = 'Video'; // Menambahkan label navigasi
    protected static ?string $navigationGroup = 'Manajemen Profil'; // Menambahkan grup navigasi untuk konsistensi

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('judul')
                    ->label('Judul Video') // Label ditambahkan
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('youtube_id')
                    ->label('ID Video YouTube') // Label lebih spesifik
                    ->required()
                    ->maxLength(255),
                Forms\Components\Textarea::make('deskripsi') // Menggunakan Textarea untuk deskripsi yang lebih panjang
                    ->label('Deskripsi Video') // Label ditambahkan
                    ->required()
                    ->columnSpanFull(), // Agar deskripsi mengambil lebar penuh
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('judul')
                    ->label('Judul Video') // Label ditambahkan
                    ->searchable(),
                Tables\Columns\TextColumn::make('youtube_id')
                    ->label('ID YouTube') // Label ditambahkan
                    ->searchable(),
                Tables\Columns\TextColumn::make('deskripsi')
                    ->label('Deskripsi') // Label ditambahkan
                    ->limit(50) // Batasi tampilan deskripsi
                    ->tooltip(fn(string $state): string => $state) // Tampilkan full deskripsi saat hover
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
                // Tambahkan filter di sini jika diperlukan, contohnya:
                // Tables\Filters\TextInputFilter::make('judul')
                //     ->label('Cari Judul'),
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
            'index' => Pages\ListVideos::route('/'),
            'create' => Pages\CreateVideo::route('/create'),
            'edit' => Pages\EditVideo::route('/{record}/edit'),
        ];
    }
}
