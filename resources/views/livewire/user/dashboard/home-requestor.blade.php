<div>
    <div class="bg-auto mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
        {{-- <div class="flex flex-col">
            <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="container px-6 mx-auto md:container md:mx-auto ">
                    <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800"> --}}
        <div class="col-md-12">
            <div class="card">
                <div>
                    @if (session()->has('user-message'))
                        <div class="alert alert-success">
                            {{ session('user-message') }}
                        </div>
                    @endif
                </div>
                {{-- <div class="w-full overflow-hidden rounded-lg shadow-xs mt-5"> --}}
                <div class="w-full overflow-x-auto">
                    <div>
                        <div class="p-6 relative overflow-x-auto shadow-md sm:rounded-lg">
                            <div class="flex flex-col">
                                <h2 class=" my-6 text-2xl font-semibold text-gray-700
        dark:text-gray-200">
                                    Portal Risk Register
                                </h2>
                                <div>
                                    @if (session()->has('success'))
                                        <div class="p-4 mb-4 text-sm text-green-700 bg-green-100 rounded-lg dark:bg-green-200 dark:text-green-800"
                                            role="alert">
                                            <span class="font-medium">Success!</span> {{ session('success') }}
                                        </div>
                                    @endif
                                    @if (session()->has('error'))
                                        <div class="p-4 mb-4 text-sm text-red-700 bg-red-100 rounded-lg dark:bg-red-200 dark:text-red-800"
                                            role="alert">
                                            <span class="font-medium">Danger alert!</span> {{ session('error') }}
                                        </div>
                                    @endif
                                </div>
                                <div class="px-4 py-3 mt-4 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
                                    <div class="flex flex-row">

                                        <div
                                            class="p-6 max-w-sm bg-white rounded-lg border border-gray-200 shadow-md dark:bg-gray-800 dark:border-gray-700 basis-1/4">
                                            <a href="">
                                                <h5
                                                    class="mb-2 text-6xl text-center font-bold tracking-tight text-gray-900 dark:text-white">
                                                    {{ $portal_rendah }}
                                                </h5>
                                            </a>

                                            <center>
                                                <a href="{{ url('risk-register-rekap-unit-index') }}"
                                                    class="mt-5 px-4 py-2 font-medium leading-5 text-white transition-colors duration-150 bg-blue-600 border border-transparent rounded-lg active:bg-blue-600 hover:bg-blue-700 focus:outline-none focus:shadow-outline-blue"><i
                                                        class="fas fa-fw fa-check"></i> Rendah</a>
                                            </center>
                                        </div>
                                        <div
                                            class="p-6 max-w-sm bg-white rounded-lg border border-gray-200 shadow-md dark:bg-gray-800 dark:border-gray-700 basis-1/4">
                                            <a href="">
                                                <h5
                                                    class="mb-2 text-6xl text-center font-bold tracking-tight text-gray-900 dark:text-white">
                                                    {{ $portal_sedang }}
                                                </h5>
                                            </a>

                                            <center>
                                                <a href="{{ url('risk-register-rekap-unit-index') }}"
                                                    class="px-4 py-2 font-medium leading-5 text-white transition-colors duration-150 bg-green-600 border border-transparent rounded-lg active:bg-green-600 hover:bg-green-700 focus:outline-none focus:shadow-outline-red"><i
                                                        class="fas fa-fw fa-edit"></i>Sedang</a>
                                            </center>
                                        </div>
                                        <div
                                            class="p-6 max-w-sm bg-white rounded-lg border border-gray-200 shadow-md dark:bg-gray-800 dark:border-gray-700 basis-1/4">
                                            <a href="">
                                                <h5
                                                    class="mb-2 text-6xl text-center font-bold tracking-tight text-gray-900 dark:text-white">
                                                    {{ $portal_tinggi }}
                                                </h5>
                                            </a>

                                            <center>
                                                <a href="{{ url('risk-register-rekap-unit-index') }}"
                                                    class="px-4 py-2 font-medium leading-5 text-white transition-colors duration-150 bg-yellow-500 border border-transparent rounded-lg active:bg-yellow-600 hover:bg-yellow-700 focus:outline-none focus:shadow-outline-yellow"><i
                                                        class="fas fa-fw fa-eye"></i>Tinggi</a>
                                            </center>

                                        </div>
                                        <div
                                            class="p-6 max-w-sm bg-white rounded-lg border border-gray-200 shadow-md dark:bg-gray-800 dark:border-gray-700 basis-1/4">
                                            <a href="{{ url('portal-user-request-index') }}">
                                                <h2
                                                    class="mb-2 text-6xl text-center font-bold tracking-tight text-gray-900 dark:text-white">
                                                    {{ $portal_ekstrim }}
                                                </h2>
                                            </a>

                                            <center>
                                                <a href="{{ url('risk-register-rekap-unit-index') }}"
                                                    class="px-4 py-2 font-medium leading-5 text-white transition-colors duration-150 bg-red-600 border border-transparent rounded-lg active:bg-red-600 hover:bg-red-700 focus:outline-none focus:shadow-outline-green"><i
                                                        class="fas fa-fw fa-fire"></i>Ekstrim</a>
                                            </center>
                                        </div>
                                    </div>
                                    <div class="w-full overflow-hidden rounded-lg shadow-xs mt-5">
                                        {{-- <div class="w-full overflow-x-auto">
                                            <table class="min-w-full whitespace-no-wrap" wire:loading.remove>
                                                <thead>
                                                    <tr
                                                        class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">

                                                        <th class="px-4 py-3">Paramter</th>
                                                        <th class="px-4 py-3">Keterangan</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr class="text-gray-700 dark:text-gray-400">

                                                        <td class="px-4 py-3">
                                                            Nik</td>
                                                        <td class="px-4 py-3">
                                                            {{ auth()->user()->nik }}
                                                        </td>
                                                    </tr>
                                                    <tr class="text-gray-700 dark:text-gray-400">

                                                        <td class="px-4 py-3">
                                                            Nama</td>
                                                        <td class="px-4 py-3">
                                                            {{ auth()->user()->first_name }}
                                                            {{ auth()->user()->last_name }}
                                                        </td>
                                                    </tr>
                                                    <tr class="text-gray-700 dark:text-gray-400">

                                                        <td class="px-4 py-3">
                                                            Email</td>
                                                        <td class="px-4 py-3">
                                                            {{ auth()->user()->email }}
                                                        </td>
                                                    </tr>
                                                    <tr class="text-gray-700 dark:text-gray-400">

                                                        <td class="px-4 py-3">
                                                            Unit</td>
                                                        <td class="px-4 py-3">
                                                            {{ auth()->user()->unit->nama_unit }}
                                                        </td>
                                                    </tr>
                                                    <tr class="text-gray-700 dark:text-gray-400">

                                                        <td class="px-4 py-3">
                                                            Level User</td>
                                                        <td class="px-4 py-3">
                                                            {{ auth()->user()->level }}
                                                        </td>
                                                    </tr>

                                                </tbody>
                                            </table>
                                        </div> --}}

                                    </div>
                                    <div class="flex flex-col">
                                        <h2 class=" my-6 text-2xl font-semibold text-gray-700">
                                            Matrik Kontrol Grading
                                        </h2>
                                        <canvas id="barChart" width="900" height="150"></canvas>

                                    </div>

                                    <div class="w-full overflow-x-auto mt-5">
                                    <h2 class=" my-6 text-2xl font-semibold text-gray-700">
                                            Matrik Kontrol Ekstrim ( Merah )
                                        </h2>
                                        <table
                                            class="table-auto w-full border border-gray-200 text-left text-sm text-gray-700p"
                                            wire:loading.remove>
                                            <thead>
                                                <tr
                                                    class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                                                    <th class="px-4 py-3">No</th>
                                                    <th class="px-4 py-3">Aktivitas Kerja</th>
                                                    <th class="px-4 py-3">Kategori Resiko</th>
                                                    <th class="px-4 py-3">Grading Resiko</th>
                                                    <th class="px-4 py-3">Resiko</th>
                                                    <th class="px-4 py-3">Akar Masalah</th>
                                                    <th class="px-4 py-3">Aktif</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($data_risk as $item)
                                                    <tr class="text-gray-700 dark:text-gray-400">
                                                        <td class="px-4 py-3">
                                                            {{ $no++ }}</td>
                                                        <td class="px-4 py-3">
                                                            {{ $item->aktivitas_kerja }}</td>
                                                        <td class="px-4 py-3">
                                                            {{ $item->risk_kategori->nama_kategori }}
                                                        </td>
                                                        <td class="px-4 py-3">
                                                            @if ($item->matrik_kontrol_grade == 1)
                                                                <div
                                                                    class="bg-blue-600 text-white px-2 py-2 font-bold text-center rounded-lg">
                                                                    Rendah </div>
                                                            @elseif($item->matrik_kontrol_grade == 2)
                                                                <div
                                                                    class="bg-green-600 text-white px-2 py-2 font-bold text-center rounded-lg">
                                                                    Sedang
                                                                </div>
                                                            @elseif($item->matrik_kontrol_grade == 3)
                                                                <div
                                                                    class="bg-yellow-500 text-white px-2 py-2 font-bold text-center rounded-lg">
                                                                    Tinggi
                                                                </div>
                                                            @elseif($item->matrik_kontrol_grade == 4)
                                                                <div
                                                                    class="bg-red-600 text-white px-2 py-2 font-bold text-center rounded-lg">
                                                                    Ekstrim </div>
                                                            @endif
                                                        </td>
                                                        <td class="px-4 py-3">
                                                            {{ $item->resiko }}</td>
                                                        <td class="px-4 py-3">
                                                            {{ $item->akar_masalah }}</td>

                                                        <td class="px-4 py-3">
                                                            {{ $item->aktif }}</td>
                                                       
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @push('scripts')
                        <script>
                            document.addEventListener('livewire:load', function() {
                                var ctx = document.getElementById('barChart').getContext('2d');
                                var myChart = new Chart(ctx, {
                                    type: 'bar',
                                    data: {
                                        labels: @json($labels),
                                        datasets: [{
                                                label: 'Jumlah',
                                                data: @json($data),
                                                backgroundColor: ['blue', 'green', 'yellow', 'red'],
                                                borderColor: 'rgba(75, 192, 192, 1)',
                                                borderWidth: 1
                                            },

                                        ]
                                    },
                                    options: {
                                        plugins: {
                                            legend: {
                                                display: false // sembunyikan label
                                            }
                                        },
                                        scales: {
                                            y: {
                                                beginAtZero: true
                                            }
                                        }
                                    }
                                });
                            });
                        </script>
                    @endpush
                    {{--
                                    </div> --}}
