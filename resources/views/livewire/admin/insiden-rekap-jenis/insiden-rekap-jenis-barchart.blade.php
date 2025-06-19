<div>
    <div class="flex flex-col">
        <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="container px-6 mx-auto md:container md:mx-auto ">
                <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
                    <div class="col-md-12">
                       
                            <div class="w-full overflow-x-auto">
                                <div class="p-6 relative overflow-x-auto shadow-md sm:rounded-lg">
                                    <div class="flex flex-col">
                                        <h2 class=" my-6 text-2xl font-semibold text-gray-700">
                                           Rekap Jenis Insiden  {{$tahun}}
                                        </h2>
                                        <canvas id="barChart" width="500" height="250"></canvas>
                                        <div>
                                        <button wire:click="kembali"
                                                    class="mt-5 px-4 py-2 font-medium leading-5 text-white transition-colors duration-150 bg-red-600 border border-transparent rounded-lg active:bg-red-600 hover:bg-red-700 focus:outline-none focus:shadow-outline-red"><i
                                                        class="fas fa-fw fa-reply"></i> Kembali</button>
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
            document.addEventListener('livewire:load', function() {
                var ctx = document.getElementById('barChart').getContext('2d');
                var myChart = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: @json($unit),
                        datasets: [{
                                label: 'Umum',
                                data: @json($umum),
                                backgroundColor: 'rgba(75, 192, 192, 2)',
                                borderColor: 'rgba(75, 192, 192, 1)',
                                borderWidth: 1
                            },
                            {
                                label: 'Keselamatan Pasien',
                                data: @json($medis),
                                backgroundColor: 'rgba(255, 99, 132, 2)',
                                borderColor: 'rgba(255, 99, 132, 1)',
                                borderWidth: 1
                            }
                        ]
                    },
                    options: {
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
</div>
