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
    {{-- <form action="search_date" method="post">
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
    </form> --}}







    <table id="medicineTable" class="table app-table-hover mb-0 text-left">
        <thead>
            <tr>
                <th class="cell">ID</th>
                <th class="cell">Medicine</th>
                <th class="cell">Total Quantity</th>

            </tr>
        </thead>
    </table>
@stop

@push('js')
    <script>
        $(document).ready(function() {
            $('#medicineTable').DataTable({
                serverSide: true,
                processing: true,
                ajax: "{{ route('datatablemedicine') }}", // Assuming you have a route for medicine data
                columns: [{
                        data: 'date',
                        name: 'date'
                    },
                    {
                        data: 'medicine_name',
                        name: 'medicine_name'
                    },
                    {
                        data: 'quantity_used',
                        name: 'quantity_used'
                    }
                    // Add more columns as needed
                ]
            });

            // Add your code to handle the form submission for storing daily medicine data
            $('#yourFormId').submit(function(e) {
                e.preventDefault();

                $.ajax({
                    type: 'POST',
                    url: "{{ route('storeDailyMedicine') }}",
                    data: $(this).serialize(),
                    success: function(response) {
                        alert(response.message);
                        // Add any additional handling as needed
                    },
                    error: function(error) {
                        console.log(error);
                        // Add error handling as needed
                    }
                });
            });
        });
    </script>
@endpush
