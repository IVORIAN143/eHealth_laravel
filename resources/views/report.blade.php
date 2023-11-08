@extends('layout.master')

@section('content')
    <style>
        .app-card-thumb img {
            transition: transform 0.3s ease;
        }

        .app-card-body:hover+.app-card-thumb-holder .app-card-thumb img {
            transform: scale(1.1);
        }
    </style>
    <h1 class="app-page-title">REPORT</h1>

    <div class="row">
        <!-- Daily Equipment Consumption Card -->
        <div class="col-6 col-md-4 col-xl-3 col-xxl-2">
            <div class="app-card app-card-doc shadow-sm h-100">
                <div class="app-card-thumb-holder p-3">
                    <div class="app-card-thumb">
                        <img class="thumb-image"
                            src="https://img.freepik.com/premium-vector/medicament-prescription-health-care-concept-tiny-doctor-character-with-huge-syringe-ampule-with-drug-near-clock-show-time-applying-daily-medicine-dose-cartoon-people-vector-illustration_87771-11902.jpg?w=2000"
                            alt="" />
                        <a class="app-card-link-mask" data-bs-toggle="modal" href="{{ route('dailyMedTable') }}"></a>
                    </div>
                </div>
                <div class="app-card-body p-3 has-card-actions">
                    <h4 class="app-doc-title truncate mb-0">
                        <a href="{{ route('dailyMedTable') }}">Daily Medicine <br>Issuance <br>Report</a>
                    </h4>
                </div>
            </div>
        </div>


        <!-- Monthly Equipment Consumption Card -->
        <div class="col-6 col-md-4 col-xl-3 col-xxl-2">
            <div class="app-card app-card-doc shadow-sm h-100">
                <div class="app-card-thumb-holder p-3">
                    <div class="app-card-thumb">
                        <img class="thumb-image"
                            src="https://img.freepik.com/free-vector/young-tiny-analysts-preparing-monthly-report-calendar-chart-arrow-flat-vector-illustration-statistics-digital-technology_74855-8749.jpg"
                            alt="" />
                    </div>
                    <a class="app-card-link-mask" data-bs-toggle="modal" href="#monthlyEquipmentModal"></a>
                </div>
                <div class="app-card-body p-3 has-card-actions">
                    <h4 class="app-doc-title truncate mb-0">
                        <a>Monthly Supplies <br> Consumption <br> Report</a>
                    </h4>
                </div>
            </div>
        </div>

        <div class="modal fade" id="monthlyEquipmentModal" tabindex="-1" role="dialog"
            aria-labelledby="monthlyEquipmentModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="monthlyEquipmentModalLabel">Monthly Equipment Consumption</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="monthPickerForm">
                            <label for="monthPicker">Select Month:</label>
                            <input type="text" id="monthPicker" name="month" placeholder="Select month">
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <!-- Include additional buttons or actions related to this modal if needed -->
                    </div>
                </div>
            </div>
        </div>


        <!-- Monthly Medicine Consumption Card -->
        <div class="col-6 col-md-4 col-xl-3 col-xxl-2">
            <div class="app-card app-card-doc shadow-sm h-100">
                <div class="app-card-thumb-holder p-3">
                    <div class="app-card-thumb">
                        <img class="thumb-image"
                            src="https://as1.ftcdn.net/v2/jpg/02/26/96/90/1000_F_226969077_QkerneEbqASbJL8e7Vl9RXl4KtMmN1vd.jpg"
                            alt="" />
                    </div>
                    <a class="app-card-link-mask" data-bs-toggle="modal" href="#monthlyMedicineModal"></a>
                </div>
                <div class="app-card-body p-3 has-card-actions">
                    <h4 class="app-doc-title truncate mb-0">
                        <a>Monthly <br> Medicine <br> Consumption <br> Report</a>
                    </h4>
                </div>
            </div>
        </div>

        <!-- Monthly Medicine Consumption Modal -->
        <div class="modal fade" id="monthlyMedicineModal" tabindex="-1" role="dialog"
            aria-labelledby="monthlyMedicineModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="monthlyMedicineModalLabel">Monthly Medicine Consumption</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="monthPickerFormMedicine">
                            <label for="monthPickerMedicine">Select Month:</label>
                            <input type="text" id="monthPickerMedicine" name="month" placeholder="Select month">
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <!-- Include additional buttons or actions related to this modal if needed -->
                    </div>
                </div>
            </div>
        </div>


        <!-- Medicine Monitoring Card -->
        <div class="col-6 col-md-4 col-xl-3 col-xxl-2">
            <div class="app-card app-card-doc shadow-sm h-100">
                <div class="app-card-thumb-holder p-3">
                    <div class="app-card-thumb">
                        <img class="thumb-image"
                            src="https://freedesignfile.com/upload/2021/04/Health-checkup-cartoon-illustration-vector.jpg"
                            alt="" />
                    </div>
                    <a class="app-card-link-mask" data-bs-toggle="modal" href="#medicineMonitoringModal"></a>
                </div>
                <div class="app-card-body p-3 has-card-actions">
                    <h4 class="app-doc-title truncate mb-0">
                        <a>Medicine <br> Monitoring <br>Report</a>
                    </h4>
                </div>
            </div>
        </div>

        <div class="modal fade" id="medicineMonitoringModal" tabindex="-1" role="dialog"
            aria-labelledby="medicineMonitoringModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="medicineMonitoringModalLabel">Medicine Monitoring</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="medicineMonitoringForm">
                            <label for="medicineDate">Select Date:</label>
                            <input type="text" id="medicineDate" name="date" placeholder="Select date">
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <!-- Include additional buttons or actions related to this modal if needed -->
                    </div>
                </div>
            </div>
        </div>

    </div>



    <script>
        $(function() {
            $("#monthPicker").datepicker({
                changeMonth: true,
                changeYear: true,
                showButtonPanel: true,
                dateFormat: 'MM yy',
                onClose: function(dateText, inst) {
                    $(this).datepicker('setDate', new Date(inst.selectedYear, inst.selectedMonth, 1));
                }
            });
        });

        $(function() {
            $("#monthPickerMedicine").datepicker({
                changeMonth: true,
                changeYear: true,
                showButtonPanel: true,
                dateFormat: 'MM yy',
                onClose: function(dateText, inst) {
                    $(this).datepicker('setDate', new Date(inst.selectedYear, inst.selectedMonth, 1));
                }
            });
        });

        $(function() {
            $("#medicineDate").datepicker({
                dateFormat: 'yy-mm-dd', // Adjust the date format as needed
                onSelect: function(dateText) {
                    console.log("Selected date: " + dateText);
                    // Perform additional actions with the selected date here
                }
            });
        });
    </script>

@stop
