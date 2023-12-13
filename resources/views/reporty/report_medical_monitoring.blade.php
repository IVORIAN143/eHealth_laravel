<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Medical Monitoring Sheet</title>
</head>
<style type="text/css">
    body {
        font-family: Arial, sans-serif;
        text-align: center;
        background-color: #fff;
        margin: 0;
        padding: 10px
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
        top: 50px;
        left: 300px;
        max-width: 80px;
        max-height: 80px;
    }

    .logos {
        position: absolute;
        top: 50px;
        right: 300px;
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

    .lefty {
        text-align: left;
        margin-left: -400px;
        padding-bottom: 8px;
    }

    .right {
        text-align: center;
        margin-left: -400px;
        padding-bottom: 8px;
    }

    .bot {
        text-align: left;
        padding-right: 290px;
        padding-bottom: 5px;

        @media only screen and (max-width: 768px) {
            .container {
                padding: 5px;
                /* Adjust padding for smaller screens */
            }

            .left-text,
            .right-text {
                margin-left: 0;
                margin-right: 0;
            }
        }
</style>

<body>
    <div class="container">
        <div class="certificate">
            <!-- START OF HEADER -->
            <img src="assets/images/isu-logo-med.png" alt="Logo" class="logo"> <!-- Added logo image -->
            <img src="assets/images/isu-logo.png" alt="Logo" class="logos"> <!-- Added logo image -->
            <div class="header">
                <div class="paragraphs">Republic of The Philippines</div>
                <div class="paragraph">ISABELA STATE UNIVERSITY</div>
                <div class="paragraphs">Santiago Extension Unit</div>
                <div class="paragraphs">Santiago City</div>
                <div class="hs">
                    <i>Health Services
                        <div class="solid"></div>
                        <br> MEDICAL MONITORING SHEET
                    </i>
                </div>

            </div>
        </div>
        <div class="tg-wrap">
            <img id="signatureImage" src="path_to_your_signature_image.png" alt="Signature"
                style="max-width: 100px; height: auto; display: none;" />
            <table class="tg">
                <thead>
                    <tr>
                        <th class="tg-cly1" rowspan="2">DATE</th>
                        <th class="tg-cly1" rowspan="2">TIME OF <br>ARRIVAL</th>
                        <th class="tg-cly1" rowspan="2">NAME OF PATIENT</th>
                        <th class="tg-cly1" rowspan="2">SEX</th>
                        <th class="tg-cly1" rowspan="2">COURSE/<br>YR</th>
                        <th class="tg-cly1" rowspan="2">STUDENT#<br>/ ID#</th>
                        <th class="tg-cly1" rowspan="2">SIGNS/SYMPTOMS/<br>DIAGNOSIS</th>
                        <th class="tg-cly1" rowspan="2">ACTION</th>
                        <th class="tg-cly1" rowspan="2">MEDS/TREATMENT</th>
                        <th class="tg-cly1" rowspan="2">SIGNATURE<br>OF <br>PATIENT</th>
                        <th class="tg-cly1" rowspan="2">TIME <br>OF<br>EXIT</th>
                        <th class="tg-cly1" colspan="3">DURATION OF SERVICE</th>
                        <th class="tg-cly1" rowspan="2">ATTENDING<br>MEDICAL<br>PERSONNEL</th>
                    </tr>
                    <tr>
                        <th class="tg-cly1">(&lt;) 1HR</th>
                        <th class="tg-cly1">1H</th>
                        <th class="tg-cly1">(&gt;)1HR</th>
                    </tr>
                    @foreach ($consultations as $consultation)
                        <tr>
                            <td class="tg-0lax">{{ $consultation->created_at->format('m-d-Y') }}</td>
                            <td class="tg-0lax">{{ $consultation->created_at->format('h:i:s A') }}</td>
                            <td class="tg-0lax"> {{ $consultation->student->firstname }}
                                {{ $consultation->student->middlename }}
                                {{ $consultation->student->lastname }}</td>
                            <td class="tg-0lax"> {{ $consultation->student->gender }}</td>
                            <td class="tg-0lax"> {{ $consultation->student->course }} {{ $consultation->student->year }}
                            </td>
                            <td class="tg-0lax"> {{ $consultation->student->student_id }}</td>
                            <td class="tg-0lax"> {{ $consultation->diagnosis }}</td>
                            <td class="tg-0lax"></td>
                            <td class="tg-0lax">{{ $consultation->instruction }}</td>
                            <td class="tg-0lax">
                                <img src="{{ asset('storage/signatures/' . $consultation->student_id . '.png') }}"
                                    alt="Patient Signature" width="90" height="20">
                            </td>
                            <td class="tg-0lax"></td>
                            <td class="tg-0lax"></td>
                            <td class="tg-0lax"></td>
                            <td class="tg-0lax"></td>
                            <td class="tg-0lax"></td>
                        </tr>
                    @endforeach
                </thead>
                <tbody>

                    </tr>
                </tbody>
            </table>
        </div>

        <div class="flex-container">
            <div class="left-text">
                <div class="left-text">
                    <div class="left">Prepared by:</div>
                    @foreach ($users as $user)
                        @if ($user->role == 'nurse')
                            <br>{{ $user->name }}
                        @endif
                    @endforeach
                    <div class="sn">Nurse Attednant</div>
                </div>
            </div>

            <div class="right-text">
                <div class="right-text">
                    <div class="right">Noted by:</div>
                    <br>
                    @foreach ($users as $user)
                        @if ($user->role == 'coordinator')
                            <br>{{ $user->name }}
                        @endif
                    @endforeach
                    <div class="phy">Campus Coordinator</div>
                </div>
            </div>
        </div>
        <br>
        <br>
        <div class="flex-container">
            <div class="left-text">
                <div class="bot">
                    <div class="bot"><b>ISUS-HeS-MCR-037c</b></div>
                    <div class="bot">Effectivity: March 29, 2022</div>
                    <div class="bot">Revision 0</div>
                </div>
            </div>
        </div>
    </div>
</body>
