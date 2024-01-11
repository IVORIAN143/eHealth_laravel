@extends('layout.master')

@section('content')
    <style>
        #signaturePad {
            width: 100%;
            max-width: 750px;
            height: auto;

            border: 1px solid #000;
        }

        signature-container {
            position: relative;
            width: 100%;
        }

        canvas {
            border: 1px solid #ccc;
            border-radius: 5px;
            display: block;
            margin-bottom: 10px;
        }

        button {
            background-color: #f44336;
            color: #fff;
            border: none;
            padding: 8px 16px;
            font-size: 14px;
            cursor: pointer;
            border-radius: 5px;
        }

        button:hover {
            background-color: #d32f2f;
        }

        @keyframes popUpEffect {
            0% {
                transform: scale(0.8);
                opacity: 0;
            }

            50% {
                transform: scale(1);
                opacity: 1;
            }

            100% {
                transform: scale(1);
                opacity: 1;
            }
        }

        h1 {
            animation: popUpEffect 1.5s ease-out;
            /* 1.5s duration with ease-out timing function */
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
                            <a class="btn app-btn-success" type="button" data-bs-toggle="modal"
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
                                    <th class="cell">Emergency</th>
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
                    <input id="Semester" type="text" name="semester" hidden>
                    <input id="Schoolyear" type="text" name="schoolYear" hidden>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="student">Student</label>
                            <select id="student" name="student_id" class="form-control" style="width: 100%;">
                                @foreach ($students as $student)
                                    <option value="{{ $student->id }}">{{ $student->lastname }} {{ $student->firstname }}
                                        {{ $student->middlename }}, {{ $student->student_id }},
                                        {{ $student->course }}-{{ $student->year }}</option>
                                @endforeach
                            </select>
                            @error('student_id')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="caseStatus">Is this an Emergency?</label>
                            <input type="checkbox" name="caseStatus" id="caseStatus" class="form-check-input">
                            @error('caseStatus')
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
                            <select id="medicine" name="medicine[]" multiple class="form-control" style="width: 100%;"
                                required size="3">
                                @foreach ($medicines as $medicine)
                                    <option
                                        {{ $medicine->totalMed() === 0 ? 'disabled ' : '' }}value="{{ $medicine->id }}">
                                        {{ $medicine->med_name . '(' . $medicine->totalMed() . ')' }}</option>
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
                            <select id="equipment" name="equipment[]" multiple class="form-control"
                                style="width: 100%;">
                                @foreach ($equipments as $equipment)
                                    <option {{ $equipment->TotalSupply() === 0 ? 'disabled' : '' }}
                                        value="{{ $equipment->id }}">
                                        {{ $equipment->equipname . '(' . $equipment->TotalSupply() . ')' }}</option>
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
                            <label for="remarks"></label>Remarks</label>
                            <textarea name="remarks" id="remarks" class="form-control" rows="5" required>{{ old('remarks') }}</textarea>
                            @error('remarks')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="signature">Signature</label>
                            <div>
                                <canvas id="signaturePad" width="750" height="200"></canvas>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button id="clearBtn" type="button" class="btn btn-danger">Clear Signature</button>
                        <button id="saveSignatureBtn" type="submit" class="btn btn-primary">Submit</button>
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
                <form action="{{ route('editConsultation') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <input id="consultID" type="text" name="consultID" hidden></input>
                    <input id="Semester" type="text" name="semester" hidden></input>
                    <input id="Schoolyear" type="text" name="schoolYear" hidden></input>
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
                            <label for="editcaseStatus">Is this an Emergency?</label>
                            <input type="checkbox" name="editcaseStatus" id="editcaseStatus" class="form-check-input"
                                {{ old('editcaseStatus') ? 'checked' : '' }}>

                            @error('editcaseStatus')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="editComplaints">Complaints</label>
                            <textarea name="editComplaints" id="editComplaints" class="form-control" rows="5">{{ old('editComplaints') }}</textarea>
                            @error('editComplaints')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>


                        <div class="form-group">
                            <label for="editDiagnosis">Diagnosis</label>
                            <textarea name="editDiagnosis" id="editDiagnosis" class="form-control" rows="5">{{ old('editDiagnosis') }}</textarea>
                            @error('editDiagnosis')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="editMedicine">Select Medicine</label>
                            <select id="editMedicine" name="medicine[]" multiple class="form-control"
                                style="width: 100%;">
                                @foreach ($medicines as $medicine)
                                    <option {{ $medicine->totalMed() === 0 ? 'disabled' : '' }}
                                        value="{{ $medicine->id }}">
                                        {{ $medicine->med_name . '(' . $medicine->totalMed() . ')' }}</option>
                                @endforeach
                            </select>
                            @error('medicine')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group" id="edit_medicine_used_quantity_folder">
                        </div>

                        <div class="form-group">
                            <label for="editEquipment">Select Equipment</label>
                            <select id="editEquipment" name="editEquipment[]" multiple class="form-control"
                                style="width: 100%;">
                                @foreach ($equipments as $equipment)
                                    <option {{ $equipment->TotalSupply() === 0 ? 'disabled' : '' }}
                                        value="{{ $equipment->id }}">
                                        {{ $equipment->equipname . '(' . $equipment->TotalSupply() . ')' }}</option>
                                @endforeach
                            </select>
                            @error('editEquipment')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group" id="edit_equipment_used_quantity_folder">
                        </div>

                        <div class="form-group">
                            <label for="editInstruction">Instruction</label>
                            <textarea name="editInstruction" id="editInstruction" class="form-control" rows="5">{{ old('editInstruction') }}</textarea>
                            @error('editInstruction')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>


                        <div class="form-group">
                            <label for="editRemarks">Remarks</label>
                            <textarea name="editRemarks" id="editRemarks" class="form-control" rows="5">{{ old('editRemarks') }}</textarea>
                            @error('editRemarks')
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/signature_pad/1.5.3/signature_pad.min.js"></script>
    <script>
        $(function() {
            var consulttable = $('#consulttable').DataTable({
                processing: true,
                serverSide: false,

                ajax: {
                    "url": '{{ route('datatableconsultation') }}',
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
                        data: 'caseStatus',
                        name: 'caseStatus'

                    },
                    {
                        data: 'status_string',
                        name: 'status_string'
                    },
                    {
                        data: 'Actions',
                        name: 'Actions'
                    },
                ]
            });

            // Schoolyear & Semester
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

            // for addConsultModal
            $('#student').select2({
                dropdownParent: $('#addConsultModal')
            });
            $('#medicine').select2({
                dropdownParent: $('#addConsultModal')
            });
            $('#equipment').select2({
                dropdownParent: $('#addConsultModal')
            })

            $("#medicine").change(function() {
                var medicine_used = $("#medicine").val();
                var $folder = $('#medicine_used_quantity_folder');

                $folder.empty();

                medicine_used.forEach(function(medicine) {
                    $folder.append(
                        '<div><label>Quantity</label><input style="text-align:left;" type="text" name="quantity[' +
                        medicine +
                        ']" class="form-control" oninput="this.value=this.value.replace(/[^0-9]/g,\'\').slice(0,2)" maxlength="2" required></div>'
                    );
                });

            });

            $('#equipment').change(function() {
                var equipment_used = $('#equipment').val();
                var $folder = $('#equipment_used_quantity_folder');

                $folder.empty();

                equipment_used.forEach(function(equipment) {
                    $folder.append(
                        '<div><label>Quantity</label><input style="text-align:left;" type="text" name="equip_quantity[' +
                        equipment +
                        ']" class="form-control" oninput="this.value=this.value.replace(/[^0-9]/g,\'\').slice(0,2)" maxlength="2" value=""></div>'
                    );
                });
            });




            $('#editConsultModal').on('shown.bs.modal', function() {
                // for editConsulModal
                $('#editStudent').select2({
                    dropdownParent: $('#editConsultModal')
                });
                $('#editMedicine').select2({
                    dropdownParent: $('#editConsultModal')
                });
                $('#editEquipment').select2({
                    dropdownParent: $('#editConsultModal')
                });

                var medicine_used = $("#editMedicine").val();
                var $folder = $('#edit_medicine_used_quantity_folder');

                $folder.empty();

                medicine_used.forEach(function(medicine) {
                    console.log(medicine)
                    $.ajax({
                        url: '/getMedUsed/' + $('#consultID').val() + '/' + medicine,
                        method: 'get',
                        success: function(data) {
                            console.log(data)
                            $folder.append(
                                '<div><label>Quantity</label><input style="text-align:left;" id="MedQuantity_' +
                                medicine +
                                '" type="text" value="' + data.data.quantity +
                                '" name="editQuantity[' +
                                medicine +
                                ']"  class="form-control" oninput="this.value=this.value.replace(/[^0-9]/g,\'\').slice(0,2)" maxlength="2" required></div>'
                            );
                        },
                        error: function(error) {
                            console.log(error);
                        }
                    })
                });


            });

            $("#editMedicine").change(function() {
                var medicine_used = $("#editMedicine").val();
                var $folder = $('#edit_medicine_used_quantity_folder');


                $folder.empty();

                medicine_used.forEach(function(medicine) {
                    $folder.append(
                        '<div><label>Quantity</label><input style="text-align:left;" id="MedQuantity_' +
                        medicine +
                        '" type="text" name="editQuantity[' +
                        medicine +
                        ']"  class="form-control" oninput="this.value=this.value.replace(/[^0-9]/g,\'\').slice(0,2)" maxlength="2" required></div>'
                    );
                });
            });

            $('#editEquipment').change(function() {
                var equipment_used = $('#editEquipment').val();
                var $folder = $('#edit_equipment_used_quantity_folder');

                $folder.empty();

                equipment_used.forEach(function(equipment) {
                    $folder.append(
                        '<div><label>Quantity</label><input style="text-align:left;" id="EquipQuantity_' +
                        equipment +
                        '" type="text" name="editEquipQuantity[' +
                        equipment +
                        ']" class="form-control" oninput="this.value=this.value.replace(/[^0-9]/g,\'\').slice(0,2)" maxlength="2" value=""></div>'
                    );
                });
            });

        });

        function ShowModal(id, student_id, caseStatus, complaints, diagnosis, remarks, instruction, medicine, equipment,
            medQuantityUsed, equipQuantityUsed) {
            const arrMedicine = medicine.split(",");
            const arrMedicineQuantity = medQuantityUsed.split(",");
            const arrEquipmentQuantity = equipQuantityUsed.split(",");
            const arrEquipment = equipment.split(",");

            console.log(arrMedicineQuantity);


            $('#consultID').val(id);
            $('#editStudent').val(student_id);
            $('#editStudent').trigger('change');
            $('#editcaseStatus').prop('checked', caseStatus);
            $('#editComplaints').val(complaints);
            $('#editDiagnosis').val(diagnosis);
            $('#editMedicine').val(arrMedicine);
            $('#editMedicine').trigger('change');
            $('#editEquipment').val(arrEquipment);
            $('#editEquipment').trigger('change');
            $('#editInstruction').val(instruction);
            $('#editRemarks').val(remarks);
            $('#editConsultModal').modal('show');

            arrMedicine.forEach(element => {
                key = Object.keys(element);
                console.log(element);
                $('#MedQuantity_' + element).val(arrMedicineQuantity[key]);
            });
            arrEquipment.forEach(element => {
                key = Object.keys(element);
                $('#EquipQuantity_' + element).val(arrEquipmentQuantity[key]);
            });


        }







        // for signature DONT TOUCH IT PLEASE!
        document.addEventListener('DOMContentLoaded', function() {
            var canvas = document.getElementById('signaturePad');
            var signaturePad = new SignaturePad(canvas);

            var clearButton = document.getElementById('clearBtn');
            var saveSignatureBtn = document.getElementById('saveSignatureBtn');

            clearButton.addEventListener('click', function() {
                signaturePad.clear();
            });

            saveSignatureBtn.addEventListener('click', function() {
                var studentId = document.getElementById('student').value;
                var imageData = signaturePad.toDataURL();

                // Use AJAX to send the signature data to your server
                saveSignature(imageData, studentId);
            });

            function saveSignature(imageData, studentId) {
                // Send an AJAX request to your Laravel backend
                $.ajax({
                    url: '{{ route('signature.save') }}',
                    type: 'POST',
                    data: {
                        '_token': '{{ csrf_token() }}',
                        'signature': imageData,
                        'student_id': studentId // Pass student ID to the backend
                    },
                    success: function(data) {
                        // Handle the success response
                        console.log(data);
                    },
                    error: function(error) {
                        // Handle the error response
                        console.error('Error:', error);
                    }
                });
            }
        });
    </script>
@endpush
