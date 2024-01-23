<!DOCTYPE html>
<html lang="en">

<head>
    <title>Graph Report</title>

    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    {{-- <meta name="viewport" content="width=device-width, initial-scale=1.0"> --}}

    <meta name="description" content="ISU-eHealthmate">
    <meta name="author" content="Xiaoying Riley at 3rd Wave Media">
    <link rel="shortcut icon" href="assets/images/isu-logo.png">

    <!-- FontAwesome JS-->
    <script defer src="assets/plugins/fontawesome/js/all.min.js"></script>

    <!-- App CSS -->
    <link id="theme-style" rel="stylesheet" href="assets/css/portal.css">

    <link href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/buttons/2.4.2/css/buttons.bootstrap5.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.1/themes/smoothness/jquery-ui.css">
    <link rel="stylesheet" href="assets/css/yearpicker.css">
    <link rel="stylesheet" href="assets/css/MonthPicker.min.css">
</head>


<body>
    <style>
        .app-header {
            box-shadow: #fff;
            /* border-bottom: 1px solid #e7e9ed; */
            height: 0px;
            background-color: white;
        }

        body {
            font-family: Arial, sans-serif;
            text-align: center;
            background-color: #fff;
            margin: 0;
            padding: 10px;
        }

        .paragraph {
            font-size: 15px;
            font-weight: bold;

        }

        .paragraphs {
            font-size: 15px;

            font-family: Arial, Helvetica, sans-serif;
        }

        .container {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        .certificate {
            max-width: 800px;
            box-sizing: border-box;
            padding: 20px;
            position: relative;
        }

        .tg {
            border-collapse: collapse;
            border-spacing: 0;
            width: 100%;
        }

        .tg td,
        .tg th {
            border: 1px solid #333;
            padding: 10px;
            font-family: Arial, sans-serif;
            font-size: 14px;
            word-break: break-all;
        }

        .tg .tg-1wig {
            font-weight: bold;
            text-align: left;
        }

        .tg .tg-0lax {
            text-align: left;
        }

        .logo {
            position: absolute;
            top: 40px;
            left: 206px;
            max-width: 80px;
            max-height: 80px;
        }

        .logos {
            position: absolute;
            top: 40px;
            right: 204px;
            max-width: 80px;
            max-height: 80px;
        }

        .certificate img {
            max-width: 100%;
            height: auto;
        }

        .hs {
            font-size: 24px;
            font-weight: bold;
            font-family: Arial, Helvetica, sans-serif;
            margin: 10px 0 1px;
        }

        .hs {
            font-size: 24px;
            margin-top: 10px;
            margin-bottom: 1px;
            font-weight: bold;
            font-family: Arial, Helvetica, sans-serif;
        }

        .flex-container {
            display: flex;
            justify-content: space-between;
        }

        .left-text {
            font-size: 15px;
            margin-top: 15px;
            margin-left: -180px;
            text-indent: 15px;
            text-decoration: underline;
            font-weight: bold;
            padding-left: 10PX;
            padding-top: 15px;
        }

        .right-text {
            font-size: 15px;
            margin-top: 15px;
            margin-right: -220px;
            text-indent: 15px;
            text-decoration: underline;
            font-weight: bold;
            padding-right: 10PX;
            padding-top: 15px;
        }

        .sn {
            text-align: center;
        }

        .phy {
            text-align: center;
        }

        .left {
            text-align: center;
            margin-left: -400px;
            padding-bottom: 8px;
        }

        .right {
            text-align: center;
            margin-left: -400px;
            padding-bottom: 8px;
        }
    </style>


    <div class="col-auto">
        <a id="sidepanel-toggler" class="sidepanel-toggler d-inline-block d-xl-none" href="#">
        </a>

    </div><!--//col-->

    <div class="app-utilities col-auto" hidden>

        <div class="app-utility-item">
            <button onclick="printPage()">Print</button>
            <input id="schoolYear" type="text" />
        </div>

        <div class="app-utility-item">
            <select id="semester">
                <option value="1" selected>First Semester</option>
                <option value="2">Second Semester</option>
                <option value="3">Mid Year</option>
            </select>
        </div>

    </div><!--//app-header-inner-->
    {{-- <div id="app-sidepanel" class="app-sidepanel"> --}}
    <div id="sidepanel-drop" class="sidepanel-drop"></div>
    {{-- <div class="sidepanel-inner d-flex flex-column"> --}}
    <a href="#" id="sidepanel-close" class="sidepanel-close d-xl-none">&times;</a>



    <style>
        /* Update the styling */
        .flex-container {
            display: flex;
            justify-content: center;
        }

        .flex-item {
            /* flex: 1; */
            margin: 10px;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .card {
            background: #fff;
            padding: 10px;
            text-align: center;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            transition: all 0.3s ease;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            max-width: 600px;
            /* Set max width for better readability */
        }

        /*
                        .card:hover {
                            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
                        }

                        */
        canvas {
            width: 100%;
            height: 180px;
            display: block;
            margin: 20px auto;
            /* Adjust margin for better centering */
        }

        .card a {
            text-decoration: none;
            color: #333;
            /* Set text color for readability */
            font-size: 22px;
            font-weight: bold;
        }

        .card-link {
            display: block;
            padding: 20px;
        }

        @media (max-width: 768px) {
            .flex-container {
                display: flex;
                justify-content: center;
            }

            .flex-item {
                margin: 10px 0;
            }

            .card {
                max-width: 100%;
                box-sizing: border-box;
                /* Include padding and border in max-width */
            }

            canvas {
                width: 100%;
                height: auto;
                /* Allow the height to adjust proportionally */
            }

            .card a {
                font-size: 18px;
                /* Adjust font size for smaller screens */
            }

            #notificationContainer {
                top: 10px;
                right: 10px;
                max-width: 90%;
            }

            #notificationBox {
                /* Add or modify styling for the notification box as needed */
                border: 1px solid #ddd;
                padding: 15px;
                background-color: #f9f9f9;
                border-radius: 5px;
            }

            #notificationIcon {
                font-size: 24px;
                margin-right: 8px;
            }

            #notificationMessage {
                flex-grow: 1;
                color: #333;
            }

            .closeButton {
                top: 5px;
                right: 5px;
                font-size: 16px;
            }
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

        /* h1 {
            animation: popUpEffect 1.5s ease-out;
            /* 1.5s duration with ease-out timing function */
        }

        */
    </style>

    <center>
        <th class="tg-0lax" colspan="4">
            <div class="certificate">
                <!-- START OF HEADER -->
                <img src="assets/images/isu-logo.png" alt="Logo" class="logo">
                <!-- Added logo image -->
                <img src="assets/images/isu-logo-med.png" alt="Logo" class="logos">
                <!-- Added logo image -->
                <div class="header">
                    <div class="paragraphs">Republic of The Philippines</div>
                    <div class="paragraph">ISABELA STATE UNIVERSITY</div>
                    <div class="paragraphs">Santiago Extension Unit</div>
                    <div class="paragraphs">Santiago City</div>
                    <div class="hs"><i>Health Services
                            <div class="solid"></div>
                            Graph Report
                        </i></div>
                </div>
            </div>
        </th>

    </center>
    <div class="app-utilities col-auto">


        <div class="flex-container">
            <div class="flex-item">
                <div class="card">
                    <a href="{{ route('report') }}">Monthly Consumption
                        <canvas id="medicineSupplyChart"></canvas>
                    </a>
                </div>
            </div>
            <div class="flex-item">
                <div class="card">
                    <a href="{{ route('inventory') }}">Equipment and Medicine Count
                        <canvas id="equipmentMedicineChart"></canvas>
                    </a>
                </div>
            </div>
        </div>

        <div class="flex-container">
            <div class="flex-item">
                <div class="card">
                    <a href="{{ route('students') }}"><small>Total Student</small> <small id="studentsLabelCount">
                        </small>
                        <canvas id="myDonutChart"></canvas>
                    </a>
                </div>
            </div>


            <div class="flex-item">
                <div class="card">
                    <a href="{{ route('consultation') }}">
                        <h3>Diagnosed Consultations</h3>
                        <canvas id="diagnosedCountChart"></canvas>
                    </a>
                </div>
            </div>
        </div>

    </div>

    <footer class="app-footer">
        <div class="container text-center py-3">
        </div>
    </footer><!--//app-footer-->
    </div>

    @include('sweetalert::alert')
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.print.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/5.0.8/jquery.inputmask.min.js"></script>

    <script src="assets/js/yearpicker.js"></script>


    <script src="https://momentjs.com/downloads/moment.js"></script>
    <script src="assets/plugins/popper.min.js"></script>
    <script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"
        integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU=" crossorigin="anonymous"></script>

    <!-- Charts JS -->
    <script src="assets/plugins/chart.js/chart.min.js"></script>
    <script src="assets/js/index-charts.js"></script>

    <script src="assets/js/app.js"></script>
    <script src="assets/js/MonthPicker.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        function printPage() {
            window.print();
        }





        function toggleNotification() {
            var notificationContainer = document.getElementById('notificationContainer');
            notificationContainer.style.display = 'block';

            // Simulate closing the notification after 5 seconds (adjust as needed)
            setTimeout(function() {
                hideNotification();
            }, 5000);
        }

        function hideNotification(event) {
            var notificationContainer = document.getElementById('notificationContainer');
            // Check if the click event happened inside the notification, if not, hide it
            if (!event || !notificationContainer.contains(event.target)) {
                notificationContainer.style.display = 'none';
            }
        }




        let myDonutChart;
        // start for student chart
        $(function() {
            initialize();
            $("#semester").on("change", function() {
                initialize();
            });
            $('#schoolYear').on('change', function() {
                initialize();
                updateUsedData();
            });
            updateUsedData();

            $('#test').on('click', function() {
                $.ajax({
                    url: "{{ route('two-factor.enable') }}"

                })
            })
        });

        function initialize() {
            $.ajax({
                url: "{{ route('home') }}",
                method: "get",
                data: {
                    semester: $("#semester").val(),
                    schoolyear: $('#schoolYear').val()
                },
                success: function(response) {
                    console.log(response); // Log the response to verify data
                    $('#studentsLabelCount').html(response.students);
                    updateDonutChart(response.bsit, response.bsa);
                },
                error: function(xhr, status, error) {
                    console.error("AJAX Request Error: " + error);
                    console.log("Status: " + status);
                }
            });
        }

        // start student chart
        function updateDonutChart(bsitCount, bsaCount) {
            let ctx = document.getElementById('myDonutChart').getContext('2d');

            if (myDonutChart) {
                myDonutChart.destroy(); // Destroy the existing chart instance
            }

            myDonutChart = new Chart(ctx, {
                type: 'doughnut',
                data: {
                    labels: ['BSIT', 'BSA'],
                    datasets: [{
                        data: [bsitCount, bsaCount],
                        backgroundColor: [
                            '#0056ed',
                            '#00ed2b'
                        ]
                    }]
                },
                options: {}
            });
        }

        // end student chart

        // start equipment and medicine Chart
        function createEquipmentMedicineChart(equipmentCount, medicineCount) {
            // Convert values to integers, default to 0 if NaN or undefined
            equipmentCount = parseInt(equipmentCount) || 0;
            medicineCount = parseInt(medicineCount) || 0;

            var ctx = document.getElementById('equipmentMedicineChart').getContext('2d');
            var equipmentMedicineChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: ['Equipment', 'Medicine'],
                    datasets: [{
                            label: 'Equipment',
                            data: [equipmentCount, 0], // Values in respective positions
                            backgroundColor: '#d01bb8',
                            borderColor: '#d01bb8',
                            borderWidth: 1
                        },
                        {
                            label: 'Medicine',
                            data: [0, medicineCount], // Values in respective positions
                            backgroundColor: '#57b1e6',
                            borderColor: '#57b1e6',
                            borderWidth: 1
                        }
                    ]
                },
                options: {
                    indexAxis: 'y', // Change orientation to vertical
                    barPercentage: 0.5, // Adjust bar thickness
                    categoryPercentage: 0.5, // Adjust space between bars
                    scales: {
                        x: {
                            beginAtZero: true
                        }
                    }
                }
            });
        }

        // Get values from PHP, default to 0 if not set or invalid
        var equipmentCount = <?php echo isset($equipment) ? (int) $equipment : 0; ?>;
        var medicineCount = <?php echo isset($medicine) ? (int) $medicine : 0; ?>;

        createEquipmentMedicineChart(equipmentCount, medicineCount);

        // end equipment and medicine Chart








        // consultaion
        function createDiagnosedCountChart(diagnosedCount, pending, notDiagnosedCount) {
            if (!isNaN(diagnosedCount) && !isNaN(pending) && !isNaN(notDiagnosedCount)) {
                diagnosedCount = parseInt(diagnosedCount);
                pending = parseInt(pending);
                notDiagnosedCount = parseInt(notDiagnosedCount);

                var ctx = document.getElementById('diagnosedCountChart').getContext('2d');
                var myBarChart = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: ['Diagnosed', 'Pending', 'Not Diagnosed'],
                        datasets: [{
                                label: 'Diagnosed',
                                data: [diagnosedCount, 0, 0], // Values in respective positions
                                backgroundColor: '#005dff',
                                borderColor: '#005dff',
                                borderWidth: 1
                            },
                            {
                                label: 'Pending',
                                data: [0, pending, 0], // Values in respective positions
                                backgroundColor: '#0cf6e6',
                                borderColor: '#0cf6e6',
                                borderWidth: 1
                            },
                            {
                                label: 'Not Diagnosed',
                                data: [0, 0, notDiagnosedCount], // Values in respective positions
                                backgroundColor: '#ff0000',
                                borderColor: '#ff0000',
                                borderWidth: 1
                            }
                        ]
                    },
                    options: {
                        responsive: true,
                        scales: {
                            yAxes: [{
                                ticks: {
                                    beginAtZero: true,
                                    precision: 0
                                }
                            }]
                        },
                        legend: {
                            display: true,
                            labels: {
                                fontColor: 'black'
                            }
                        }
                    }
                });
            } else {
                console.error('Invalid or undefined values for the chart data.');
            }
        }

        var diagnosedCount = {{ isset($approvedCount) ? $approvedCount : '0' }};
        var pendingCount = {{ isset($pendingCount) ? $pendingCount : '0' }};
        var declinedCount = {{ isset($declinedCount) ? $declinedCount : '0' }};

        createDiagnosedCountChart(diagnosedCount, pendingCount, declinedCount);




        // user///////////////

        function createUserRoleChart(nurseCount, doctorCount) {
            var ctx = document.getElementById('userRoleChart').getContext('2d');
            var userRoleChart = new Chart(ctx, {
                type: 'doughnut',
                data: {
                    labels: ['Nurse', 'Doctor'],
                    datasets: [{
                        data: [nurseCount, doctorCount],
                        backgroundColor: [
                            '#cc65fe', // Blue color for Nurse
                            '#ffce56' // Red color for Doctor
                        ],
                        borderColor: [
                            '#cc65fe',
                            '#ffce56'
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                }
            });
        }

        document.addEventListener("DOMContentLoaded", function() {
            createUserRoleChart(<?php echo $nurseCount; ?>, <?php echo $doctorCount; ?>);
        });


        //user end/////////////

        // medsup and medequip
        let medicineSupplyChart; // Declare the chart variable globally

        // Function to update the chart with medicine and equipment used data
        function updateUsedData() {
            $.ajax({
                url: 'monthlyConsumption', // Update with your actual route
                type: 'GET',
                dataType: 'json',
                data: {
                    schoolYear: $('#schoolYear').val(),
                },
                success: function(data) {
                    var ctx = document.getElementById('medicineSupplyChart').getContext('2d');

                    // Destroy the existing chart instance if it exists
                    if (medicineSupplyChart) {
                        medicineSupplyChart.destroy();
                    }

                    // Create a new chart instance
                    medicineSupplyChart = new Chart(ctx, {
                        type: 'bar',
                        data: {
                            labels: Object.keys(data.medicine),
                            datasets: [{
                                label: 'Medicine Used',
                                backgroundColor: '#2986cc',
                                data: Object.values(data.medicine).length === 0 ? [0] : Object
                                    .values(data.medicine),
                            }, {
                                label: 'Equipment Used',
                                backgroundColor: '#c90076',
                                data: Object.values(data.equipment).length === 0 ? [0] : Object
                                    .values(data.equipment),
                            }]
                        },
                        options: {
                            scales: {
                                y: {
                                    beginAtZero: true,
                                },
                            },
                        },
                    });
                },
                error: function(error) {
                    console.error('Error fetching used data:', error);

                    // Display an error message or take other actions here
                    alert('Error fetching used data. Please try again.');
                }
            });
        }












        // Sample data for medicine intake, using days as labels
        var days = ['Day 1', 'Day 2', 'Day 3', 'Day 4', 'Day 5', 'Day 6', 'Day 7'];
        var medicineTaken = [2, 3, 1, 4, 2, 5, 3]; // Sample data for medicines taken each day

        var ctx = document.getElementById('medicineChart').getContext('2d');
        var medicineChart = new Chart(ctx, {
            type: 'line', // Set the type to 'line' for a line chart
            data: {
                labels: days,
                datasets: [{
                    label: 'Medicine Intake',
                    data: medicineTaken,
                    fill: false,
                    borderColor: 'rgb(75, 192, 192)',
                    tension: 0.4
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>



</body>


</html>
