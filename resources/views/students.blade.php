@extends('layout.master')

@section('content')
    <h1 class="app-page-title">Student</h1>

    <div class="row g-3 mb-4 align-items-center justify-content-between">

        <div class="col-auto">
            <h1 class="app-page-title mb-0"></h1>
        </div>


        <div class="col-auto">
            <div class="page-utilities">
                <div class="row g-2 justify-content-start justify-content-md-end align-items-center">

                    @if(Auth::user()->role == 'nurse')
                    <div class="col-auto">
                        <a class="btn app-btn-secondary" type="button" data-bs-toggle="modal" data-bs-target="#addstudentModal">
                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-download me-1" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z" />
                                <path fill-rule="evenodd" d="M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3z" />
                            </svg>
                            Add Student
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


    <div class="modal fade" id="addstudentModal" tabindex="-1" role="dialog" aria-labelledby="importModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="importModalLabel">Import Data</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{route('storestudent')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="name">Student ID</label>
                            <input value="{{old('student_id')}}" type="text" name="student_id">
                            @error('student_id')
                            {{$message}}
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="name">Firstname</label>
                            <input value="{{old('firstname')}}" type="text" name="firstname">
                            @error('firstname')
                                {{$message}}
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="name">Middlename</label>
                            <input value="{{old('middlename')}}" type="text" name="middlename">
                            @error('middlename')
                            {{$message}}
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="name">Lastname</label>
                            <input value="{{old('lastname')}}"  type="text" name="lastname">
                            @error('lastname')
                            {{$message}}
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="name">Region</label>
                            <input value="{{old('region')}}" type="text" name="reqion">
                            @error('Region')
                            {{$message}}
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="name">City/Town</label>
                            <input value="{{old('city')}}" type="text" name="city">
                            @error('city')
                            {{$message}}
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="name">Baranggay</label>
                            <input value="{{old('barangay')}}" type="text" name="barangay">
                            @error('barangay')
                            {{$message}}
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="name">Course</label>
                            <select name="course">
                                <option value="bsa">
                                    BSA
                                </option>
                                <option value="bsit">
                                    BSIT
                                </option>
                            </select>
                            @error('course')
                            {{$message}}
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="year">Year</label>
                            <select name="year">
                                <option value="1">
                                    First Year
                                </option>
                                <option value="2">
                                    Second Year
                                </option>
                                <option value="3">
                                    Third Year
                                </option>
                                <option value="4">
                                    Fourth Year
                                </option>
                                @error('year')
                                {{$message}}
                                @enderror
                            </select>
                            <div class="form-group">
                                <label for="gender">Sex</label>
                                <select name="gender">
                                    <option value="1">
                                        Male
                                    </option>
                                    <option value="2">
                                        Female
                                    </option>
                                </select>
                                @error('gender')
                                {{$message}}
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="gender">Birthday</label>
                                <input value="{{old('birthday')}}" type="date" name="birthday">
                                @error('birthday')
                                {{$message}}
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="name">Contact</label>
                            <input value="{{old('contact')}}" type="text" name="contact">
                            @error('contact')
                            {{$message}}
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
            $('#studentTable').DataTable({
                processing: true,
                serverSide: false,
                ajax: '{{ route('datatablestudent') }}',
                columns: [
                    { data: 'id', name: 'id' },
                    { data: 'student_id', name: 'Student ID' },
                    { data: 'firstname', name: 'Firstname' },
                    { data: 'middlename', name: 'Middlename' },
                    { data: 'lastname', name: 'Lastname' },
                    { data: 'course', name: 'Course' },
                    { data: 'year', name: 'Year' },
                    { data: 'Actions', name: 'Actions' },
                ]
            });
        });
    </script>
@endpush
