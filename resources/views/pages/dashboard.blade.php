@extends('layouts.dashboard')

@section('konten')
    <div class="card">
        <div class="card-header">
            <h3>Dashboard</h3>
        </div>
        <div class="card-body">

            <div class="card">
                <div class="card-header">
                    <h4>Grafik Jumlah Pegawai</h4>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <label for="data-select" class="form-label">Data Grafik</label>
                        <select class="form-select" id="data-select">
                            <option selected disabled hidden>Pilih data yang akan ditampilkan dalam bentuk Grafik</option>
                            <option value="status">Status Kepegawaian</option>
                            <option value="jenis_kelamin">Jenis Kelamin</option>
                            <option value="posisi">Posisi</option>
                        </select>
                    </div>
                    <!-- Canvas untuk Chart.js -->
                    <canvas id="myChart"></canvas>
                </div>
            </div>




        </div>
    </div>
@endsection
@push('scripts')
    <script>
        $(document).ready(function() {
            // Inisialisasi chart
            let ctx = document.getElementById('myChart');
            let myChart = new Chart(ctx, {
                type: 'pie',
                data: {
                    labels: [],
                    datasets: [{
                        label: 'Banyak Pegawai',
                        data: [],
                        backgroundColor: [
                            '#FA7070',
                            '#91DDCF',
                            '#03AED2',
                            '#FFE9D0',
                            '#FF76CE',
                        ],
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        },
                    },
                }
            });

            // Fungsi untuk mengambil data dan memperbarui chart
            function fetchData(selectedOption) {
                $.ajax({
                    url: '{{ route('getData') }}',
                    type: 'GET',
                    data: {
                        option: selectedOption
                    },
                    success: function(response) {
                        myChart.data.labels = response.labels;
                        myChart.data.datasets[0].data = response.data;
                        myChart.update();
                    },
                    error: function(xhr) {
                        console.error('Error fetching data:', xhr);
                    }
                });
            }

            // Event listener untuk dropdown
            $('#data-select').change(function() {
                let selectedOption = $(this).val();
                fetchData(selectedOption);
            });
        });
    </script>
@endpush
