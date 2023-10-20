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


                </div>
            </div>
        </div>
    </div>

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
                                <th class="cell">Expiration</th>
                                <th class="cell"> Quantity</th>

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
                                <th class="cell">Quantity</th>

                            </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@stop

@push('js')
    <script>
        $(function() {
            $('#medicineTable').DataTable({
                processing: true,
                serverSide: false,
                ajax: '{{ route('datatablemedicine') }}',
                columns: [
                    { data: 'id', name: 'id' },
                    { data: 'med_name', name: 'med_name' },
                    { data: 'expiration', name: 'expiration' },
                    { data: 'quantity', name: 'quantity'},

                ]
            });
            $('#equipmentTable').DataTable({
                processing: true,
                serverSide: false,
                ajax: '{{ route('datatableequip') }}',
                columns: [
                    { data: 'id', name: 'id' },
                    { data: 'equipname', name: 'equipname' },
                    { data: 'equip_quantity', name: 'equip_quantity'},
                ]
            });
        });


    </script>
@endpush
