@extends('layout.master')

@section('content')

<h1 class="app-page-title">REPORT</h1>

<div class="row">
    <!-- Daily Equipment Consumption Card -->
    <div class="col-6 col-md-4 col-xl-3 col-xxl-2">
        <div class="app-card app-card-doc shadow-sm h-100">
            <div class="app-card-thumb-holder p-3">
                <div class="app-card-thumb">
                    <img class="thumb-image" src="https://img.freepik.com/premium-vector/medicament-prescription-health-care-concept-tiny-doctor-character-with-huge-syringe-ampule-with-drug-near-clock-show-time-applying-daily-medicine-dose-cartoon-people-vector-illustration_87771-11902.jpg?w=2000" alt="" />
                </div>
                <a class="app-card-link-mask" data-bs-toggle="modal" href="#dailyEquipmentModal"></a>
            </div>
            <div class="app-card-body p-3 has-card-actions">
                <h4 class="app-doc-title truncate mb-0">
                    <a>Daily Medicine <br>Issuance <br>Report</a>
                </h4>
            </div>
        </div>
    </div>

    <!-- Daily Equipment Consumption Modal -->
    <div class="modal fade" id="dailyEquipmentModal" tabindex="-1" role="dialog" aria-labelledby="dailyEquipmentModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="dailyEquipmentModalLabel">Daily Equipment Consumption</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Add content for the Daily Equipment Consumption modal here -->
                    <p>This is the modal content for Daily Equipment Consumption.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <!-- You can include additional buttons or actions related to this modal -->
                </div>
            </div>
        </div>
    </div>


    <!-- Monthly Equipment Consumption -->
    <!-- Monthly Equipment Consumption Card -->
    <div class="col-6 col-md-4 col-xl-3 col-xxl-2">
        <div class="app-card app-card-doc shadow-sm h-100">
            <div class="app-card-thumb-holder p-3">
                <div class="app-card-thumb">
                    <img class="thumb-image" src="https://img.freepik.com/free-vector/young-tiny-analysts-preparing-monthly-report-calendar-chart-arrow-flat-vector-illustration-statistics-digital-technology_74855-8749.jpg" alt="" />
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

    <!-- Monthly Equipment Consumption Modal -->
    <div class="modal fade" id="monthlyEquipmentModal" tabindex="-1" role="dialog" aria-labelledby="monthlyEquipmentModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="monthlyEquipmentModalLabel">Monthly Equipment Consumption</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Content for the Monthly Equipment Consumption modal goes here -->
                    <p>This is the modal content for Monthly Equipment Consumption.</p>
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
                    <img class="thumb-image" src="https://as1.ftcdn.net/v2/jpg/02/26/96/90/1000_F_226969077_QkerneEbqASbJL8e7Vl9RXl4KtMmN1vd.jpg" alt="" />
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
    <div class="modal fade" id="monthlyMedicineModal" tabindex="-1" role="dialog" aria-labelledby="monthlyMedicineModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="monthlyMedicineModalLabel">Monthly Medicine Consumption</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Content specific to the Monthly Medicine Consumption modal goes here -->
                    <p>This is the modal content for Monthly Medicine Consumption.</p>
                    <!-- You can add details or forms here as needed -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <!-- You can include additional buttons or actions related to this modal -->
                </div>
            </div>
        </div>
    </div>


    <!-- Medicine Monitoring Card -->
    <div class="col-6 col-md-4 col-xl-3 col-xxl-2">
        <div class="app-card app-card-doc shadow-sm h-100">
            <div class="app-card-thumb-holder p-3">
                <div class="app-card-thumb">
                    <img class="thumb-image" src="https://freedesignfile.com/upload/2021/04/Health-checkup-cartoon-illustration-vector.jpg" alt="" />
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

    <!-- Medicine Monitoring Modal -->
    <div class="modal fade" id="medicineMonitoringModal" tabindex="-1" role="dialog" aria-labelledby="medicineMonitoringModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="medicineMonitoringModalLabel">Medicine Monitoring</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Content specific to the Medicine Monitoring modal goes here -->
                    <p>This is the modal content for Medicine Monitoring.</p>
                    <!-- You can add details or forms here as needed -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <!-- You can include additional buttons or actions related to this modal -->
                </div>
            </div>
        </div>
    </div>

</div>



@stop