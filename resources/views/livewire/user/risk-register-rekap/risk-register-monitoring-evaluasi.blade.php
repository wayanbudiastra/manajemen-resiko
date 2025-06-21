<div>
    {{-- <div class="p-6 relative overflow-x-auto shadow-md sm:rounded-lg"> --}}
    <div class="bg-auto mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
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
                    <div class="p-6 relative overflow-x-auto shadow-md sm:rounded-lg">
                        <div class="flex flex-col">
                            <h2 class=" my-6 text-2xl font-semibold text-gray-700">
                                Grafik Monitoring Risk Register Unit {{ $tahun }}
                            </h2>
                            <div>
                                @if (session()->has('success'))
                                    <div class="mt-5 p-4 mb-4 text-sm text-green-700 bg-green-100 rounded-lg dark:bg-green-200 dark:text-green-800"
                                        role="alert">
                                        <span class="font-medium">Success!</span>
                                        {{ session('success') }}
                                    </div>
                                @endif
                                @if (session()->has('error'))
                                    <div class="mt-5 p-4 mb-4 text-sm text-red-700 bg-red-100 rounded-lg dark:bg-red-200 dark:text-red-800"
                                        role="alert">
                                        <span class="font-medium">Danger alert!</span>
                                        {{ session('error') }}
                                    </div>
                                @endif
                            </div>
                            <div class="w-full overflow-hidden rounded-lg shadow-xs mt-5">
                                <div class="flex w-1/2 space-x-2 items-start">
                                    <!-- Select: Lebar 75% -->
                                    <select
                                        class="form-select form-control w-3/4 px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out focus:text-gray-700 focus:bg-white focus:border-green-300 focus:outline-none select2"
                                        name="pilih_tahun" wire:model.defer="pilih_tahun">
                                        <option value="">Pilih Tahun</option>
                                        @foreach ($data as $item)
                                            <option value="{{ $item }}">{{ $item }}</option>
                                        @endforeach
                                    </select>

                                    <!-- Tombol: Lebar 25% -->
                                    <button wire:click="cek_data"
                                        class="w-1/4 px-4 py-2 font-medium leading-5 text-white transition-colors duration-150 bg-green-600 border border-transparent rounded-lg active:bg-green-600 hover:bg-green-700 focus:outline-none focus:shadow-outline-green">
                                        <i class="fas fa-fw fa-search-plus"></i> Cek Data
                                    </button>
                                </div>

                                <div class="w-full overflow-x-auto">
                                    <canvas id="lineChart" width="800" height="150"></canvas>
                                </div>

                            </div>



                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>


@push('scripts')
    <script>
        const ctx = document.getElementById('lineChart').getContext('2d');

        const lineChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: @json($label),
                datasets: [{
                        label: 'Rendah Sekali',
                        data: @json($rendah_sekali),
                        borderColor: 'green',
                        backgroundColor: 'rgba(0, 128, 0, 0.1)',
                        fill: false,
                        tension: 0.3
                    },
                    {
                        label: 'Rendah',
                        data: @json($rendah),
                        borderColor: 'blue',
                        backgroundColor: 'rgba(0, 128, 0, 0.1)',
                        fill: false,
                        tension: 0.3
                    },
                    {
                        label: 'Sedang',
                        data: @json($sedang),
                        borderColor: 'yellow',
                        backgroundColor: 'rgba(0, 0, 255, 0.1)',
                        fill: false,
                        tension: 0.3
                    },
                    {
                        label: 'Tinggi',
                        data: @json($tinggi),
                        borderColor: 'orange',
                        backgroundColor: 'rgba(255, 165, 0, 0.1)',
                        fill: false,
                        tension: 0.3
                    },
                    {
                        label: 'Tinggi Sekali',
                        data: @json($tinggi_sekali),
                        borderColor: 'red',
                        backgroundColor: 'rgba(255, 0, 0, 0.1)',
                        fill: false,
                        tension: 0.3
                    }
                ]
            },
            options: {
                responsive: true,

                plugins: {
                    legend: {
                        position: 'top'
                    },
                    title: {
                        display: true,
                        text: 'Grafik Monitoring Risiko per Bulan'
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        title: {
                            display: true,
                            text: 'Jumlah'
                        }
                    },
                    x: {
                        title: {
                            display: true,
                            text: 'Bulan'
                        }
                    }
                }
            }
        });
    </script>
@endpush
