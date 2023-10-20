@extends('layout.master')

@section('content')
    <h1 class="app-page-title">Inventory</h1>

    <div class="row g-3 mb-4 align-items-center justify-content-between">

        <div class="col-auto">
            <h1 class="app-page-title mb-0"></h1>
        </div>



        <div class="col-auto">
            <div class="page-utilities">
                <div class="row g-2 justify-content-start justify-content-md-end align-items-center">

                    @if(Auth::user()->role == 'nurse')
                    <div class="col-auto">
                        <a class="btn app-btn-secondary" type="button" data-bs-toggle="modal" data-bs-target="#addmedicneModal">
                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-download me-1" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z" />
                                <path fill-rule="evenodd" d="M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3z" />
                            </svg>
                            Add Medicine
                        </a>
                    </div>
                    <div class="col-auto">
                        <a class="btn app-btn-secondary" type="button" data-bs-toggle="modal" data-bs-target="#addequipModal">
                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-download me-1" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z" />
                                <path fill-rule="evenodd" d="M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3z" />
                            </svg>
                            Add Equipment
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
                        <table id="medicineTable" class="table app-table-hover mb-0 text-left">
                            <thead>
                            <tr>
                                <th class="cell">ID</th>
                                <th class="cell">Medicine</th>
                                <th class="cell">Description</th>
                                <th class="cell">Expiration</th>
                                <th class="cell"> Quantity</th>
                                <th class="cell">Actions</th>

                            </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <div class="tab-content" id="orders-table-tab-content">
        <div class="tab-pane fade show active" id="orders-all" role="tabpanel" aria-labelledby="orders-all-tab">
            <div class="app-card app-card-orders-table shadow-sm mb-5">
                <div class="app-card-body">
                    <div class="table-responsive">
                        <table id="equipmentTable" class="table app-table-hover mb-0 text-left">
                            <thead>
                            <tr>
                                <th class="cell">ID</th>
                                <th class="cell">Eqiupment</th>
                                <th class="cell">Description</th>
                                <th class="cell">Quantity</th>
                                <th class="cell">Actions</th>
                            </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <div class="modal fade" id="addmedicneModal" tabindex="-1" role="dialog" aria-labelledby="importModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="importModalLabel">Medicine</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{route('storemedicine')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="name">Medicine Name</label>
                            <input value="{{old('med_name')}}" type="text" name="med_name" class="form-control">
                            @error('med_name')
                            <span class="error-message">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="name">Description</label>
                            <input value="{{old('description')}}"  type="text" name="description" class="form-control">
                            @error('description')
                            <span class="error-message">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="name">Quantity</label>
                            <input value="{{old('quantity')}}" type="text" name="quantity" class="form-control">
                            @error('quantity')
                            <span class="error-message">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="name">Expiration</label>
                            <input value="{{old('expiration')}}" type="date" name="expiration" class="form-control">
                            @error('expiration')
                            <span class="error-message">{{$message}}</span>
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

    <div class="modal fade" id="editmedicneModal" tabindex="-1" role="dialog" aria-labelledby="importModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="importModalLabel">Medicine</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('editmedicine') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <input hidden id="Edit_id" value="{{ old('med_name') }}" type="text" name="id">
                        </div>
                        <div class="form-group">
                            <label for="Edit_med_name">Medicine Name</label>
                            <input id="Edit_med_name" value="{{ old('med_name') }}" type="text" name="med_name" class="form-control">
                            @error('med_name')
                            <span class="error-message">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="Edit_description">Description</label>
                            <input id="Edit_description" value="{{ old('description') }}" type="text" name="description" class="form-control">
                            @error('description')
                            <span class="error-message">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="Edit_quantity">Quantity</label>
                            <input id="Edit_quantity" value="{{ old('quantity') }}" type="text" name="quantity" class="form-control">
                            @error('quantity')
                            <span class="error-message">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="Edit_expiration">Expiration</label>
                            <input id="Edit_expiration" value="{{ old('expiration') }}" type="date" name="expiration" class="form-control">
                            @error('expiration')
                            <span class="error-message">{{ $message }}</span>
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



    {{--    MODAL EQUIPMENTS--}}
    <div class="modal fade" id="addequipModal" tabindex="-1" role="dialog" aria-labelledby="importModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="importModalLabel">Equipments</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('storeequipment') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="equipname">Equipment Name</label>
                            <input value="{{ old('equipname') }}" type="text" name="equipname" class="form-control">
                            @error('equipname')
                            <span class="error-message">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="equip_quantity">Quantity</label>
                            <input value="{{old('equip_quantity')}}" type="text" name="equip_quantity" class="form-control">
                            @error('equip_quantity')
                            <span class="error-message">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <input value="{{ old('description') }}" type="text" name="description" class="form-control">
                            @error('description')
                            <span class="error-message">{{ $message }}</span>
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
    <div class="modal fade" id="editequipmentsModal" tabindex="-1" role="dialog" aria-labelledby="importModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="importModalLabel">Equipments</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('editequipments') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <input hidden id="Edit_id_equip" type="text" name="id">
                        </div>
                        <div class="form-group">
                            <label for="Edit_equipname">Equipment Name</label>
                            <input id="Edit_equipname" value="{{ old('equipname') }}" type="text" name="equipname" class="form-control">
                            @error('equipname')
                            <span class="error-message">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="Edit_equip_quantity">Quantity</label>
                            <input value="{{old('Edit_equip_quantity')}}" type="text" name="Edit_equip_quantity" class="form-control">
                            @error('Edit_equip_quantity')
                            <span class="error-message">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="Edit_equipdescription">Description</label>
                            <input id="Edit_equipdescription" value="{{ old('descriptio') }}" type="text" name="descriptio" class="form-control">
                            @error('descriptio')
                            <span class="error-message">{{ $message }}</span>
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

        // FOR MEDICINE
        $(function() {
            $('#medicineTable').DataTable({
                processing: true,
                serverSide: false,
                ajax: '{{ route('datatablemedicine') }}',
                columns: [
                    { data: 'id', name: 'id' },
                    { data: 'med_name', name: 'med_name' },
                    { data: 'description', name: 'description' },
                    { data: 'expiration', name: 'expiration' },
                    { data: 'quantity', name: 'quantity'},
                    { data: 'Actions', name: 'Actions' },
                ]
            });
            $('#equipmentTable').DataTable({
                processing: true,
                serverSide: false,
                ajax: '{{ route('datatableequip') }}',
                columns: [
                    { data: 'id', name: 'id' },
                    { data: 'equipname', name: 'equipname' },
                    { data: 'descriptio', name: 'description' },
                    { data: 'equip_quantity', name: 'equip_quantity'},
                    { data: 'Actions', name: 'Actions' },
                ]
            });
        });

        function ShowModal(id, name, description, expiration, quantity)
        {
            $('#Edit_id').val(id);
            $('#Edit_med_name').val(name);
            $('#Edit_description').val(description);
            $('#Edit_expiration').val(expiration);
            $('#Edit_equip_quantity').val(quantity);
            $('#editmedicneModal').modal('show');
        }

        function ShowModalequip(id, name, description, quantity)
        {
            $('#Edit_id_equip').val(id);
            $('#Edit_equipname').val(name);
            $('#Edit_equipdescription').val(description);
            $('#Edit_equip_quantity').val(quantity);
            $('#editequipmentsModal').modal('show');
        }

    </script>

@endpush
