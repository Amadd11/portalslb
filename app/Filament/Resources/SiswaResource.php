<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Siswa;
use Filament\Forms\Set;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Illuminate\Support\Str;
use Filament\Resources\Resource;
use Filament\Forms\Components\DatePicker; // Pastikan ini diimpor
use Filament\Forms\Components\Select; // Pastikan ini diimpor
use Filament\Forms\Components\TextInput; // Pastikan ini diimpor
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\SiswaResource\Pages;
use App\Filament\Resources\SiswaResource\RelationManagers;

class SiswaResource extends Resource
{
    protected static ?string $model = Siswa::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-circle';

    protected static ?string $navigationLabel = 'Siswa';

    protected static ?string $navigationGroup = 'Manajemen Siswa';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nis')
                    ->label('Nomor Induk Siswa (NIS)') // Label ditambahkan
                    ->required()
                    ->live() // Update otomatis saat user mengetik
                    ->afterStateUpdated(
                        fn($state, callable $set) =>
                        $set('nis_exists', Siswa::where('nis', $state)->exists())
                    )
                    ->maxLength(255)
                    ->helperText(fn($get) => $get('nis_exists') ? '⚠️ NIS ini sudah digunakan' : ''),
                Forms\Components\TextInput::make('nama_siswa')
                    ->label('Nama Lengkap Siswa') // Label ditambahkan
                    ->afterStateUpdated(fn(Set $set, ?string $state) => $set('slug', Str::slug($state)))
                    ->lazy()
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('slug')
                    ->label('Slug')
                    ->hidden()
                    ->disabled(),
                Forms\Components\Select::make('jenjang_id')
                    ->label('Jenjang Pendidikan') // Label lebih deskriptif
                    ->relationship('jenjang', 'nama_jenjang')
                    ->required(),
                Forms\Components\TextInput::make('tempat_lahir')
                    ->label('Tempat Lahir') // Label ditambahkan
                    ->required()
                    ->maxLength(255),
                Forms\Components\DatePicker::make('tanggal_lahir')
                    ->label('Tanggal Lahir') // Label ditambahkan
                    ->required(),
                Forms\Components\Select::make('jenis_kelamin')
                    ->label('Jenis Kelamin') // Label ditambahkan
                    ->options([
                        'L' => 'Laki-Laki',
                        'P' => 'Perempuan',
                    ])
                    ->required(),
                Forms\Components\TextInput::make('kelas')
                    ->label('Kelas') // Label ditambahkan
                    ->required()
                    ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nis')
                    ->label("NIS")
                    ->searchable(),
                Tables\Columns\TextColumn::make('nama_siswa')
                    ->label('Nama Siswa') // Label ditambahkan
                    ->searchable(),
                Tables\Columns\TextColumn::make('jenjang.nama_jenjang')
                    ->label('Jenjang') // Label ditambahkan
                    ->searchable(),
                Tables\Columns\TextColumn::make('tempat_lahir')
                    ->label('Tempat Lahir') // Label ditambahkan
                    ->searchable(),
                Tables\Columns\TextColumn::make('tanggal_lahir')
                    ->label('Tanggal Lahir') // Label ditambahkan
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('jenis_kelamin')
                    ->label('Jenis Kelamin'), // Label ditambahkan
                Tables\Columns\TextColumn::make('kelas')
                    ->label('Kelas') // Label ditambahkan
                    ->searchable(),
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
                Tables\Filters\SelectFilter::make('jenjang_id')
                    ->label('Jenjang Pendidikan') // Label ditambahkan
                    ->relationship('jenjang', 'nama_jenjang')
                    ->searchable()
                    ->preload(),
                Tables\Filters\SelectFilter::make('jenis_kelamin')
                    ->label('Jenis Kelamin') // Label ditambahkan
                    ->options([
                        'L' => 'Laki-Laki',
                        'P' => 'Perempuan',
                    ]),
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
            'index' => Pages\ListSiswas::route('/'),
            'create' => Pages\CreateSiswa::route('/create'),
            'edit' => Pages\EditSiswa::route('/{record}/edit'),
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
