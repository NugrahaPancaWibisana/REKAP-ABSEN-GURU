<table>
    <thead>
        <tr>
            <th colspan="12" style="text-align: center; ">LAPORAN KETIDAKHADIRAN GURU DI KELAS
                KOMPETENSI KEAHLIAN
                REKAYASA PERANGKAT LUNAK</th>
        </tr>
        <tr>
            <th colspan="12" style="text-align: center; font-size: 14px; font-weight:bolder;">SMK NEGERI
                1 SUBANG</th>
        </tr>
        <tr>
            <th colspan="12" style="text-align: center; ">
                {{ today()->format('Y') - 1 }}/{{ today()->format('Y') }}</th>
        </tr>
    </thead>
</table>
<table>
    <thead>
        <tr>
            <th colspan="2" style="text-align: center; ">Bulan</th>
            <th colspan="2" style="text-align: center; ">{{ $bulan }}</th>
        </tr>
    </thead>
</table>
<table style="width: 100%; border: 1px solid #000; border-collapse: collapse;">
    <thead style="color: black;">
        <tr>
            <th height="50" valign="center" width="5" rowspan="2" style="text-align: center; border: 1px solid #000;">NO
            </th>
            <th valign="center" width="29.86" rowspan="2" style="text-align: center; border: 1px solid #000;">NAMA
                GURU</th>
            <th valign="center" width="13" rowspan="2" style="text-align: center; border: 1px solid #000;">
                JML<br />MINGGU
            </th>
            <th valign="center" width="13" rowspan="2" style="text-align: center; border: 1px solid #000;">
                JML<br />PERTEMUAN<br />PERMINGGU
            </th>
            <th colspan="5" style="text-align: center; border: 1px solid #000;">KETIDAKHADIRAN</th>
            <th valign="center" width="11.86" rowspan="2" style="text-align: center; border: 1px solid #000;">JML
                KETIDAK<br />HADIRAN
            </th>
            <th valign="center" width="11.86" rowspan="2" style="text-align: center; border: 1px solid #000;">
                %<br />KETIDAK<br />HADIRAN</th>
            <th valign="center" width="11.86" rowspan="2" style="text-align: center; border: 1px solid #000;">
                %<br />KEHADIRAN</th>
        </tr>
        <tr>
            <th width="7" style="text-align: center; border: 1px solid #000;">SAKIT
            </th>
            <th width="7" style="text-align: center; border: 1px solid #000;">IZIN
            </th>
            <th colspan="2" width="8.43" style="text-align: center; border: 1px solid #000;">KET
            </th>
            <th width="7" style="text-align: center; border: 1px solid #000;">ALFA
            </th>
        </tr>
    </thead>
    <tbody>
        @foreach ($data as $item)
            <tr>
                <td style="padding: 2px; text-align: center; border: 1px solid #000;">
                    {{ $counter++ }}</td>
                <td style="padding: 2px; text-align: left; border: 1px solid #000;">{{ $item->name }}
                </td>
                <td style="padding: 2px; text-align: right; border: 1px solid #000;">
                    {{ $item->jml_minggu }}
                </td>
                <td style="padding: 2px; text-align: right; border: 1px solid #000;">
                    {{ $item->jml_pertemuan_perminggu }}</td>
                <td style="padding: 2px; text-align: right; border: 1px solid #000;">{{ $item->sakit }}
                </td>
                <td style="padding: 2px; text-align: right; border: 1px solid #000;">{{ $item->ijin }}
                </td>
                <td colspan="2" style="padding: 2px; text-align: center; border: 1px solid #000;">
                    {{ $item->keterangan }}
                </td>
                <td style="padding: 2px; text-align: right; border: 1px solid #000;">
                    {{ $item->alfa }}</td>
                <td style="padding: 2px; text-align: right; border: 1px solid #000;">
                    {{ $item->total_ketidakhadiran }}</td>
                <td style="padding: 2px; text-align: right; border: 1px solid #000;">
                    {{ number_format($item->persentase_ketidakhadiran, 2) }}%</td>
                <td style="padding: 2px; text-align: right; border: 1px solid #000;">
                    {{ number_format($item->persentase_kehadiran, 2) }}%</td>
            </tr>
        @endforeach
        <tr>
            <td style="padding: 2px; text-align: left; border: 1px solid #000;">&nbsp;</td>
            <td style="padding: 2px; text-align: left; border: 1px solid #000;">&nbsp;</td>
            <td style="padding: 2px; text-align: left; border: 1px solid #000;">&nbsp;</td>
            <td style="padding: 2px; text-align: left; border: 1px solid #000;">&nbsp;</td>
            <td style="padding: 2px; text-align: left; border: 1px solid #000;">&nbsp;</td>
            <td style="padding: 2px; text-align: left; border: 1px solid #000;">&nbsp;</td>
            <td colspan="2" style="padding: 2px; text-align: left; border: 1px solid #000;">&nbsp;
            </td>
            <td style="padding: 2px; text-align: left; border: 1px solid #000;">&nbsp;</td>
            <td style="padding: 2px; text-align: left; border: 1px solid #000;">&nbsp;</td>
            <td style="padding: 2px; text-align: left; border: 1px solid #000;">&nbsp;</td>
            <td style="padding: 2px; text-align: left; border: 1px solid #000;">&nbsp;</td>
        </tr>
        <tr>
            <th colspan="10" style="padding: 2px; text-align: right; border: 1px solid #000;">
                PERSENTASE RATA
                RATA</th>
            <th style="padding: 2px; text-align: right; border: 1px solid #000;">
                {{ number_format($rataPersentaseKetidakhadiran, 2) }}%</th>
            <th style="padding: 2px; text-align: right; border: 1px solid #000;">
                {{ number_format($rataPersentaseKehadiran, 2) }}%</th>
        </tr>
    </tbody>
</table>
<table>
    <thead>
        <tr>
            <th colspan="2" style="text-align: center; ">&nbsp;</th>
        </tr>
        <tr>
            <th colspan="2" style="text-align: center; ">&nbsp;</th>
        </tr>
        <tr>
            <th colspan="2" style="text-align: center; ">&nbsp;</th>
        </tr>
        <tr>
            <th colspan="2" style="text-align: center; ">&nbsp;</th>
        </tr>
        <tr>
            <td colspan="5" style="text-align: center; ">Mengetahui,</td>
            <td colspan="7" style="text-align: center; ">Subang, {{ $tanggal }}</td>
        </tr>
        <tr>
            <td colspan="5" style="text-align: center; ">Wakasek Kurikulum</td>
            <td colspan="7" style="text-align: center; ">Kepala Bidang Keahlian TKI</td>
        </tr>
        <tr>
            <th colspan="2" style="text-align: center; ">&nbsp;</th>
        </tr>
        <tr>
            <th colspan="2" style="text-align: center; ">&nbsp;</th>
        </tr>
        <tr>
            <th colspan="2" style="text-align: center; ">&nbsp;</th>
        </tr>
        <tr>
            <th colspan="2" style="text-align: center; ">&nbsp;</th>
        </tr>
        <tr>
            <td colspan="5" style="text-align: center;">
                @foreach ($atasanWakasek as $wakasek)
                    <u>{{ $wakasek->name }}</u>
                @endforeach
            </td>
            <td colspan="7" style="text-align: center;">
                @foreach ($atasanKapro as $kapro)
                    <u>{{ $kapro->name }}</u>
                @endforeach
            </td>
        </tr>
        <tr>
            <td colspan="5" style="text-align: center;">
                @foreach ($atasanWakasek as $wakasek)
                    {{ $wakasek->nip }}
                @endforeach
            </td>
            <td colspan="7" style="text-align: center;">
                @foreach ($atasanKapro as $kapro)
                    {{ $kapro->nip }}
                @endforeach
            </td>
        </tr>

    </thead>
</table>
