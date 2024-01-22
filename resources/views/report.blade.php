@extends('layout.master')

@section('content')
    <style>
        .app-card-thumb img {
            transition: transform 0.3s ease;
        }

        .app-card-body:hover+.app-card-thumb-holder .app-card-thumb img {
            transform: scale(1.1);
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
    <h1>Reports</h1>

    <div class="row">
        <!-- Daily Medicine Consumption Card -->
        <div class="col-6 col-md-4 col-xl-3 col-xxl-2">
            <div id="openDailyMedModal" class="app-card app-card-doc shadow-sm h-100">
                <div class="app-card-thumb-holder p-3">
                    <div class="app-card-thumb">
                        <img class="thumb-image"
                            src="https://img.freepik.com/premium-vector/medicament-prescription-health-care-concept-tiny-doctor-character-with-huge-syringe-ampule-with-drug-near-clock-show-time-applying-daily-medicine-dose-cartoon-people-vector-illustration_87771-11902.jpg?w=2000"
                            alt="" />
                        <a class="app-card-link-mask" data-bs-toggle="modal" data-bs-target="#DailyMed"></a>
                    </div>
                </div>
                <div class="app-card-body p-3 has-card-actions">
                    <h4 class="app-doc-title truncate mb-0">
                        <a>Daily Medicine <br>Issuance <br>Report</a>
                    </h4>
                </div>
            </div>
        </div>
        <div class="modal fade" id="DailyMed" tabindex="-1" role="dialog" aria-labelledby="DailyMed" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="DailyMed">Daily Medicine Issuance Report</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="medDaily" method="GET" action="{{ route('medDaily') }}">
                            @csrf
                            <label for="dailyPickerStart">Select Date:</label>
                            <input type="date" id="dailyPickerStart" name="date" placeholder="Select Date">
                            <button type="submit" class="btn btn-secondary">Submit</button>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <!-- Include additional buttons or actions related to this modal if needed -->
                    </div>
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
                    <a class="app-card-link-mask" data-bs-toggle="modal" data-bs-target="#monthlyEquipmentModal"></a>
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
                        <form id="equipMonthly" action="{{ route('equipMonthly') }}" method="get">
                            <label for="monthPicker">Select Month:</label>
                            <select name="month" class="datefield month">
                                <option value="">Month</option>
                                <option value="01">Jan</option>
                                <option value="02">Feb</option>
                                <option value="03">Mar</option>
                                <option value="04">Apr</option>
                                <option value="05">May</option>
                                <option value="06">Jun</option>
                                <option value="07">Jul</option>
                                <option value="08">Aug</option>
                                <option value="09">Sep</option>
                                <option value="10">Oct</option>
                                <option value="11">Nov</option>
                                <option value="12">Dec</option>
                            </select>
                            <button type="submit" class="btn btn-secondary">Submit</button>
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
                        <form id="medMonthly" action="{{ route('medMonthly') }}" method="get">
                            <label for="monthPicker">Select Month:</label>
                            <select name="month" class="datefield month">
                                <option value="">Month</option>
                                <option value="01">Jan</option>
                                <option value="02">Feb</option>
                                <option value="03">Mar</option>
                                <option value="04">Apr</option>
                                <option value="05">May</option>
                                <option value="06">Jun</option>
                                <option value="07">Jul</option>
                                <option value="08">Aug</option>
                                <option value="09">Sep</option>
                                <option value="10">Oct</option>
                                <option value="11">Nov</option>
                                <option value="12">Dec</option>
                            </select>
                            <button type="submit" class="btn btn-secondary">Submit</button>
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
                        <a>Medicine <br> Monitoring <br>Sheet</a>
                    </h4>
                </div>
            </div>
        </div>

        <div class="modal fade" id="medicineMonitoringModal" tabindex="-1" role="dialog"
            aria-labelledby="medicineMonitoringModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="medicineMonitoringModalLabel">Medical Monitoring Sheet</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="medMonitor" method="GET" action="{{ route('medMonitor') }}">
                            @csrf
                            <label for="dailyPickerStart">Select Date:</label>
                            <input type="date" id="dailyPickerStart" name="date" placeholder="Select Date">
                            <button type="submit" class="btn btn-secondary">Submit</button>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <!-- Include additional buttons or actions related to this modal if needed -->
                    </div>
                </div>
            </div>
        </div>

        <!-- Graph report-->

        <div class="col-6 col-md-4 col-xl-3 col-xxl-2">
            <div class="app-card app-card-doc shadow-sm h-100">
                <div class="app-card-thumb-holder p-3">
                    <div class="app-card-thumb">
                        <img class="thumb-image"
                            src="https://media.istockphoto.com/id/627993994/vector/analytics-data-research-icon-vector-analysis-paper-sheet-document-statistics.jpg?s=612x612&w=0&k=20&c=qRQiwDjb3vRltY3zJNIEefc6jASHnWn3k3VXGhNgbr8="
                            alt="" />
                    </div>
                    <a class="app-card-link-mask" href="javascript:void(0);"
                        onclick="openPrintTab('{{ route('reportGraph') }}')" target="_blank"></a>
                </div>
                <div class="app-card-body p-3 has-card-actions">
                    <h4 class="app-doc-title truncate mb-0">
                        <a href="{{ route('reportGraph') }}" target="_blank">ISU <br> Santiago <br> Extension graph <br>
                            Report</a>
                    </h4>
                </div>
            </div>
        </div>


    </div>

@stop

@push('js')
    <script>
        function openPrintTab(url) {
            var printWindow = window.open(url, '_blank');
            printWindow.onload = function() {
                setTimeout(function() {
                    printWindow.print();
                    printWindow.onafterprint = function() {
                        printWindow.close();
                    };
                }, 6000); // 5000 milliseconds = 5 seconds
            };
        }




        // medMonthly
        document.addEventListener('DOMContentLoaded', function() {
            var form = document.getElementById('medMonthly');

            form.addEventListener('submit', function(event) {
                event.preventDefault();

                var formData = new FormData(form);
                var queryString = new URLSearchParams(formData).toString();
                var reportUrl = form.action + '?' + queryString;

                // Open a new tab with the report URL
                var newTab = window.open(reportUrl, '_blank');

                // Focus on the new tab
                newTab.print();
            });
        });
        // equipMonthly
        document.addEventListener('DOMContentLoaded', function() {
            var form = document.getElementById('equipMonthly');

            form.addEventListener('submit', function(event) {
                event.preventDefault();

                var formData = new FormData(form);
                var queryString = new URLSearchParams(formData).toString();
                var reportUrl = form.action + '?' + queryString;

                // Open a new tab with the report URL
                var newTab = window.open(reportUrl, '_blank');

                // Focus on the new tab
                newTab.print();
            });
        });
        // medMonitor
        document.addEventListener('DOMContentLoaded', function() {
            var form = document.getElementById('medMonitor');

            form.addEventListener('submit', function(event) {
                event.preventDefault();

                var formData = new FormData(form);
                var queryString = new URLSearchParams(formData).toString();
                var reportUrl = form.action + '?' + queryString;

                // Open a new tab with the report URL
                var newTab = window.open(reportUrl, '_blank');

                // Focus on the new tab
                newTab.print();
            });
        });
        // medDaily
        document.addEventListener('DOMContentLoaded', function() {
            var form = document.getElementById('medDaily');

            form.addEventListener('submit', function(event) {
                event.preventDefault();

                var formData = new FormData(form);
                var queryString = new URLSearchParams(formData).toString();
                var reportUrl = form.action + '?' + queryString;

                // Open a new tab with the report URL
                var newTab = window.open(reportUrl, '_blank');

                // Focus on the new tab
                newTab.print();
            });
        });
    </script>
@endpush
