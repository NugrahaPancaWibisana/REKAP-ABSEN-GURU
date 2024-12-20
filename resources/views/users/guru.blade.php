<x-user-layout>
    @include('layouts.navigation')
    <section class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="flex flex-col w-full gap-6 p-6 overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div>
                    <input class="rounded-2xl" type="text" id="search" placeholder="Cari guru..."
                        style="width: 100%; padding: 10px; ">
                </div>
            </div>
            <!-- Container untuk Card -->
            <div id="card-container" class="grid grid-cols-1 gap-6 mt-6 sm:grid-cols-2 lg:grid-cols-3">
                <!-- Data Guru akan dimuat di sini -->
            </div>
        </div>
    </section>

    <script>
        function renderCards(data) {
            const container = $('#card-container');
            const filtered = [];

            container.empty();
            if (data.length > 0) {
                data.forEach(item => {
                    container.append(`
                        <div class="flex justify-between p-4 bg-white border rounded-lg shadow-sm">
                            <div>
                                <h2 class="text-lg font-bold">${item.name}</h2>
                                <p><strong>Jurusan:</strong> ${item.jurusan == "KEDUANYA" ? "RPL/TKJ" : item.jurusan}</p>
                                <p><strong>Jumlah Minggu:</strong> ${item.jml_minggu}</p>
                                <p><strong>Pertemuan/Minggu:</strong> ${item.jml_pertemuan_perminggu}</p>
                            </div>
                            <div class="flex items-end">
                                <a class="px-4 py-2 ml-2 text-sm text-center text-white transition-all bg-blue-600 border border-transparent rounded-md shadow-md hover:shadow-lg focus:bg-blue-700 focus:shadow-none active:bg-blue-700 hover:bg-blue-700 active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none" href="/guru/${item.name}/rekap">Rekap</a>
                            </div>
                        </div>
                    `);
                });
            } else {
                container.append('<p>Tidak ada data ditemukan.</p>');
            }
        }

        $(document).ready(function() {
            $.ajax({
                url: "{{ route('search') }}",
                method: "GET",
                success: function(data) {
                    renderCards(data);
                },
                error: function(err) {
                    console.log(err);
                }
            });

            $('#search').on('keyup', function() {
                const query = $(this).val();
                $.ajax({
                    url: "{{ route('search') }}",
                    method: "GET",
                    data: {
                        query
                    },
                    success: function(data) {
                        renderCards(data);
                    },
                    error: function(err) {
                        console.log(err);
                    }
                });
            });
        });
    </script>
</x-user-layout>
