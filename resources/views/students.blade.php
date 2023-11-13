@extends('layout.master')

@section('content')
    <h1>Students</h1>

    <div class="row g-3 mb-4 align-items-center justify-content-between">

        <div class="col-auto">
            <h1 class="app-page-title mb-0"></h1>
        </div>


        <div class="col-auto">
            <div class="page-utilities">
                <div class="row g-2 justify-content-start justify-content-md-end align-items-center">

                    @if (Auth::user()->role == 'nurse')
                        <div class="col-auto">
                            <a class="btn app-btn-secondary" type="button" data-bs-toggle="modal"
                                data-bs-target="#addstudentModal">
                                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-download me-1"
                                    fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z" />
                                    <path fill-rule="evenodd"
                                        d="M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3z" />
                                </svg>
                                Add Student
                            </a>
                        </div>
                        <div class="col-auto">
                            <a class="btn app-btn-secondary" type="button" data-toggle="modal" data-target="#importModal">
                                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-download me-1"
                                    fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z" />
                                    <path fill-rule="evenodd"
                                        d="M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3z" />
                                </svg>
                                Import Data
                            </a>
                        </div>
                    @endif

                </div><!--//row-->
            </div><!--//table-utilities-->
        </div><!--//col-auto-->
    </div><!--//row-->


    <!-- Modal Structure -->
    <div class="modal" id="importModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Import Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    {{-- <form action="{{ route('import') }}" method="POST" enctype="multipart/form-data" id="importForm">
                    @csrf
                    <div class="mb-3">
                        <label for="importFile" class="form-label">Choose CSV File</label>
                        <input class="form-control" type="file" name="file" id="importFile" accept=".csv">
                    </div>
                </form> --}}
                    <form action="import" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="input-group mb-3">
                            <input type="file" name="file" class="form-control">
                            <button class="btn btn-primary" type="submit">Submit</button>
                        </div>
                    </form>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>



    <div class="tab-content" id="orders-table-tab-content">
        <div class="tab-pane fade show active" id="orders-all" role="tabpanel" aria-labelledby="orders-all-tab">
            <div class="app-card app-card-orders-table shadow-sm mb-5">
                <div class="app-card-body">
                    <div class="table-responsive">
                        <table id="studentTable" class="table app-table-hover mb-0 text-left">
                            <thead>
                                <tr>
                                    <th class="cell">Id</th>
                                    <th class="cell">Student Id</th>
                                    <th class="cell">Firstname</th>
                                    <th class="cell">Middlename</th>
                                    <th class="cell">Lastname</th>
                                    <th class="cell">Course</th>
                                    <th class="cell">Year</th>
                                    <th class="cell">Actions</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="modal fade" id="addstudentModal" tabindex="-1" role="dialog" aria-labelledby="importModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document"> <!-- Added 'modal-lg' class -->
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="importModalLabel">Add Student</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('storestudent') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <input id="Semester" type="text" name="semester" hidden></input>
                    <input id="Schoolyear" type="text" name="schoolYear" hidden></input>

                    <div class="modal-body">
                        <div class="form-group">
                            <label for="fad_allergy">Food and Drug Allergy:</label>
                            <select name="fad_allergy" id="fad_allergy" class="form-control">
                                <option value="" hidden></option>
                                <option value="No">No</option>
                                <option value="Yes">Yes</option>
                            </select>
                            @error('fad_allergy')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group" id="fad_indicate" style="display: none;">
                            <label for="fad_indicate">If YES, please indicate:</label>
                            <input type="text" name="fad_indicate" id="fad_indicate" class="form-control">
                            @error('fad_indicate')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group" id="student-id-container">
                            <label for="student_id">Student ID</label>
                            <input id="student_id" value="{{ old('student_id') }}" type="text" name="student_id"
                                class="form-control">
                            @error('student_id')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                            <div class="text-danger" id="student-id-error"></div> <!-- Error message container -->
                        </div>

                        <div class="form-group">
                            <label for="contact">Contact</label>
                            <input id="contact" value="{{ old('contact') }}" type="text" name="contact"
                                class="form-control">
                            @error('contact')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                            <div class="text-danger" id="contact-error"></div> <!-- Error message container -->
                        </div>

                        <div class="form-group">
                            <label for="lastname">Lastname</label>
                            <input value="{{ old('lastname') }}" type="text" name="lastname" class="form-control">
                            @error('lastname')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="firstname">Firstname</label>
                            <input value="{{ old('firstname') }}" type="text" name="firstname" class="form-control">
                            @error('firstname')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="middlename">Middlename</label>
                            <input value="{{ old('middlename') }}" type="text" name="middlename"
                                class="form-control">
                            @error('middlename')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="gender">Gender</label>
                            <select name="gender" class="form-control">
                                <option value="" hidden></option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>
                            @error('gender')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="civilStat">Civil Status</label>
                            <select name="civilStat" class="form-control">
                                <option value="" hidden></option>
                                <option value="Single">Single</option>
                                <option value="Married">Merried</option>
                                <option value="Widowed ">widowed</option>
                            </select>
                            @error('civilStat')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="dateOfBirth">Date of Birth</label>
                            <input value="{{ old('dateOfBirth') }}" type="date" name="dateOfBirth"
                                class="form-control">
                            @error('dateOfBirth')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="course">Course</label>
                            <select name="course" class="form-control">
                                <option value="" hidden></option>
                                <option value="BSA">BSA</option>
                                <option value="BSIT">BSIT</option>
                            </select>
                            @error('course')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="year">Year</label>
                            <select name="year" class="form-control">
                                <option value="" hidden></option>
                                <option value="1">First Year</option>
                                <option value="2">Second Year</option>
                                <option value="3">Third Year</option>
                                <option value="4">Fourth Year</option>
                            </select>
                            @error('year')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="homeAddress">Home Address</label>
                            <input value="{{ old('homeAddress') }}" type="text" name="homeAddress"
                                class="form-control">
                            @error('homeAddress')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="parentName">Parent or Guardian Name</label>
                            <input value="{{ old('parentName') }}" type="text" name="parentName"
                                class="form-control" placeholder="Whole name">
                            @error('parentName')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="parentAddress">Parent or Guardian Address</label>
                            <input value="{{ old('parentAddress') }}" type="text" name="parentAddress"
                                class="form-control">
                            @error('parentAddress')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="relationship">Relationship</label>
                            <select name="relationship" class="form-control">
                                <option value="" hidden=""></option>
                                <option value="Parent">Parent</option>
                                <option value="Guardian">Guardian</option>
                            </select>
                            @error('relationship')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="parentNumber">Parent or Guardian Number</label>
                            <input id="parentNumber" value="{{ old('parentNumber') }}" type="text"
                                name="parentNumber" class="form-control">
                            @error('parentNumber')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                            <div class="text-danger" id="parentNumber-error"></div> <!-- Error message container -->
                        </div>


                        <div class="form-group">
                            <label for="height">Height</label>
                            <input id="height" value="{{ old('height') }}" type="text" name="height"
                                class="form-control">
                            @error('height')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="weight">Weight</label>
                            <input id="weight" value="{{ old('weight') }}" type="text" name="weight"
                                class="form-control">
                            @error('weight')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="infectedCovid">Are you Infected in COVID-19?</label>
                            <select name="infectedCovid" id="infectedCovid" class="form-control">
                                <option value="" hidden></option>
                                <option value="No">No</option>
                                <option value="Yes">Yes</option>
                            </select>
                            @error('infectedCovid')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group" id="inferctedWhere" style="display: none;">
                            <label for="inferctedWhere">If YES, please indicate:</label>
                            <input type="text" name="inferctedWhere" id="inferctedWhere" class="form-control">
                        </div>
                        @error('inferctedWhere')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                        <div class="form-group">
                            <label for="recieveVaccine">Have you received COVID-19 vaccine?</label>
                            <select name="recieveVaccine" id="recieveVaccine" class="form-control">
                                <option value="" hidden></option>
                                <option value="No">No</option>
                                <option value="Yes">Yes</option>
                            </select>
                            @error('recieveVaccine')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group" id="showperdose" style="display: none;">
                            <label for="">If YES, please indicate:</label>
                            <label for="dose1">1st Dose:</label>
                            <input type="text" name="dose1" id="dose1" class="form-control">
                            <label for="dateDose1">1st Dose Date:</label>
                            <input type="date" name="dateDose1" id="dateDose1" class="form-control">
                            <label for="Location1">Location:</label>
                            <input type="text" name="Location1" id="dose1" class="form-control">

                            <label for="dose2">2nd Dose:</label>
                            <input type="text" name="dose2" id="dose2" class="form-control">
                            <label for="dateDose2">2nd Dose Date:</label>
                            <input type="date" name="dateDose2" id="dateDose2" class="form-control">
                            <label for="Location2">Location:</label>
                            <input type="text" name="Location1" id="Location2" class="form-control">

                            <label for="Booster1">1st Booster Dose:</label>
                            <input type="text" name="Booster1" id="Booster1" class="form-control">
                            <label for="dateBoosterDose1">1st Booster Dose Date:</label>
                            <input type="date" name="dateBoostDose1" id="dateBoostDose1" class="form-control">
                            <label for="boostLocation1">Location:</label>
                            <input type="text" name="boostLocation1" id="boostLocation1" class="form-control">

                            <label for="Booster2">2nd Booster Dose:</label>
                            <input type="text" name="Booster2" id="Booster2" class="form-control">
                            <label for="dateBoosterDose2">2nd Booster Dose Date:</label>
                            <input type="date" name="dateBoostDose2" id="dateBoostDose2" class="form-control">
                            <label for="boostLocation2">Location:</label>
                            <input type="text" name="boostLocation2" id="boostLocation2" class="form-control">


                        </div>

                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@stop

@push('js')
    <script>
        $(document).ready(function() {
            $(":input").inputmask(); // Apply input mask to all input fields
            $("#student_id").inputmask("99-99999");

            // Add an input event listener to validate the input
            $("#student_id").on("input", function() {
                var studentIdValue = $(this).val();
                var isValid = /^\d{2}-\d{5}$/.test(studentIdValue);

                if (!isValid) {
                    $("#student-id-error").text("Invalid student ID format (e.g., 99-99999)");
                } else {
                    $("#student-id-error").text(""); // Clear the error message
                }
            });
            $("#contact").inputmask("9999999999");

            // Add an input event listener to validate the input
            $("#contact").on("input", function() {
                var contactValue = $(this).val();
                var isValid = /^\(\d{3}\) \d{3}-\d{4}$/.test(contactValue);

                if (!isValid) {
                    $("#contact-error").text("Invalid contact format (e.g., (123) 456-7890)");
                } else {
                    $("#contact-error").text(""); // Clear the error message
                }
            });
            $("#parentNumber").inputmask("999999-9999");
            $("#parentNumber").on("input", function() {
                var parentNumberValue = $(this).val();
                var isValid = /^\(\d{3}\) \d{3}-\d{4}$/.test(parentNumberValue);
                if (!isValid) {
                    $("#parentNumber-error").text("Invalid format (e.g., (123) 456-7890)");
                } else {
                    $("#parentNumber-error").text("");
                }
            });

            $("#height").inputmask("999"); // Apply specific mask to the student_id input field
            $("#weight").inputmask("999"); // Apply specific mask to the student_id input field
        });


        $(function() {
            var studentTable = $('#studentTable').DataTable({
                processing: true,
                serverSide: false,
                ajax: {
                    "url": "{{ route('datatablestudent') }}",
                    "data": function(d) {
                        d.schoolYear = $('#schoolYear').val();
                        d.semester = $('#semester').val();
                    }
                },
                columns: [{
                        data: 'id',
                        name: 'id'
                    },
                    {
                        data: 'student_id',
                        name: 'Student ID'
                    },
                    {
                        data: 'firstname',
                        name: 'Firstname'
                    },
                    {
                        data: 'middlename',
                        name: 'Middlename'
                    },
                    {
                        data: 'lastname',
                        name: 'Lastname'
                    },
                    {
                        data: 'course',
                        name: 'Course'
                    },
                    {
                        data: 'year',
                        name: 'Year'
                    },
                    {
                        data: 'Actions',
                        name: 'Actions'
                    },
                ]
            });
            $('#Semester').val($('#semester').val())
            $('#Schoolyear').val($('#schoolYear').val())


            $("#semester").on("change", function() {
                $('#Semester').val($('#semester').val())
                studentTable.ajax.reload();

            });
            $("#schoolYear").on("change", function() {
                $('#Schoolyear').val($('#schoolYear').val())
                studentTable.ajax.reload();
            });

        });

        $(document).ready(function() {
            $("#fad_allergy").change(function() {
                if ($(this).val() === "Yes") {
                    $("#fad_indicate").show();
                } else {
                    $("#fad_indicate").hide();
                }
            });

        });

        $(document).ready(function() {
            $("#infectedCovid").change(function() {
                if ($(this).val() === "Yes") {
                    $("#inferctedWhere").show();
                } else {
                    $("#inferctedWhere").hide();
                }
            });
        });

        $(document).ready(function() {
            $("#recieveVaccine").change(function() {
                if ($(this).val() === "Yes") {
                    $("#showperdose").show();
                } else {
                    $("#showperdose").hide();
                }
            });
        });



        $('.app-btn-secondary').on('click', function() {
            $('#importModal').modal('show');
        });
        $(document).ready(function() {
            $('#submitImport').click(function() {
                var fileInput = $('#importFile').get(0).files.length;
                if (fileInput === 0) {
                    alert("Error: No file selected. Please select a file to import.");
                } else {
                    $('#importForm').submit();
                }
            });
        });
    </script>
@endpush
