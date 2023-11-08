@extends('layout.master')

@section('content')
    <style>
        .flex-container {
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 10px;
            height: auto;
        }

        .flex-item {
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
        }

        .card:hover {
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        }

        .card a {
            text-decoration: none;
            color: #333;
            font-size: 22px;
            font-weight: bold;
        }

        .card-link {
            display: block;
            padding: 20px;
        }

        canvas {
            max-width: 600px;
            width: 100%;
            height: 100px;
            display: block;
            margin: 10px auto;
        }

        @media (max-width: 768px) {

            /* Styles for smaller screens */
            canvas {
                max-width: 100$;
                height: 100px;
            }
        }
    </style>
    <h1>Medicine Daily</h1>
    {{-- <canvas id="lineChart"></canvas> --}}
    <form action="search_date" method="post">
        @csrf
        <br>
        <div class="container">
            <div class="row">
                <div class="container-fluid">
                    <div class="form-gourp row">
                        <label for="date" class="col-from-label col-sm-3"> Date of Medicine Used from</label>
                        <div class="col-sm-2">
                            <input type="date" class="from-control input-sm" id="from" name="from" required>
                        </div>
                        <label for="date" class="col-from-label col-sm-3"> Date of Medicine Used to</label>
                        <div class="col-sm-2">
                            <input type="date" class="from-control input-sm" id="to" name="to" required>
                        </div>
                        <div class="col-sm-2">
                            <button type="submit" class="btn" name="search" title="Search"><i
                                    class="fa-solid fa-magnifying-glass"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>







    <table id="reportTable" class="display">
        <thead>
            <tr>
                <th>ID</th>
                <th>Medicine Name</th>
                {{-- <th>Content</th>
                <th>Author</th>
                <th>Date Created</th> --}}
            </tr>
        </thead>
    </table>
@stop

@push('js')
    <script src="{{ asset('path-to-chart-js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#reportTable').DataTable({
                serverSide: true,
                processing: true,
                ajax: "{{ route('reports.datatable') }}",
                columns: [{
                        data: 'id',
                        name: 'id'
                    },
                    {
                        data: 'med_name',
                        name: 'med_name'
                    },
                    // {
                    //     data: 'content',
                    //     name: 'content'
                    // },
                    // {
                    //     data: 'author',
                    //     name: 'author'
                    // },
                    // {
                    //     data: 'date_created',
                    //     name: 'date_created'
                    // }
                ]
            });
        });

        $('.datepicker').datepicker({
        format: 'yyyy-mm-dd',
        autoclose: true
        });

        // // Sample line chart data (replace this with your actual data)
        // let ctx = document.getElementById('lineChart').getContext('2d');
        // let lineChart = new Chart(ctx, {
        //     type: 'line',
        //     data: {
        //         labels: ['Week 1', 'Week 2', 'Week 3', 'Week 4'],
        //         datasets: [{
        //             label: 'Medicine Daily Used',
        //             data: [10, 15, 20, 18],
        //             borderColor: 'green',
        //             fill: false
        //         }]
        //     },
        //     options: {
        //         scales: {
        //             y: {
        //                 beginAtZero: true
        //             }
        //         }
        //     }
        // });
        });
    </script>
@endpush
