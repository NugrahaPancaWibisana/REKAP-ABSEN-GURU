<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Dashboard Admin') }}
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="flex flex-col gap-5 mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="flex w-full h-full gap-6 p-6 overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <a href="#"
                    class="inline-flex items-center px-4 py-2 text-xs font-semibold tracking-widest text-gray-700 uppercase transition duration-150 ease-in-out bg-white border border-gray-300 rounded-md shadow-sm hover:bg-gray-50 focus:outline-none disabled:opacity-25 focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                    halo
                </a>
            </div>

            <div class="flex flex-col w-full h-full gap-6 p-6 overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="text-gray-900 text-center font=bold">
                    {{ __('LAPORAN KETIDAKHADIRAN GURU DI KELAS KOMPETENSI KEAHLIAN REKAYASA PERANGKAT LUNAK') }}
                    <br />
                    <strong class="text-xl">{{ __('SMK NEGERI 1 SUBANG') }}</strong>
                    <br />
                    {{ __('TAHUN PELAJARAN ') }}
                    {{ today()->format('Y') - 1 }}/{{ today()->format('Y') }}
                </div>

                <div class="w-full h-full overflow-y-auto">
                    <table class="table w-full border border-collapse border-slate-500">
                        <thead class="text-black bg-gray-200 ">
                            <tr>
                                <th rowspan="2" class="text-center border border-gray-600">NO</th>
                                <th rowspan="2" class="text-center border border-gray-600">NAMA GURU</th>
                                <th rowspan="2" class="text-center border border-gray-600">JML MINGGU</th>
                                <th rowspan="2" class="text-center border border-gray-600">
                                    JML<br />PERTEMUAN<br />PERMINGGU
                                </th>
                                <th colspan="5" class="text-center border border-gray-600">KETIDAKHADIRAN</th>
                                <th rowspan="2" class="text-center border border-gray-600">JML KETIDAK<br />HADIRAN
                                </th>
                                <th rowspan="2" class="text-center border border-gray-600">
                                    %<br />KETIDAK<br />HADIRAN</th>
                                <th rowspan="2" class="text-center border border-gray-600">%<br />KEHADIRAN</th>
                            </tr>
                            <tr>
                                <th class="text-center border border-gray-600">SAKIT</th>
                                <th class="text-center border border-gray-600">IZIN</th>
                                <th colspan="2" class="text-center border border-gray-600">KETERANGAN</th>
                                <th class="text-center border border-gray-600">ALFA</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $item)
                                <tr>
                                    <td class="p-[2px] text-center border border-gray-600">{{ $counter++ }}</td>
                                    <td class="p-[2px] text-left border border-gray-600">{{ $item->name }}</td>
                                    <td class="p-[2px] text-right border border-gray-600">{{ $item->jml_minggu }}</td>
                                    <td class="p-[2px] text-right border border-gray-600">
                                        {{ $item->jml_pertemuan_perminggu }}</td>
                                    <td class="p-[2px] text-right border border-gray-600">{{ $item->sakit }}</td>
                                    <td class="p-[2px] text-right border border-gray-600">{{ $item->ijin }}</td>
                                    <td colspan="2" class="p-[2px] text-center border border-gray-600">
                                        {{ $item->keterangan }}</td>
                                    <td class="p-[2px] text-right border border-gray-600">{{ $item->alfa }}</td>
                                    <td class="p-[2px] text-right border border-gray-600">
                                        {{ $item->total_ketidakhadiran }}</td>
                                    <td class="p-[2px] text-right border border-gray-600">
                                        {{ number_format($item->persentase_ketidakhadiran, 2) }}%</td>
                                    <td class="p-[2px] text-right border border-gray-600">
                                        {{ number_format($item->persentase_kehadiran, 2) }}%</td>
                                </tr>
                            @endforeach
                            <tr>
                                <td class="p-[2px] text-right border border-gray-600">&nbsp;</td>
                                <td class="p-[2px] text-left border border-gray-600">&nbsp;</td>
                                <td class="p-[2px] text-right border border-gray-600">&nbsp;</td>
                                <td class="p-[2px] text-right border border-gray-600">&nbsp;</td>
                                <td class="p-[2px] text-right border border-gray-600">&nbsp;</td>
                                <td colspan="2" class="p-[2px] text-right border border-gray-600">&nbsp;</td>
                                <td class="p-[2px] text-right border border-gray-600">&nbsp;</td>
                                <td class="p-[2px] text-right border border-gray-600">&nbsp;</td>
                                <td class="p-[2px] text-right border border-gray-600">&nbsp;</td>
                                <td class="p-[2px] text-right border border-gray-600">&nbsp;</td>
                            </tr>
                            <tr>
                                <th colspan="10" class="p-[2px] text-right border border-gray-600">PERSENTASE RATA
                                    RATA</th>
                                <th class="p-[2px] text-right border border-gray-600">
                                    {{ number_format($rataPersentaseKetidakhadiran, 2) }}%
                                </th>
                                <th class="p-[2px] text-right border border-gray-600">
                                    {{ number_format($rataPersentaseKehadiran, 2) }}%
                                </th>
                            </tr>

                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
