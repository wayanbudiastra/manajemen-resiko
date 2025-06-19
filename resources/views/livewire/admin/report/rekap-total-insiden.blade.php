<div>
    <div class="flex flex-col">
        <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="container px-6 mx-auto md:container md:mx-auto ">
                <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
                    <div class="col-md-12">
                        <canvas id="barChart" width="500" height="250"></canvas>
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
                            labels: @json($bulan),
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
