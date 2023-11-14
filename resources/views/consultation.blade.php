@extends('layout.master')

@push('css')
    <link type="text/css" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/south-street/jquery-ui.css"
        rel="stylesheet">
    <link type="text/css" href="assets/css/jquery.signature.css" rel="stylesheet">
@endpush

@section('content')
    <style>
        .signature-container {
            border: 1px solid #e0e0e0;
            border-radius: 8px;
            text-align: center;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .signature-buttons {
            margin-top: 15px;
        }

        #clearButton {
            padding: 8px 16px;
            background-color: #f9f9f9;
            border: 1px solid #ccc;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s, color 0.3s;
        }

        #clearButton:hover {
            background-color: red;
        }
    </style>




    <h1>Consultation</h1>

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
                                data-bs-target="#addConsultModal">
                                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-download me-1"
                                    fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z" />
                                    <path fill-rule="evenodd"
                                        d="M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3z" />
                                </svg>
                                Add Consultation
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

    <div class="tab-content" id="orders-table-tab-content">
        <div class="tab-pane fade show active" id="orders-all" role="tabpanel" aria-labelledby="orders-all-tab">
            <div class="app-card app-card-orders-table shadow-sm mb-5">
                <div class="app-card-body">
                    <div class="table-responsive">
                        <table id="consulttable" class="table app-table-hover mb-0 text-left">
                            <thead>
                                <tr>
                                    <th class="cell">ID</th>
                                    <th class="cell">Student Name</th>
                                    <th class="cell">Diagnosis</th>
                                    <th class="cell">Prescribe Medicine</th>
                                    <th class="cell">Used Equipment</th>
                                    <th class="cell"> Instruction</th>
                                    <th class="cell"> Status</th>
                                    <th class="cell">Actions</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="modal fade" id="addConsultModal" tabindex="-1" role="dialog" aria-labelledby="importModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="importModalLabel">Add Consultation</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('storeConsult') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <input id="Semester" type="text" name="semester" hidden />
                    <input id="Schoolyear" type="text" name="schoolYear" hidden />
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="student">Student</label>
                            <select id="student" name="student_id" class="form-control" required>
                                @foreach ($students as $student)
                                    <option value="{{ $student->id }}">{{ $student->lastname }} {{ $student->fistname }}
                                        {{ $student->middlename }}, {{ $student->student_id }},
                                        {{ $student->course }}-{{ $student->year }}</option>
                                @endforeach
                            </select>
                            @error('student_id')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="complaints">Complaints</label>
                            <textarea name="complaints" id="complaints" class="form-control" rows="5" required></textarea>
                            @error('complaints')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="diagnosis">Diagnosis</label>
                            <textarea name="diagnosis" id="diagnosis" class="form-control" rows="5" required></textarea>
                            @error('diagnosis')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="medicine">Select Medicine</label>
                            <select id="medicine" name="medicine[]" multiple class="form-control" style="width: 50%"
                                required>
                                @foreach ($medicines as $medicine)
                                    <option value="{{ $medicine->id }}">{{ $medicine->med_name }}</option>
                                @endforeach
                            </select>
                            @error('medicine')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group" id="medicine_used_quantity_folder">
                        </div>
                        <div class="form-group">
                            <label for="equipment">Select Equipment</label>
                            <select id="equipment" name="equipment[]" multiple class="form-control" style="width: 50%">
                                @foreach ($equipments as $equipment)
                                    <option value="{{ $equipment->id }}">{{ $equipment->equipname }}</option>
                                @endforeach
                            </select>
                            @error('equipment')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group" id="equipment_used_quantity_folder">
                        </div>
                        <div class="form-group">
                            <label for="instruction">Instruction</label>
                            <textarea name="instruction" id="instruction" class="form-control" rows="5" required></textarea>
                            @error('instruction')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="remarks">Remarks</label>
                            <textarea name="remarks" id="remarks" class="form-control" rows="5" required></textarea>
                            @error('remarks')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <!-- Signature Pad Container -->
                            <div class="signature-container">
                                <canvas id="signaturePad" width="400" height="200"></canvas>
                                <div class="signature-buttons">
                                    <button type="button" onclick="clearSignature()" id="clearButton">Clear
                                        Signature</button>
                                    <button type="button" onclick="saveSignature({{ $student->id }})">Save
                                        Signature</button>
                                    <button type="button" onclick="save({{ $student->id }})">Submit</button>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button id="submitBTN" type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <div class="modal fade" id="editConsultModal" tabindex="-1" role="dialog" aria-labelledby="importModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="importModalLabel">Edit Consultation</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('storeConsult') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <input id="Semester" type="hidden" name="semester" hidden />
                    <input id="Schoolyear" type="hidden" name="schoolYear" hidden />
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="student">Student</label>
                            <select id="editStudent" name="student_id" class="form-control">
                                @foreach ($students as $student)
                                    <option value="{{ $student->id }}">{{ $student->lastname }}
                                        {{ $student->fistname }} {{ $student->middlename }}, {{ $student->student_id }},
                                        {{ $student->course }}-{{ $student->year }}</option>
                                @endforeach
                            </select>
                            @error('student_id')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="diagnosis">Diagnosis</label>
                            <textarea name="Diagnosis" id="editDiagnosis" class="form-control" rows="5"></textarea>
                            @error('diagnosis')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="complaints">complaints</label>
                            <textarea name="complaints" id="editComplaints" class="form-control" rows="5"></textarea>
                            @error('complaints')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="medicine">Select Medicine</label>
                            <select id="editMedicine" name="medicine[]" multiple class="form-control"
                                style="width: 50%;">
                                @foreach ($medicines as $medicine)
                                    <option value="{{ $medicine->id }}">{{ $medicine->med_name }}</option>
                                @endforeach
                            </select>
                            @error('medicine')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group" id="medicine_used_quantity_folder">
                        </div>

                        <div class="form-group">
                            <label for="equipment">Select Equipment</label>
                            <select id="editEquipment" name="equipment[]" multiple class="form-control"
                                style="width: 50%;">
                                @foreach ($equipments as $equipment)
                                    <option value="{{ $equipment->id }}">{{ $equipment->equipname }}</option>
                                @endforeach
                            </select>
                            @error('equipment')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group" id="equipment_used_quantity_folder">

                        </div>

                        <div class="form-group">
                            <label for="instruction">Instruction</label>
                            <textarea name="instruction" id="editInstruction" class="form-control" rows="5"></textarea>
                            @error('instruction')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="remarks">Instruction</label>
                            <textarea name="remarks" id="editRemarks" class="form-control" rows="5"></textarea>
                            @error('remarks')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
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
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    {{-- <script type="text/javascript" src="js/jquery.ui.touch-punch.js"></script> --}}
    <script src="https://cdn.jsdelivr.net/npm/signature_pad"></script>


    <script>
        $(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            var consulttable = $('#consulttable').DataTable({
                processing: true,
                serverSide: true, // Set to true for server-side processing
                ajax: {
                    url: '{{ route('datatableconsultation') }}',
                    data: function(d) {
                        d.schoolYear = $('#schoolYear').val();
                        d.semester = $('#semester').val();
                    }
                },
                columns: [{
                        data: 'id',
                        name: 'id'
                    },
                    {
                        data: 'student_name',
                        name: 'student_name'
                    },
                    {
                        data: 'diagnosis',
                        name: 'diagnosis'
                    },
                    {
                        data: 'prescrib_med',
                        name: 'prescrib_med'
                    },
                    {
                        data: 'prescrib_equip',
                        name: 'prescrib_equip'
                    },
                    {
                        data: 'instruction',
                        name: 'instruction'
                    },
                    {
                        data: 'status_string',
                        name: 'status_string'
                    },
                    {
                        data: 'Actions',
                        name: 'Actions'
                    }
                ]
            });
            $('#Semester').val($('#semester').val())
            $('#Schoolyear').val($('#schoolYear').val())


            $("#semester").on("change", function() {
                $('#Semester').val($('#semester').val())
                consulttable.ajax.reload();

            });
            $("#schoolYear").on("change", function() {
                $('#Schoolyear').val($('#schoolYear').val())
                consulttable.ajax.reload();
            });



            //////////////////////////////////////
            $('#student').select2({
                dropdownParent: $('#addConsultModal')
            });
            $('#medicine').select2({
                dropdownParent: $('#addConsultModal')
            });
            $('#equipment').select2({
                dropdownParent: $('#addConsultModal')
            })


            $('#editStudent').select2({
                dropdownParent: $('#editConsultModal')
            });
            $('#editMedicine').select2({
                dropdownParent: $('#editConsultModal')
            });
            $('#editEquipment').select2({
                dropdownParent: $('#editConsultModal')
            });

            ///////////////////////////////////////


            $("#medicine").change(function() {
                var medicine_used = $("#medicine").val();
                var $folder = $('#medicine_used_quantity_folder');

                // I-clear ang mga umiiral na elemento sa #medicine_used_quantity_folder
                $folder.empty();

                medicine_used.forEach(function(medicine) {
                    $folder.append(
                        '<div><label>Quantity</label><input type="text" name="quantity[' +
                        medicine + ']" class="form-control" required></div>'
                    );
                });
            });
            $("#editMedicine").change(function() {
                var medicine_used = $("#Medicine").val();
                var $folder = $('#medicine_used_quantity_folder');

                $folder.empty();

                medicine_used.forEach(function(medicine) {
                    $folder.append(
                        '<div><label>Quantity</label><input type="text" name="quantity[' +
                        medicine + ']" class="form-control" required></div>'
                    );
                });
            });
            ///////////////////////////////////
            $('#equipment').change(function() {
                var equipment_used = $('#equipment').val();
                var $folder = $('#equipment_used_quantity_folder');

                $folder.empty();

                equipment_used.forEach(function(equipment) {
                    $folder.append(
                        '<div><label>Quantity</label><input type="text" name="equip_quantity[' +
                        equipment + ']" class="form-control" required ></input></div>'
                    );
                });
            });
            $('#editEquipment').change(function() {
                var equipment_used = $('#equipment').val();
                var $folder = $('#equipment_used_quantity_folder');

                $folder.empty();

                equipment_used.forEach(function(equipment) {
                    $folder.append(
                        '<div><label>Quantity</label><input type="text" name="equip_quantity[' +
                        equipment + ']" class="form-control" required ></input></div>'
                    );
                });
            });

            $('#submitBTN').on('click', function() {
                var canvas = document.getElementById('signaturePad');
                var signatureData = canvas.toDataURL('image/png');

                $.ajax({
                    url: "{{ route('esig') }}",
                    method: "POST",
                    dataType: 'json',
                    data: {
                        _token: "{{ csrf_token() }}",
                        sutdentId: $('#student').val(),
                        signed: signatureData,
                    },
                    success: function(data) {
                        console.log(data);
                    }
                })
            });
        });

        function ShowModal(id, student_id, diagnosis, medicine, equipment, instruction) {
            const arrMedicine = medicine.split(",");

            $('#consultID').val(id);
            $('#editStudent').val(student_id).trigger('change');
            $('#editComplaints').val(complaints);
            $('#editDiagnosis').val(diagnosis);
            // $('#editMedicine').val(medicine).trigger('change');
            $('#editEquipment').val(equipment).trigger('change');
            $('#editInstruction').val(instruction);
            $('#editRemarks').val(remarks);
            $('#editConsultModal').modal('show');
        }

        const canvas = document.getElementById('signaturePad');
        const signaturePad = new SignaturePad(canvas, {
            backgroundColor: 'rgb(255, 255, 255)',
        });
        // $(selector).signature();

        // Function to clear the signature
        function clearSignature() {
            signaturePad.clear();
        }

        function saveSignature(studentid) {
            var canvas = document.getElementById('signaturePad');
            var signatureData = canvas.toDataURL('image/png'); // Get signature data as a PNG

            // Create a link element to download the PNG image
            var downloadLink = document.createElement('a');
            downloadLink.href = signatureData;
            downloadLink.download = studentid + '.png';
            downloadLink.click();
        }



        // function save(studentid) {
        //     const fs = require('fs');
        //     const path = require('path');

        //     var canvas = document.getElementById('signaturePad');
        //     var signatureData = canvas.toDataURL('image/png'); // Get signature data as a PNG


        //     // Ensure 'app/public' directory exists
        //     const publicDir = path.join(__dirname, 'app', 'public');
        //     if (!fs.existsSync(publicDir)) {
        //         fs.mkdirSync(publicDir, {
        //             recursive: true
        //         });
        //         console.log('Directory created: app/public');
        //     }

        //     // Save the image to the 'app/public' directory
        //     const imageData = signatureData;
        //     const base64Data = imageData.replace(/^data:image\/png;base64,/, '');

        //     // Write the image data to a file
        //     const imageFilePath = path.join(publicDir, studentid + '.png');
        //     try {
        //         fs.writeFileSync(imageFilePath, base64Data, 'base64');
        //         console.log('Image saved to app/public/signImage.png');
        //     } {
        //         catch (error) {
        //             console.error('Error saving to:', error.messange);
        //         }
        //         // Redirect to the report page based on a condition or user choice
        //         // const redirectTo = condition ? '/medicineMonitoring' : '/medicineDaily'; // Replace 'condition' with your logic
        //         // Perform the redirect
        //         // Example:
        //         res.redirect(redirectTo); // Using Express.js
        //     }
        function save(studentid) {
            dd(studentid);
            const fs = require('fs');
            const path = require('path');

            var canvas = document.getElementById('signaturePad');
            var signatureData = canvas.toDataURL('image/png'); // Get signature data as a PNG

            // Ensure 'app/public' directory exists
            const publicDir = path.join(__dirname, 'app', 'public', 'signImage');
            if (!fs.existsSync(publicDir)) {
                fs.mkdirSync(publicDir, {
                    recursive: true
                });
                console.log('Directory created: app/public/signImage');
            }

            // Save the image to the 'app/public' directory
            const imageData = signatureData;
            const base64Data = imageData.replace(/^data:image\/png;base64,/, '');

            // Write the image data to a file
            const imageFilePath = path.join(publicDir, studentid + '.png');
            try {
                fs.writeFileSync(imageFilePath, base64Data, 'base64');
                console.log('Image saved to', imageFilePath);
                // Redirect to the report page based on a condition or user choice
                // const redirectTo = condition ? '/medicineMonitoring' : '/medicineDaily'; // Replace 'condition' with your logic
                // Perform the redirect
                // Example:
                res.redirect(redirectTo); // Using Express.js
            } catch (error) {
                console.error('Error saving to:', error.message);
            }
        }
    </script>
@endpush
