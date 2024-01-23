@extends('layout.master')

@section('content')
    <h1>Student View</h1>
    <style>
        .student-info {
            background-color: #fff;
            /* border: 1px solid #ddd; */
            border-radius: 8px;
            /* box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); */
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

        .paragraph {
            font-size: 15px;
            font-weight: bold;
        }

        .paragraphs {
            font-size: 15px;
            font-family: Arial, Helvetica, sans-serif;
        }

        .hs {
            font-size: 24px;
            margin-top: 10px;
            margin-bottom: 1px;
            font-weight: bold;
            font-family: Arial, Helvetica, sans-serif;
        }

        .viewstudent {
            display: flex;
            flex-direction: column;
            align-items: left;
            text-align: left;
        }

        .info-section {
            display: flex;
            justify-content: space-between;
        }

        .info-section p {
            margin: 0;
            text-align: justify;
        }

        .info-section strong {
            margin-right: 5px;
            /* Adjust the margin as needed */
        }


        @media print {
            body * {
                visibility: hidden;
            }

            .student-info,
            .student-info * {
                visibility: visible;
            }

            .student-info {
                position: fixed;
                margin: 0;
                width: 100%;
                height: 100%;
                box-sizing: border-box;
                left: 0;
                top: 0;
            }
        }
    </style>


    <div class="student-info">
        <div style="display: inline-flex; align-items: center; justify-content: space-between;">
            <div>
                <img src="{{ asset('assets/images/isu-logo.png') }}" alt="ISU Logo" width="100px" height="100px">
            </div>
            <div style="flex: 1; padding: 0 10px;">
                <div class="paragraphs">Republic of The Philippines</div>
                <div class="paragraph">ISABELA STATE UNIVERSITY</div>
                <div class="paragraphs">Santiago Extension Unit</div>
                <div class="paragraphs">Santiago City</div>
                <div class="hs"><i>Health Services</i></div>
            </div>
            <div style="flex: 0 0 auto;">
                <img src="{{ asset('assets/images/isu-logo-med.png') }}" alt="ISU Logo" width="100px" height="100px">
            </div>
        </div>



        <div>
            <div class= "hs"><i>SCHOOL TREATMENT RECORD</i>
            </div>
            <div class="viewstudent">

                <div class="info-section">
                    <p>Food and Drug Allergy: {{ $student->fad_Allergy ?? 'No' }}</p>
                    <p>Student ID: {{ $student->student_id }}</p>
                </div>
                <div class="info-section">
                    <p>If Yes, please indicate: {{ $student->fad_indicate ?? 'N/A' }}</p>
                    <p>Mobile Number: {{ $student->contact }}</p>
                </div>

                <div class="info-section">
                    <p>Student Name: {{ $student->lastname }} {{ $student->firstname }}
                        {{ $student->middlename }}
                    </p>
                    <p>Age: {{ $student->dateOfBirth->diffInYears(now()) }} years</p>
                    <p>Sex: {{ $student->gender }} </p>
                </div>
                <div class="info-section">
                    <p>Date of Birth: {{ $student->dateOfBirth->format('m-d-Y') }}</p>
                    <p>Citizenship: {{ $student->citizenship }}</p>
                    <p>Civil Status: {{ $student->civilStat }}</p>
                </div>
                <div class="info-section">
                    <p>Place of Birth: {{ $student->placeOfBirth }}</p>
                    <p>Course: {{ $student->course }}</p>
                    <p>Year: {{ $student->year }} </p>
                </div>
                <div class="info-section">
                    <p>Home Address: {{ $student->homeAddress }} </p>
                </div>
                <div class="info-section">
                    <p>Name of Parents/Guardian & Address: {{ $student->parentName }} , {{ $student->parentAddress }}</p>
                    <p>Relationship: {{ $student->relationship }}</p>
                </div>
                <div class="info-section">
                    <p>CP Number of Parents/Guardian: {{ $student->parentNumber }}</p>
                    <p>Height: {{ $student->height }}</p>
                    <p>Weight: {{ $student->weight }}</p>
                </div>
                <div class="info-section">
                    <p>Have you Infected with COVID-19? {{ $student->infectedCovid ?? 'no' }}</p>
                    <p>when and where? {{ $student->infectedWhere ?? 'N/A' }}</p>
                </div>
                <div>
                    <p>Have you recieve COVID-19 Vaccine? {{ $student->recieveVaccine ?? 'no' }}</p>
                    <p>If YES, please indicate bellow:</p>
                </div>
                <div class="info-section">
                    <p><Strong> Vaccine Brand:</Strong></p>
                </div>
                <div class="info-section">
                    <p>First Dose: {{ $student->dose1 ?? 'N/A' }}</p>
                    <p>Date: {{ $student->dateDose1 ?? 'N/A' }}</p>
                    <p>Mun/City/Prov: {{ $student->Location1 ?? 'N/A' }}</p>
                </div>
                <div class="info-section">
                    <p>Second Dose: {{ $student->dose2 ?? 'N/A' }}</p>
                    <p>Date: {{ $student->dataDose2 ?? 'N/A' }}</p>
                    <p>Mun/City/Prov: {{ $student->Location2 ?? 'N/A' }}</p>
                </div>
                <div class="info-section">
                    <p>1st Booster Dose: {{ $student->Booster1 ?? 'N/A' }}</p>
                    <p>Date: {{ $student->dateBoostDose1 ?? 'N/A' }}</p>
                    <p>Mun/City/Prov: {{ $student->boosterLocation1 ?? 'N/A' }}</p>
                </div>
                <div class="info-section">
                    <p>2nd Booster Dose: {{ $student->Booster2 ?? 'N/A' }}</p>
                    <p>Date: {{ $student->dateBoostDose2 ?? 'N/A' }}</p>
                    <p>Mun/City/Prov: {{ $student->boosterLocation2 ?? 'N/A' }}</p>
                </div>

            </div>

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
                                                <td>{{ $consultation->updated_at->format('m - d - Y') }}</td>
                                                <td>{{ $consultation->complaints }}</td>
                                                <td>{{ $consultation->diagnosis }}</td>
                                                <td>{{ $consultation->instruction }}</td>
                                                <td>{{ $consultation->remarks }}</td>
                                                <td>
                                                    {{ $consultation->status == 0 ? 'Nurse' : 'Physician' }}
                                                </td>

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
    </div>
    <a class="btn btn-primary" onclick="printStudentInfo() ">Print</a>
@endsection
@push('js')
    <script>
        function printStudentInfo() {
            var studentInfo = document.querySelector('.container');
            if (studentInfo) {
                // Temporarily hide the rest of the content
                document.body.style.visibility = 'hidden';

                // Show only the student-info div for printing
                studentInfo.style.visibility = 'visible';
                studentInfo.style.position = 'static';

                // Trigger the print dialog
                window.print();

                // Revert the visibility and position styles
                document.body.style.visibility = 'visible';
                // studentInfo.style.visibility = 'hidden';
                // studentInfo.style.position = 'absolute';
            } else {
                console.error('Element with class "student-info" not found.');
            }
        }
    </script>
@endpush
