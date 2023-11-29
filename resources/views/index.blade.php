@extends('layout.master')

@section('content')

    <style>
        /* Update the styling */
        .flex-container {
            display: flex;
            justify-content: center;
            align-items: center;
            /* background-color: #f1f1f1;    */
            padding: 10px;
            height: auto;
            /* Set height to fill the viewport */
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

        .card:hover {
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        }

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
                flex-direction: column;
            }

            .flex-item {
                margin: 10px 0;
            }

            .card {
                max-width: 100%;
                /* Adjust width for smaller screens */
            }

            canvas {
                width: 90%;
                height: 200px;
                /* Adjust height for smaller screens */
            }

            .card a {
                font-size: 20px;
                /* Adjust font size for smaller screens */
            }


            #notificationContainer {
                position: fixed;
                top: 20px;
                right: 20px;
                max-width: 300px;
                background-color: #fff;
                box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
                border-radius: 5px;
                padding: 10px;
                display: none;
                /* Initially hidden */
                z-index: 1000;
            }

            #notificationBox {
                /* Add styling for the notification box as needed */
                border: 1px solid #ddd;
                padding: 15px;
                background-color: #f9f9f9;
                border-radius: 5px;
            }

            #notificationContent {
                display: flex;
                align-items: center;
            }

            #notificationIcon {
                font-size: 30px;
                margin-right: 10px;
                color: #1877f2;
                /* Facebook blue */
            }

            #notificationMessage {
                flex-grow: 1;
                color: #333;
            }

            /* Close button styling */
            .closeButton {
                cursor: pointer;
                position: absolute;
                top: 5px;
                right: 10px;
                font-size: 18px;
                color: #aaa;
            }
        }
    </style>
    <h1> Dashboard </h1>
    {{-- NOTIFICATION --}}
    <!-- Assume this code is within your Blade view file -->
    {{-- <!-- Trigger button for consultation notifications -->
    <div class="app-utility-item app-notifications-dropdown dropdown">
        <a class="dropdown-toggle no-toggle-arrow" id="consultation-notifications-dropdown-toggle" data-bs-toggle="dropdown"
            href="#" role="button" aria-expanded="false" title="Consultation Notifications">
            <!-- Use a relevant icon for consultation notifications -->
            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-bell icon" fill="currentColor"
                xmlns="http://www.w3.org/2000/svg">
                <!-- Icon path here -->
            </svg>
            <!-- Replace 'notificationCount' with the actual count of consultation notifications -->
            <span class="icon-badge" id="notificationCount">3</span>
        </a>
        <div class="dropdown-menu p-0" aria-labelledby="consultation-notifications-dropdown-toggle">
            <div class="dropdown-menu-header p-3">
                <h5 class="dropdown-menu-title mb-0">Consultation Notifications</h5>
            </div>
            <div class="dropdown-menu-content">
                <!-- Loop through your consultation notifications and display them -->
                {{-- @foreach ($consultationNotifications as $notification) --}}
    <div class="item p-3">
        <!-- Individual notification content here -->
        <!-- Replace 'notificationImage', 'notificationMessage', and 'notificationTime' with actual data -->
        <div class="row gx-2 justify-content-between align-items-center">
            <div class="col-auto">
                {{-- <img class="profile-image" src="{{ $notification->image }}" alt="" /> --}}
            </div>
            <div class="col">
                <div class="info">
                    <div class="desc">
                        {{-- {{ $notification->message }} --}}
                    </div>
                    {{-- <div class="meta">{{ $notification->time }}</div> --}}
                </div>
            </div>
        </div>
        {{-- <a class="link-mask" href="{{ $notification->link }}"></a> --}}
    </div>
    {{-- @endforeach --}}
    </div>
    <div class="dropdown-menu-footer p-2 text-center">
        {{-- <a href="{{ route('consultation.notifications') }}">View all</a> --}}
    </div>
    </div>
    </div>






    <div class="app-utilities col-auto">


        <div class="flex-container">

            {{-- <div class="flex-item">
                <div class="card">
                    <a href="{{ route('report') }}">Daily Medicine
                        <canvas id="medicineChart"></canvas>
                    </a>
                </div>
            </div> --}}
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
            @if (Auth::user()->role == 'nurse')
                <div class="flex-item">
                    <div class="card">
                        <a href="{{ route('user') }}">
                            <h3>User Roles</h3>
                            <canvas id="userRoleChart"></canvas>
                        </a>
                    </div>
                </div>
            @endif

        </div>
    @stop

    @push('js')
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script>
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
    @endpush
