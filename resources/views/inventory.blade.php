@extends('layout.master')

@section('content')

    <style>
        .ui-corner-all,
        .ui-corner-bottom,
        .ui-corner-right,
        .ui-corner-br {
            border-bottom-right-radius: 4px;
            background: transparent;
        }

        /* Define styles for the tabs */
        #tab1,
        #tab2 {
            border-radius: 4px;
            cursor: pointer;
            padding: 10px;
            margin: 5px;
            transition: background-color 0.3s ease;
        }

        /* Initial state */
        #tab1 {
            background-color: rgb(101, 151, 187);
        }

        #tab2 {
            background-color: rgb(191, 214, 205);
        }

        /* Hover state */
        #tab1:hover {
            background-color: rgb(131, 181, 217);
        }

        #tab2:hover {
            background-color: rgb(211, 234, 225);
        }

        /* Active state */
        #tab1.active {
            background-color: rgb(81, 131, 167);
        }

        #tab2.active {
            background-color: rgb(171, 194, 185);
        }

        .ui-widget.ui-widget-content {
            border: 1px solid #ffffff00;
        }

        .ui-tabs .ui-tabs-nav {
            margin: 0;
        }

        .ui-widget-header {
            border: none;
            background: #cccccc00 url(images/ui-bg_highlight-soft_75_cccccc_1x100.png) 50% 50% repeat-x;
            color: #22222200;
            /* font-weight: bold; */
        }

        .ui-tabs .ui-tabs-nav li {
            list-style: none;
            position: relative;
            top: 0;
            margin: 1px 0.2em 0 0;
            border-bottom-width: 0;
            padding: 0;
            white-space: nowrap;
        }

        .ui-state-default,
        .ui-widget-content .ui-state-default,
        .ui-widget-header .ui-state-default,
        .ui-button,
        html .ui-button.ui-state-disabled:hover,
        html .ui-button.ui-state-disabled:active {
            border: 1px solid #d3d3d300;
            background: #e6e6e600 url(images/ui-bg_glass_75_e6e6e6_1x400.png) 50% 50% repeat-x;
            font-weight: normal;
            color: rgba(0, 0, 0, 0.125);
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
    <h1>Inventory</h1>

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
                                data-bs-target="#addmedicneModal">
                                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-download me-1"
                                    fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z" />
                                    <path fill-rule="evenodd"
                                        d="M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3z" />
                                </svg>
                                Add Medicine
                            </a>
                        </div>
                        <div class="col-auto">
                            <a class="btn app-btn-success" type="button" data-bs-toggle="modal"
                                data-bs-target="#addequipModal">
                                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-download me-1"
                                    fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z" />
                                    <path fill-rule="evenodd"
                                        d="M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3z" />
                                </svg>
                                Add Equipment
                            </a>
                        </div>
                        {{-- <div class="col-auto">
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
                        </div> --}}
                    @endif


                </div><!--//row-->
            </div><!--//table-utilities-->
        </div><!--//col-auto-->
    </div><!--//row-->

    <div id="tabs">
        <ul>
            <li><a href="#tabs-med" id="tab1">Medicine</a></li>
            <li><a href="#tabs-equip" id="tab2">Equipment</a></li>
        </ul>
        <div id="tabs-med">
            <div class="tab-content" id="orders-table-tab-content">
                <div class="tab-pane fade show active" id="orders-all" role="tabpanel" aria-labelledby="orders-all-tab">
                    <div class="app-card app-card-orders-table shadow-sm mb-5">
                        <div class="app-card-body">
                            <div class="table-responsive">
                                <table style="min-width: 100%" id="medicineTable"
                                    class="table app-table-hover mb-0 text-left">
                                    <thead>
                                        <tr>
                                            <th class="cell">ID</th>
                                            <th class="cell">Medicine</th>
                                            <th class="cell">Description</th>
                                            <th class="cell">Expiration</th>
                                            <th class="cell">Quantity</th>
                                            @if (Auth::user()->role == 'nurse')
                                                <th class="cell">Actions</th>
                                            @endif
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div id="tabs-equip">
            <div class="tab-content" id="orders-table-tab-content">
                <div class="tab-pane fade show active" id="orders-all" role="tabpanel" aria-labelledby="orders-all-tab">
                    <div class="app-card app-card-orders-table shadow-sm mb-5">
                        <div class="app-card-body">
                            <div class="table-responsive" style="width: 100%;">
                                <table style="min-width: 100%" id="equipmentTable"
                                    class="table app-table-hover mb-0 text-left">
                                    <thead>
                                        <tr>
                                            <th class="cell">ID</th>
                                            <th class="cell">Equipment</th>
                                            <th class="cell">Description</th>
                                            <th class="cell">Expiration</th>
                                            <th class="cell">Quantity</th>
                                            @if (Auth::user()->role == 'nurse')
                                                <th class="cell">Actions</th>
                                            @endif
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>





    <div class="modal fade" id="addmedicneModal" tabindex="-1" role="dialog" aria-labelledby="importModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="importModalLabel">Medicine</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('storemedicine') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="name">Medicine Name</label>
                            <input value="{{ old('med_name') }}" type="text" name="med_name" class="form-control"
                                style="text-align:left;">
                            @error('med_name')
                                <span class="error-message">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="name">Description</label>
                            <input value="{{ old('description') }}" type="text" name="description"
                                class="form-control" style="text-align:left;">
                            @error('description')
                                <span class="error-message">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="name">Quantity</label>
                            <input value="{{ old('quantity') }}" type="number" name="quantity" class="form-control"
                                style="text-align:left;">
                            @error('quantity')
                                <span class="error-message">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="name">Expiration</label>
                            <input value="{{ old('expiration') }}" type="date" name="expiration" class="form-control"
                                style="text-align:left;">
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

    <div class="modal fade" id="editmedicneModal" tabindex="-1" role="dialog" aria-labelledby="importModalLabel"
        aria-hidden="true">
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
                            <input hidden id="Edit_id" value="{{ old('med_name') }}" type="text" name="id"
                                required>
                        </div>
                        <div class="form-group">
                            <label for="Edit_med_name">Medicine Name</label>
                            <input id="Edit_med_name" value="{{ old('med_name') }}" type="text" name="med_name"
                                class="form-control" style="text-align:left;" required>
                            @error('med_name')
                                <span class="error-message">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="Edit_description">Description</label>
                            <input id="Edit_description" value="{{ old('description') }}" type="text"
                                name="description" class="form-control" style="text-align:left;" required>
                            @error('description')
                                <span class="error-message">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="Edit_quantity">Quantity</label>
                            <input id="Edit_quantity" value="{{ old('quantity') }}" type="number" name="quantity"
                                class="form-control" style="text-align:left;" required>
                            @error('quantity')
                                <span class="error-message">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="Edit_expiration">Expiration</label>
                            <input id="Edit_expiration" value="{{ old('expiration') }}" type="date"
                                name="expiration" class="form-control" style="text-align:left;" required>
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



    {{-- MODAL EQUIPMENTS --}}
    <div class="modal fade" id="addequipModal" tabindex="-1" role="dialog" aria-labelledby="importModalLabel"
        aria-hidden="true">
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
                            <input value="{{ old('equipname') }}" type="text" name="equipname" class="form-control"
                                style="text-align:left;">
                            @error('equipname')
                                <span class="error-message">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="descriptio">Description</label>
                            <input value="{{ old('descriptio') }}" type="text" name="descriptio"
                                class="form-control" style="text-align:left;">
                            @error('descriptio')
                                <span class="error-message">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="equip_quantity">Quantity</label>
                            <input value="{{ old('equip_quantity') }}" type="number" name="equip_quantity"
                                class="form-control" style="text-align:left;">
                            @error('equip_quantity')
                                <span class="error-message">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="name">Expiration</label>
                            <input value="{{ old('equi_expiration') }}" type="date" name="equi_expiration"
                                class="form-control" style="text-align:left;">
                            @error('equi_expiration')
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
    <div class="modal fade" id="editequipmentsModal" tabindex="-1" role="dialog" aria-labelledby="importModalLabel"z
        aria-hidden="true">
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
                            <input id="Edit_equipname" value="{{ old('equipname') }}" type="text" name="equipname"
                                class="form-control" style="text-align:left;" required>
                            @error('equipname')
                                <span class="error-message">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="Edit_equip_quantity">Quantity</label>
                            <input id="Edit_equip_quantity" value="{{ old('equip_quantity') }}" type="number"
                                name="equip_quantity" class="form-control" style="text-align:left;" required>
                            @error('equip_quantity')
                                <span class="error-message">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="Edit_equipdescription">Description</label>
                            <input id="Edit_equipdescription" value="{{ old('descriptio') }}" type="text"
                                name="descriptio" class="form-control" style="text-align:left;" required>
                            @error('descriptio')
                                <span class="error-message">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="Edit_equip_expiration">Expiration</label>
                            <input id="Edit_equip_expiration" value="{{ old('equi_expiration') }}" type="date"
                                name="equi_expiration" class="form-control" style="text-align:left;" required>
                            @error('equi_expiration')
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
    <div class="modal fade" id="addsupplyequipmentsModal" tabindex="-1" role="dialog"
        aria-labelledby="importModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="importModalLabel">Equipments</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('addsupplyEquipment') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <input id="supply_id_equip" type="text" name="id" hidden>
                        </div>
                        <div class="form-group">
                            <label for="supply_equip_quantity">Quantity</label>
                            <input value="{{ old('Edit_quantity') }}" type="text" name="equip_quantity"
                                class="form-control" style="text-align:left;">
                            @error('Edit_equip_quantity')
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
    <div class="modal fade" id="addsupplymedModal" tabindex="-1" role="dialog" aria-labelledby="importModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="importModalLabel">Medicines</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('addsupplyMedicine') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <input id="supply_id_med" type="text" name="id" hidden>
                        </div>
                        <div class="form-group">
                            <label for="supply_med_quantity">Quantity</label>
                            <input value="{{ old('Edit_med_quantity') }}" type="text" name="med_quantity"
                                class="form-control" style="text-align:left;">
                            @error('Edit_med_quantity')
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
        name: 'totalquantity'
        $(function() {
            $('#medicineTable').DataTable({
                processing: true,
                serverSide: false,
                ajax: "{{ route('datatablemedicine') }}",
                columns: [{
                        data: 'id',
                        name: 'id'
                    },
                    {
                        data: 'med_name',
                        name: 'med_name'
                    },
                    {
                        data: 'description',
                        name: 'description'
                    },
                    {
                        data: 'expiration',
                        name: 'expiration'
                    },
                    {
                        data: 'totalQuantity',
                        name: 'quantity'
                    },
                    @if (Auth::user()->role == 'nurse')
                        {
                            data: 'Actions',
                            name: 'Actions'
                        },
                    @endif
                ]
            });
            $('#equipmentTable').DataTable({
                processing: true,
                serverSide: false,
                ajax: "{{ route('datatableequip') }}",
                columns: [{
                        data: 'id',
                        name: 'id'
                    },
                    {
                        data: 'equipname',
                        name: 'equipname'
                    },
                    {
                        data: 'descriptio',
                        name: 'description'
                    },
                    {
                        data: 'equi_expiration',
                        name: 'equi_expiration'
                    },
                    {
                        data: 'equip_total_quantity',
                        name: 'equip_quantity'
                    },
                    @if (Auth::user()->role == 'nurse')
                        {
                            data: 'Actions',
                            name: 'Actions'
                        },
                    @endif
                ]
            });
        });

        function ShowModal(id, name, description, expiration, quantity) {
            $('#Edit_id').val(id);
            $('#Edit_med_name').val(name);
            $('#Edit_description').val(description);
            $('#Edit_expiration').val(expiration);
            $('#Edit_quantity').val(quantity);
            $('#editmedicneModal').modal('show');
        }

        function ShowAddModalmed(id) {
            $('#supply_id_med').val(id);
            $('#addsupplymedModal').modal('show');
        }

        function ShowModalequip(id, name, description, expiration, quantity) {
            $('#Edit_id_equip').val(id);
            $('#Edit_equipname').val(name);
            $('#Edit_equipdescription').val(description);
            $('#Edit_equip_expiration').val(expiration);
            $('#Edit_equip_quantity').val(quantity);
            $('#editequipmentsModal').modal('show');
        }

        function ShowAddModalequip(id) {
            $('#supply_id_equip').val(id);
            $('#addsupplyequipmentsModal').modal('show');
        }


        function deleteItem(type, id) {
            Swal.fire({
                title: `Are you sure you want to delete this item?`,
                text: "It will gone forever",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            }).then((result) => {
                $.ajax({
                    url: "/" + type + "/delete/" + id,
                    method: 'delete',
                    data: {
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(data) {
                        Swal.fire({
                            title: "Success!",
                            text: "Item has been deleted",
                            icon: "success",
                            button: "OK",
                        }).then((result) => {
                            if (data === status) {
                                location.reload();
                            }
                        });
                    },
                })
            })

        }


        $(function() {
            $("#tabs").tabs();

            $(".tab-content-container").each(function() {
                var tableId = $(this).find(".tab-content").data("table-id");
                $("#" + tableId).DataTable({
                    responsive: true, // Enable responsiveness
                    // Add other DataTables options as needed
                });
            });
        });
    </script>
@endpush
