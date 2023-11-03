@extends('layout.master')

@section('content')

<style>
    /* Update the styling */

    .flex-container {
        display: flex;
        justify-content: center;
        align-items: center;
        /* background-color: #f1f1f1;    */
        padding: 10px;
        height: auto;
        /* Set height to fill the viewport */
    }

    .flex-item {
        /* flex: 1; */
        margin: 10px;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .card {
        background: #fff;
        padding: 10px;
        text-align: center;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        border-radius: 8px;
        transition: all 0.3s ease;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        max-width: 600px;
        /* Set max width for better readability */
    }

    .card:hover {
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
    }

    canvas {
        width: 100%;
        height: 240px;
        display: block;
        margin: 20px auto;
        /* Adjust margin for better centering */
    }

    .card a {
        text-decoration: none;
        color: #333;
        /* Set text color for readability */
        font-size: 22px;
        font-weight: bold;
    }

    .card-link {
        display: block;
        padding: 20px;
    }
</style>
<h1> Dashboard </h1>

<!-- Structure remains the same as your previous HTML code -->

<div class="flex-container">
    <div class="flex-item">
        <div class="card">
            <a href="#">Consultation</a>
            <canvas id="myDonutChart"></canvas>
        </div>
    </div>
    <div class="flex-item">
        <div class="card">
            <a href="#">Daily Medicine </a>
            <canvas id="medicineChart"></canvas>
        </div>
    </div>
    <div class="flex-item">
        <div class="card">
            <a href="#">Monthly Consumption</a>
            <canvas id="medicineSupplyChart"></canvas>
        </div>
    </div>
</div>




<div class="row g-4 mb-4">
    <div class="col-6 col-lg-3">
        <div class="app-card app-card-stat shadow-sm h-100">
            <div class="app-card-body p-3 p-lg-4">
                <h4 class="stats-type mb-1">Student</h4>
                <div id="studentsLabelCount" class="stats-figure"></div>
                <div class="stats-meta text-success">
                    {{-- <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-arrow-up" fill="currentColor" xmlns="http://www.w3.org/2000/svg">--}}
                    {{-- <path fill-rule="evenodd" d="M8 15a.5.5 0 0 0 .5-.5V2.707l3.146 3.147a.5.5 0 0 0 .708-.708l-4-4a.5.5 0 0 0-.708 0l-4 4a.5.5 0 1 0 .708.708L7.5 2.707V14.5a.5.5 0 0 0 .5.5z"></path>--}}
                    {{-- </svg> 20%--}}
                </div>
            </div><!--//app-card-body-->
            <a class="app-card-link-mask" href="{{route('students')}}"></a>
        </div><!--//app-card-->
    </div><!--//col-->

    <div class="col-6 col-lg-3">
        <div class="app-card app-card-stat shadow-sm h-100">
            <div class="app-card-body p-3 p-lg-4">
                <h4 class="stats-type mb-1">Equipment</h4>
                <div class="stats-figure">{{ $equipment }}</div>
                <div class="stats-meta text-success">
                    {{-- <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-arrow-down" fill="currentColor" xmlns="http://www.w3.org/2000/svg">--}}
                    {{-- <path fill-rule="evenodd" d="M8 1a.5.5 0 0 1 .5.5v11.793l3.146-3.147a.5.5 0 0 1 .708.708l-4 4a.5.5 0 0 1-.708 0l-4-4a.5.5 0 0 1 .708-.708L7.5 13.293V1.5A.5.5 0 0 1 8 1z"></path>--}}
                    {{-- </svg> --}}
                </div>
            </div><!--//app-card-body-->
            <a class="app-card-link-mask" href="{{route('inventory')}}"></a>
        </div><!--//app-card-->
    </div><!--//col-->
    <div class="col-6 col-lg-3">
        <div class="app-card app-card-stat shadow-sm h-100">
            <div class="app-card-body p-3 p-lg-4">
                <h4 class="stats-type mb-1">Medicine</h4>
                <div class="stats-figure">{{$medicine}}</div>
                <div class="stats-meta text-success">
                    {{-- <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-arrow-down" fill="currentColor" xmlns="http://www.w3.org/2000/svg">--}}
                    {{-- <path fill-rule="evenodd" d="M8 1a.5.5 0 0 1 .5.5v11.793l3.146-3.147a.5.5 0 0 1 .708.708l-4 4a.5.5 0 0 1-.708 0l-4-4a.5.5 0 0 1 .708-.708L7.5 13.293V1.5A.5.5 0 0 1 8 1z"></path>--}}
                    {{-- </svg> --}}
                </div>
            </div><!--//app-card-body-->
            <a class="app-card-link-mask" href="{{route('inventory')}}"></a>
        </div><!--//app-card-->
    </div><!--//col-->



    <div class="col-6 col-lg-3">
        <div class="app-card app-card-stat shadow-sm h-100">
            <div class="app-card-body p-3 p-lg-4">
                <h4 class="stats-type mb-1">Consultation</h4>
                <div class="stats-figure"></div>

            </div><!--//app-card-body-->
            <a class="app-card-link-mask" href="{{route('consultation')}}"></a>
        </div><!--//app-card-->
    </div><!--//col-->



    @if(Auth::user()->role == 'nurse')
    <div class="col-6 col-lg-3">
        <div class="app-card app-card-stat shadow-sm h-100">
            <div class="app-card-body p-3 p-lg-4">
                <h4 class="stats-type mb-1">User</h4>
                <div class="stats-figure">{{$users}}</div>
                <!-- <div class="stats-meta">
                    Open</div> -->
            </div><!--//app-card-body-->
            <a class="app-card-link-mask" href="{{route('user')}}"></a>
        </div><!--//app-card-->
    </div><!--//col-->
    @endif
</div>
@stop

@push('js')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    $(function() {
        initialize()
        $("#semester").on("change", function() {
            initialize()
        });
        $('#schoolYear').on('change', function() {
            initialize()
        })

    });

    function initialize() {
        $.ajax({
            url: "{{ route('home') }}",
            method: "get",
            data: {
                semester: $("#semester").val(),
                schoolyear: $('#schoolYear').val()
            },
            success: function(response) {
                $('#studentsLabelCount').html(response.students);
                console.log(response.students);
            },
            error: function(xhr, status, error) {
                console.error("AJAX Request Error: " + error);
                console.log("Status: " + status);
            }
        });
    }


    //////////////////////////////////////
    var data = {
        labels: ['Label 1', 'Label 2', 'Label 3'],
        datasets: [{
            data: [30, 40, 20],
            backgroundColor: ['rgb(255, 99, 132)', 'rgb(54, 162, 235)', 'rgb(75, 192, 192)'],
        }]
    };

    var ctx = document.getElementById('myDonutChart').getContext('2d');
    var myDonutChart = new Chart(ctx, {
        type: 'doughnut', // Use 'doughnut' for a donut chart
        data: data,
        options: {
            // Additional options for the chart
        }
    });




    // Sample data for monthly medicine intake and supply
    var months = ['January', 'February', 'March', 'April', 'May', 'June', 'July'];
    var medicineIntake = [10, 15, 20, 18, 25, 22, 30]; // Sample data for medicine intake per month
    var supplyData = [50, 45, 60, 55, 70, 65, 80]; // Sample data for medicine supply per month

    var ctx = document.getElementById('medicineSupplyChart').getContext('2d');
    var medicineSupplyChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: months,
            datasets: [{
                label: 'Medicine Intake',
                data: medicineIntake,
                fill: false,
                borderColor: 'rgb(75, 192, 192)',
                tension: 0.4
            }, {
                label: 'Medicine Supply',
                data: supplyData,
                fill: false,
                borderColor: 'rgb(255, 99, 132)',
                tension: 0.4
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

    // Sample data for medicine intake, using days as labels
    var days = ['Day 1', 'Day 2', 'Day 3', 'Day 4', 'Day 5', 'Day 6', 'Day 7'];
    var medicineTaken = [2, 3, 1, 4, 2, 5, 3]; // Sample data for medicines taken each day

    var ctx = document.getElementById('medicineChart').getContext('2d');
    var medicineChart = new Chart(ctx, {
        type: 'line', // Set the type to 'line' for a line chart
        data: {
            labels: days,
            datasets: [{
                label: 'Medicine Intake',
                data: medicineTaken,
                fill: false,
                borderColor: 'rgb(75, 192, 192)',
                tension: 0.4
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


    var months = ['January', 'February', 'March', 'April', 'May', 'June', 'July'];
    var medicineIntake = [10, 15, 20, 18, 25, 22, 30]; // Sample data for medicine intake per month
    var supplyData = [50, 45, 60, 55, 70, 65, 80]; // Sample data for medicine supply per month

    var ctx = document.getElementById('medicineSupplyChart').getContext('2d');
    var medicineSupplyChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: months,
            datasets: [{
                label: 'Medicine Intake',
                data: medicineIntake,
                fill: false,
                borderColor: 'rgb(75, 192, 192)',
                tension: 0.4
            }, {
                label: 'Medicine Supply',
                data: supplyData,
                fill: false,
                borderColor: 'rgb(255, 99, 132)',
                tension: 0.4
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
</script>

@endpush