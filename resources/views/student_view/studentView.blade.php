@extends('layout.master')

@section('content')
    <h1>Student View</h1>
    <style>
        .student-info {
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 100%;
            height: 100%;
            width: 100%;
            margin: auto;
            padding: 20px;
            text-align: center;
        }

        .student-info h1 {
            color: #333;
        }

        .student-info p {
            margin: 10px 0;
            color: #555;
        }

        .student-info hr {
            border: 1px solid #ddd;
            margin: 20px 0;
        }
    </style>


    <div class="student-info">
        <p><strong>Student ID:</strong> {{ $student->student_id }}</p>
        <p><strong>Student Name:</strong> {{ $student->lastname }} {{ $student->firstname }} {{ $student->middlename }}</p>
        <p><strong>Course and Section:</strong> {{ $student->course }}-{{ $student->year }}</p>
        <div class="tab-content" id="orders-table-tab-content">
            <div class="tab-pane fade show active" id="orders-all" role="tabpanel" aria-labelledby="orders-all-tab">
                <div class="app-card app-card-orders-table shadow-sm mb-5">
                    <div class="app-card-body">
                        <div class="table-responsive">
                            <table id="consulttable" class="table app-table-hover mb-0 text-center">
                                <thead>
                                    <tr>
                                        <th class="cell">Date</th>
                                        <th class="cell">Complaints</th>
                                        <th class="cell">Diagnosis</th>
                                        <th class="cell">Treatment</th>
                                        <th class="cell">Remarks</th>
                                        <th class="cell">Physician/Nurse</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($student->consultation as $consultation)
                                        <tr>
                                            {{-- Add the necessary columns based on your table structure --}}
                                            <td>{{ $consultation->updated_at }}</td>
                                            <td>{{ $consultation->complaints }}</td>
                                            <td>{{ $consultation->diagnosis }}</td>
                                            <td>{{ $consultation->instruction }}</td>
                                            <td>{{ $consultation->remarks }}</td>
                                            <td>{{ $consultation->users }}</td>
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
