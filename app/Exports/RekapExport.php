<?php

namespace App\Exports;

use App\Models\Atasan;
use App\Models\Guru;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Carbon\Carbon;

class RekapExport implements FromView
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function view(): View
    {
        $data = Guru::with('kehadiran')->get();
        $counter = 1;
        $totalKehadiran = $data->map(function ($guru) {
            $guru->sakit = $guru->kehadiran->sum('sakit');
            $guru->ijin = $guru->kehadiran->sum('ijin');
            $guru->alfa = $guru->kehadiran->sum('alfa');
            $guru->total_ketidakhadiran = $guru->sakit + $guru->ijin + $guru->alfa;

            $total_pertemuan = $guru->jml_minggu * $guru->jml_pertemuan_perminggu;
            $guru->persentase_ketidakhadiran = $total_pertemuan > 0
                ? ($guru->total_ketidakhadiran / $total_pertemuan) * 100
                : 0;
            $guru->persentase_kehadiran = 100 - $guru->persentase_ketidakhadiran;

            return $guru;
        });

        $bulan = Carbon::now()->translatedFormat('F');
        $tanggal = Carbon::now()->translatedFormat('d F Y');

        $rataPersentaseKehadiran = $totalKehadiran->avg('persentase_kehadiran');
        $rataPersentaseKetidakhadiran = $totalKehadiran->avg('persentase_ketidakhadiran');

        $atasanWakasek = Atasan::where('role', 'Wakasek Kurikulum')->get();
        $atasanKapro = Atasan::where('role', 'Kepala Bidang Keahlian TKI')->get();

        return view('admin.export', compact('data', 'counter', 'rataPersentaseKehadiran', 'rataPersentaseKetidakhadiran', 'bulan', 'tanggal', 'atasanWakasek', 'atasanKapro'));
    }
}
