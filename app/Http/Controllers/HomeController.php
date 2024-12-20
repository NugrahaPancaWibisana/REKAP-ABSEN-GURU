<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Atasan;
use App\Models\Guru;
use App\Exports\RekapExport;
use Maatwebsite\Excel\Facades\Excel;
use Carbon\Carbon;

class HomeController extends Controller
{
    public function index()
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

        $rataPersentaseKehadiran = $totalKehadiran->avg('persentase_kehadiran');
        $rataPersentaseKetidakhadiran = $totalKehadiran->avg('persentase_ketidakhadiran');

        $bulan = Carbon::now()->translatedFormat('F');
        $tanggal = Carbon::now()->translatedFormat('d F Y');

        $atasanWakasek = Atasan::where('role', 'Wakasek Kurikulum')->get();
        $atasanKapro = Atasan::where('role', 'Kepala Bidang Keahlian TKI')->get();

        return view('admin.dashboard', compact('data', 'counter', 'rataPersentaseKehadiran', 'rataPersentaseKetidakhadiran', 'bulan', 'tanggal', 'atasanWakasek', 'atasanKapro'));
    }

    public function export()
    {
        return Excel::download(new RekapExport, 'REKAP '. today() .'.xlsx');
    }
}
