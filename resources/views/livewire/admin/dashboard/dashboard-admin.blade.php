<div>
    <div class="bg-auto mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
        {{-- <div class="flex flex-col">
            <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="container px-6 mx-auto lg:container lg:mx-auto "> --}}
        <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
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
                                        Dashboard Admin PMKP
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
                                                    {{ $portal_sangat_rendah }}
                                                </h5>
                                            </a>

                                            <center>
                                                <a href="{{ url('risk-register-rekap-unit-index') }}"
                                                    class="mt-5 px-4 py-2 font-medium leading-5 text-white transition-colors duration-150 bg-green-600 border border-transparent rounded-lg active:bg-green-600 hover:bg-green-700 focus:outline-none focus:shadow-outline-green"><i
                                                        class="fas fa-fw fa-tree"></i>Sangat Rendah</a>
                                            </center>
                                        </div>
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
                                                    class="px-4 py-2 font-medium leading-5 text-white transition-colors duration-150 bg-yellow-300 border border-transparent rounded-lg active:bg-yellow-300 hover:bg-yellow-500 focus:outline-none focus:shadow-outline-red"><i
                                                        class="fas fa-fw fa-pencil"></i>Sedang</a>
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
                                                    class="px-4 py-2 font-medium leading-5 text-white transition-colors duration-150 bg-orange-500 border border-transparent rounded-lg active:bg-orange-600 hover:bg-orange-700 focus:outline-none focus:shadow-outline-orange"><i
                                                        class="fas fa-fw fa-eye"></i>Tinggi</a>
                                            </center>

                                        </div>
                                        <div
                                            class="p-6 max-w-sm bg-white rounded-lg border border-gray-200 shadow-md dark:bg-gray-800 dark:border-gray-700 basis-1/4">
                                            <a href="{{ url('portal-user-request-index') }}">
                                                <h2
                                                    class="mb-2 text-6xl text-center font-bold tracking-tight text-gray-900 dark:text-white">
                                                    {{ $portal_sangat_tinggi }}
                                                </h2>
                                            </a>

                                            <center>
                                                <a href="{{ url('risk-register-rekap-unit-index') }}"
                                                    class="px-4 py-2 font-medium leading-5 text-white transition-colors duration-150 bg-red-600 border border-transparent rounded-lg active:bg-red-600 hover:bg-red-700 focus:outline-none focus:shadow-outline-yellow"><i
                                                        class="fas fa-fw fa-fire"></i>Sangat Tinggi</a>
                                            </center>
                                        </div>
                                        </div>

                                        <div class="flex flex-col">

                                            <h3 class=" my-6 text-2xl font-semibold text-gray-700">
                                                Matrik Monitoring Grading
                                            </h3>

                                            <canvas id="barChart" width="800" height="150"></canvas>

                                            <h3 class=" mt-5 my-6 text-2xl font-semibold text-gray-700">
                                                Matrik Monitoring Bulanan Periode {{ date('Y') }}
                                            </h3>
                                            <canvas id="lineChart" width="800" height="150"></canvas>


                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>

                        {{--
                                    </div> --}}

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
                                                    backgroundColor: [ 'green', 'blue','yellow','orange', 'red'],
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

                            <script>
                                const ctx = document.getElementById('lineChart').getContext('2d');

                                const lineChart = new Chart(ctx, {
                                    type: 'line',
                                    data: {
                                        labels: @json($label_bulan),
                                        datasets: [
                                            {
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
                                                text: 'Grafik Risiko per Bulan'
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
