<?php

namespace App\Filament\Widgets;

use App\Models\Guru;
use App\Models\Siswa;
use Illuminate\Support\Facades\DB;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;

class SiswaJenjangStatsOverview extends BaseWidget
{
    /**
     * Mengatur interval polling untuk refresh data widget.
     * Contoh: '10s' untuk refresh setiap 10 detik.
     * Atur ke null untuk menonaktifkan refresh otomatis.
     */
    protected static ?string $pollingInterval = '30s';

    /**
     * Mendefinisikan kartu statistik yang akan ditampilkan.
     *
     * @return array<Stat>
     */
    protected function getStats(): array
    {
        // Query ini jauh lebih efisien daripada mengambil semua data siswa.
        // Kita hanya mengambil jumlah (count) yang sudah dikelompokkan oleh database.
        // Menghitung total guru dari model Guru
        $totalGuru = Guru::count();
        $counts = Siswa::query()
            ->join('jenjangs', 'siswas.jenjang_id', '=', 'jenjangs.id')
            ->whereIn('jenjangs.nama_jenjang', ['SDLB', 'SMPLB', 'SMALB'])
            ->select('jenjangs.nama_jenjang', DB::raw('count(*) as total'))
            ->groupBy('jenjangs.nama_jenjang')
            ->pluck('total', 'nama_jenjang'); // Hasil: ['SDLB' => 50, 'SMPLB' => 45, ...]

        // Menyiapkan kartu statistik
        return [
            Stat::make('Total Siswa SDLB', $counts->get('SDLB') ?? 0)
                ->description('Siswa tingkat Sekolah Dasar Luar Biasa')
                ->descriptionIcon('heroicon-m-academic-cap')
                ->color('success'),

            Stat::make('Total Siswa SMPLB', $counts->get('SMPLB') ?? 0)
                ->description('Siswa tingkat Sekolah Menengah Pertama Luar Biasa')
                ->descriptionIcon('heroicon-m-users')
                ->color('warning'),

            Stat::make('Total Siswa SMALB', $counts->get('SMALB') ?? 0)
                ->description('Siswa tingkat Sekolah Menengah Atas Luar Biasa')
                ->descriptionIcon('heroicon-m-user-group')
                ->color('info'),
            Stat::make('Total Guru', $totalGuru)
                ->description('Jumlah seluruh guru dan tenaga pendidik')
                ->descriptionIcon('heroicon-m-briefcase')
                ->color('primary'),
        ];
    }
}
