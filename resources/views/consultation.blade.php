@extends('layout.master')

@section('content')
<h1 class="app-page-title">Consultation</h1>

<div class="row g-3 mb-4 align-items-center justify-content-between">

    <div class="col-auto">
        <h1 class="app-page-title mb-0"></h1>
    </div>



    <div class="col-auto">
        <div class="page-utilities">
            <div class="row g-2 justify-content-start justify-content-md-end align-items-center">

                @if(Auth::user()->role == 'nurse')
                <div class="col-auto">
                    <a class="btn app-btn-secondary" type="button" data-bs-toggle="modal" data-bs-target="#addConsultModal">
                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-download me-1" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z" />
                            <path fill-rule="evenodd" d="M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3z" />
                        </svg>
                        Add Consultation
                    </a>
                </div>
                <div class="col-auto">
                    <a class="btn app-btn-secondary" type="button" data-toggle="modal" data-target="#importModal">
                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-download me-1" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z" />
                            <path fill-rule="evenodd" d="M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3z" />
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

<div class="modal fade" id="addConsultModal" tabindex="-1" role="dialog" aria-labelledby="importModalLabel" aria-hidden="true">
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
                <input id="Semester" type="text" name="semester" hidden></input>
                <input id="Schoolyear" type="text" name="schoolYear" hidden></input>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="student">Student</label>
                        <select id="student" name="student_id" class="form-control">
                            @foreach($students as $student)
                            <option value="{{ $student->id }}">{{ $student->lastname }} {{ $student->fistname }} {{$student->middlename}}, {{$student->student_id}}, {{$student->course}}-{{$student->year}}</option>
                            @endforeach
                        </select>
                        @error('student_id')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="diagnosis">Diagnosis</label>
                        <textarea name="diagnosis" id="diagnosis" class="form-control" rows="5"></textarea>
                        @error('diagnosis')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="medicine">Select Medicine</label>
                        <select id="medicine" name="medicine[]" multiple class="form-control" style="width: 50%;">
                            @foreach($medicines as $medicine)
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
                        <select id="equipment" name="equipment[]" multiple class="form-control" style="width: 50%;">
                            @foreach($equipments as $equipment)
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
                        <textarea name="instruction" id="instruction" class="form-control" rows="5"></textarea>
                        @error('instruction')
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

<div class="modal fade" id="editConsultModal" tabindex="-1" role="dialog" aria-labelledby="importModalLabel" aria-hidden="true">
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
                <input id="Semester" type="text" name="semester" hidden></input>
                <input id="Schoolyear" type="text" name="schoolYear" hidden></input>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="student">Student</label>
                        <select id="editStudent" name="student_id" class="form-control">
                            @foreach($students as $student)
                            <option value="{{ $student->id }}">{{ $student->lastname }} {{ $student->fistname }} {{$student->middlename}}, {{$student->student_id}}, {{$student->course}}-{{$student->year}}</option>
                            @endforeach
                        </select>
                        @error('student_id')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="diagnosis">Diagnosis</label>
                        <textarea name="diagnosis" id="diagnosis" class="form-control" rows="5"></textarea>
                        @error('diagnosis')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="medicine">Select Medicine</label>
                        <select id="medicine" name="medicine[]" multiple class="form-control" style="width: 50%;">
                            @foreach($medicines as $medicine)
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
                        <select id="equipment" name="equipment[]" multiple class="form-control" style="width: 50%;">
                            @foreach($equipments as $equipment)
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
                        <textarea name="instruction" id="instruction" class="form-control" rows="5"></textarea>
                        @error('instruction')
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
<script>
    $(function() {
        var consulttable = $('#consulttable').DataTable({
            processing: true,
            serverSide: false,
            ajax: {
                "url": '{{ route("datatableconsultation") }}',
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
                    data: 'status_string',
                    name: 'status_string'
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
            consulttable.ajax.reload();

        });
        $("#schoolYear").on("change", function() {
            $('#Schoolyear').val($('#schoolYear').val())
            consulttable.ajax.reload();
        });


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
            dropdownParent: $('#addConsultModal')
        })



        $("#medicine").change(function() {
            var medicine_used = $("#medicine").val();
            var $folder = $('#medicine_used_quantity_folder');

            // I-clear ang mga umiiral na elemento sa #medicine_used_quantity_folder
            $folder.empty();

            medicine_used.forEach(function(medicine) {
                $folder.append(
                    '<div><label>Quantity</label><input type="text" name="quantity[' + medicine + ']" class="form-control" required></div>'
                );
            });
        });

        $('#equipment').change(function() {
            var equipment_used = $('#equipment').val();
            var $folder = $('#equipment_used_quantity_folder');

            $folder.empty();

            equipment_used.forEach(function(equipment) {
                $folder.append(
                    '<div><label>Quantity</label><input type="text" name="equip_quantity[' + equipment + ']" class="form-control" required ></input></div>'
                );
            });
        });
    });

    function ShowModal(id, student_id, diagnosis, medicine, equipment, instruction) {
        const arr = medicine.split(",");
        $('#consultID').val(id);
        $('#editStudent').val(student_id);
        $('#editStudent').trigger('change');
        $('#editDiagnosis').val(diagnosis); // Set the 'diagnosis' in a textarea
        $('#editMedicine').val(arr);
        $('#editMedicine').trigger('change');
        $('#editEquipment').trigger('change');
        $('#editInstruction').val(instruction); // Set the 'instruction' in a textarea
        $('#editConsultModal').modal('show');
    }
</script>
@endpush