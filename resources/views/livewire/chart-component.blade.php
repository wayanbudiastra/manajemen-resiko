
<div>
    <canvas id="myChart" width="400" height="200"></canvas>


    @push('scripts')
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script>
            document.addEventListener('livewire:load', function () {
                Livewire.on('updateChart', function (data) {
                    updateChart(data);
                    console.log(data);
                });


                function updateChart(data) {
                    var ctx = document.getElementById('myChart').getContext('2d');
                    var myChart = new Chart(ctx, {
                        type: 'bar',
                        data: {
                            labels: ['Label 1', 'Label 2', 'Label 3', 'Label 4', 'Label 5'],
                            datasets: [{
                                label: 'Grafik Data',
                                data: data,
                                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                                borderColor: 'rgba(75, 192, 192, 1)',
                                borderWidth: 1
                            }]
                        },
                        options: {
                            scales: {
                                y: {
                                    beginAtZero: true
                                }
                            }
                        }
                    });
                }
            });
        </script>
    @endpush
</div>
