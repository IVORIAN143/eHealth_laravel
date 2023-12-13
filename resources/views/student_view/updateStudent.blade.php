@extends('layout.master')

@section('content')

    <body>


        <h1>Student Update</h1>


        <div class="student-info">
            <form action='{{ route('editstudent', ['id' => $student->id]) }}' method="post" enctype="multipart/form-data">
                @csrf
                <input id="Semester" type="text" name="semester" hidden>
                <input id="Schoolyear" type="text" name="schoolYear" hidden>

                <div>
                    <div class="form-group">
                        <label for="fad_allergy">Food and Drug Allergy:</label>
                        <select name="fad_allergy" id="fad_allergy" class="form-control">
                            <option value="" hidden></option>
                            <option {{ $student->fad_Allergy === 'No' ? 'selected' : '' }} value="No">No</option>
                            <option {{ $student->fad_Allergy === 'Yes' ? 'selected' : '' }} value="Yes">Yes</option>
                        </select>
                        @error('fad_allergy')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group" id="fad_indicate_container" style="display: none;">
                        <label for="fad_indicate">If YES, please indicate:</label>
                        <input value="{{ old('fad_indeicate') ?? $student->fad_indicate }}" type="text"
                            name="fad_indicate" id="fad_indicate" class="form-control">
                        @error('fad_indicate')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>


                    <div class="form-group" id="student-id-container">
                        <label for="student_id">Student ID</label>
                        <input id="student_id" value="{{ old('student_id') ?? $student->student_id }}" type="text"
                            name="student_id" class="form-control">
                        @error('student_id')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                        <div class="text-danger" id="student-id-error"></div>
                    </div>

                    <div class="form-group">
                        <label for="contact">Contact</label>
                        <input id="contact" value="{{ old('contact') ?? $student->contact }}" type="text"
                            name="contact" class="form-control">
                        @error('contact')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                        <div class="text-danger" id="contact-error"></div>
                    </div>

                    <div class="form-group">
                        <label for="lastname">Lastname</label>
                        <input value="{{ old('lastname') ?? $student->lastname }}" type="text" name="lastname"
                            class="form-control">
                        @error('lastname')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="firstname">Firstname</label>
                        <input value="{{ old('firstname') ?? $student->firstname }}" type="text" name="firstname"
                            class="form-control">
                        @error('firstname')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="middlename">Middlename</label>
                        <input value="{{ old('middlename') ?? $student->middlename }}" type="text" name="middlename"
                            class="form-control">
                        @error('middlename')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="gender">Gender</label>
                        <select name="gender" class="form-control">
                            <option value="" hidden></option>
                            <option {{ $student->gender === 'Male' ? 'selected' : '' }} value="Male">Male</option>
                            <option {{ $student->gender === 'Female' ? 'selected' : '' }} value="Female">Female</option>
                        </select>
                        @error('gender')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="civilStat">Civil Status</label>
                        <select name="civilStat" class="form-control">
                            <option value="" hidden></option>
                            <option {{ $student->civilStat === 'Single' ? 'selected' : '' }} value="Single">Single</option>
                            <option {{ $student->civilStat === 'Married' ? 'selected' : '' }} value="Married">Merried
                            </option>
                            <option {{ $student->civilStat === 'Widowed' ? 'selected' : '' }} value="Widowed ">Widowed
                            </option>
                        </select>
                        @error('civilStat')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="dateOfBirth">Date of Birth</label>
                        <input value="{{ old('dateOfBirth') ?? $student->dateOfBirth->format('Y-m-d') }}" type="date"
                            name="dateOfBirth" class="form-control">
                        @error('dateOfBirth')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="course">Course</label>
                        <select name="course" class="form-control">
                            <option value="" hidden></option>
                            <option {{ $student->course === 'bsa' ? 'selected' : '' }} value="bsa">BSA</option>
                            <option {{ $student->course === 'bsit' ? 'selected' : '' }} value="bsit">BSIT</option>
                        </select>
                        @error('course')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="year">Year</label>
                        <select name="year" class="form-control">
                            <option value="" hidden></option>
                            <option {{ $student->year === 1 ? 'selected' : '' }} value="1">First Year</option>
                            <option {{ $student->year === 2 ? 'selected' : '' }} value="2">Second Year</option>
                            <option {{ $student->year === 3 ? 'selected' : '' }} value="3">Third Year</option>
                            <option {{ $student->year === 4 ? 'selected' : '' }} value="4">Fourth Year</option>
                        </select>
                        @error('year')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="homeAddress">Home Address</label>
                        <input value="{{ old('homeAddress') ?? $student->homeAddress }}" type="text"
                            name="homeAddress" class="form-control">
                        @error('homeAddress')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="parentName">Parent or Guardian Name</label>
                        <input value="{{ old('parentName') ?? $student->parentName }}" type="text" name="parentName"
                            class="form-control" placeholder="Whole name">
                        @error('parentName')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="parentAddress">Parent or Guardian Address</label>
                        <input value="{{ old('parentAddress') ?? $student->parentAddress }}" type="text"
                            name="parentAddress" class="form-control">
                        @error('parentAddress')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="relationship">Relationship</label>
                        <select name="relationship" class="form-control">
                            <option value="" hidden=""></option>
                            <option {{ $student->relationship === 'Parent' ? 'selected' : '' }} value="Parent">Parent
                            </option>
                            <option {{ $student->relationship === 'Guardian' ? 'selected' : '' }} value="Guardian">
                                Guardian</option>
                        </select>
                        @error('relationship')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="parentNumber">Parent or Guardian Number</label>
                        <input id="parentNumber" value="{{ old('parentNumber') ?? $student->parentNumber }}"
                            type="text" name="parentNumber" class="form-control">
                        @error('parentNumber')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                        <div class="text-danger" id="parentNumber-error"></div> <!-- Error message container -->
                    </div>


                    <div class="form-group">
                        <label for="height">Height</label>
                        <input id="height" value="{{ old('height') ?? $student->height }}" type="text"
                            name="height" class="form-control" placeholder="Kilogram not pound">
                        @error('height')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="weight">Weight</label>
                        <input id="weight" value="{{ old('weight') ?? $student->weight }}" type="text"
                            name="weight" class="form-control" placeholder="Centimeter not feet">
                        @error('weight')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="infectedCovid">Are you Infected in COVID-19?</label>
                        <select name="infectedCovid" id="infectedCovid" class="form-control">
                            <option value="" hidden></option>
                            <option {{ $student->infectedCovid === 'No' ? 'selected' : '' }} value="No">No</option>
                            <option {{ $student->infectedCovid === 'Yes' ? 'selected' : '' }} value="Yes">Yes</option>
                        </select>
                        @error('infectedCovid')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group" id="inferctedWhere" style="display: none;">
                        <label for="inferctedWhere">If YES, please indicate:</label>
                        <input value="{{ old('infectedWhere' ?? $student->infectedWhere) }}" type="text"
                            name="inferctedWhere" id="inferctedWhere" class="form-control">
                    </div>
                    @error('inferctedWhere')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                    <div class="form-group">
                        <label for="recieveVaccine">Have you received COVID-19 vaccine?</label>
                        <select name="recieveVaccine" id="recieveVaccine" class="form-control">
                            <option value="" hidden></option>
                            <option {{ $student->recieveVaccine === 'No' ? 'selected' : '' }} value="No">No</option>
                            <option {{ $student->recieveVaccine === 'Yes' ? 'selected' : '' }} value="Yes">Yes</option>
                        </select>
                        @error('recieveVaccine')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group" id="showperdose" style="display: none;">
                        <label for="">If YES, please indicate:</label>
                        <label for="dose1">1st Dose:</label>
                        <input value="{{ old('dose1') ?? $student->dose1 }}" type="text" name="dose1"
                            id="dose1" class="form-control">

                        <label for="dateDose1">1st Dose Date:</label>
                        <input value="{{ old('dateDose1') ?? $student->dataDose1 }}" type="date" name="dateDose1"
                            id="dateDose1" class="form-control">

                        <label for="Location1">Location:</label>
                        <input value="{{ old('Location1') ?? $student->Location1 }}" type="text" name="Location1"
                            id="location1" class="form-control">

                        <label for="dose2">2nd Dose:</label>
                        <input value="{{ old('dose2') ?? $student->Location2 }}" type="text" name="dose2"
                            id="dose2" class="form-control">

                        <label for="dateDose2">2nd Dose Date:</label>
                        <input value="{{ old('dateDose2') ?? $student->dataDose2 }}" type="date" name="dateDose2"
                            id="dateDose2" class="form-control">

                        <label for="Location2">Location:</label>
                        <input value="{{ old('Location2') ?? $student->location1 }}" type="text" name="Location1"
                            id="location2" class="form-control">


                        <label for="Booster1">1st Booster Dose:</label>
                        <input value="{{ old('booster1') ?? $student->booster1 }}" type="text" name="Booster1"
                            id="booster1" class="form-control">

                        <label for="dateBoosterDose1">1st Booster Dose Date:</label>
                        <input value="{{ old('dateBoostDose1') ?? $student->dataBoostDose1 }}" type="date"
                            name="dateBoostDose1" id="dateBoostDose1" class="form-control">

                        <label for="boostLocation1">Location:</label>
                        <input value="{{ old('boostlcation1') ?? $student->boosterLocation1 }}" type="text"
                            name="boostLocation1" id="boostLocation1" class="form-control">


                        <label for="Booster2">2nd Booster Dose:</label>
                        <input value="{{ old('booster2') ?? $student->booster2 }}" type="text" name="Booster2"
                            id="Booster2" class="form-control">

                        <label for="dateBoosterDose2">2nd Booster Dose Date:</label>
                        <input value="{{ old('dateBoostDose1') ?? $student->dataBoostDose1 }}" type="date"
                            name="dateBoostDose2" id="dateBoostDose2" class="form-control">

                        <label for="boostLocation2">Location:</label>
                        <input value="{{ old('boostLocation2') ?? $student->boosterLocation2 }}" type="text"
                            name="boostLocation2" id="boostLocation2" class="form-control">



                    </div>

                </div>

                <div>

                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </body>
@endsection

@push('js')
    <script>
        $(document).ready(function() {
            // studentID
            $(":input").inputmask();
            $("#student_id").inputmask("99-99999");
            $("#student_id").on("input", function() {
                var studentIdValue = $(this).val();
                var isValid = /^\d{2}-\d{5}$/.test(studentIdValue);
                if (!isValid) {
                    $("#student-id-error").text("Invalid student ID format (e.g., 99-99999)");
                } else {
                    $("#student-id-error").text("");
                }

            });

            // studentContactNumber
            $("#contact").inputmask("99999999999");



            // parentNumber
            $("#parentNumber").inputmask("99999999999");

            $("#height").inputmask("999"); // Apply specific mask to the student_id input field
            $("#weight").inputmask("999"); // Apply specific mask to the student_id input field
        });

        $(document).ready(function() {
            $("#fad_allergy").change(function() {
                if ($(this).val() === "Yes") {
                    $("#fad_indicate_container").show();
                } else {
                    $("#fad_indicate_container").hide();
                }
            });

            $('#Semester').val($('#semester').val());
            $('#Schoolyear').val($('#schoolYear').val());
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
    </script>
@endpush
