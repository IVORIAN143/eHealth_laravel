<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Medicine Certificate</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            background-color: #f4f4f4;
            /* Added a background color for better visibility */
            margin: 0;
            /* Remove default margin */
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
            /* border: 2px solid #333; */
            /* background-color: #fff; */
            box-sizing: border-box;
            padding: 20px;
            /* Added padding for better spacing */
            position: relative;
        }

        .tg {
            border-collapse: collapse;
            border-spacing: 0;
            width: 100%;
            /* Added to make the table responsive */
        }

        .tg td,
        .tg th {
            border: 1px solid #333;
            /* Changed border-color to #333 */
            padding: 10px;
            /* Simplified padding */
            font-family: Arial, sans-serif;
            font-size: 14px;
            word-break: break-all;
            /* Improved word break behavior */
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
            /* Position the image absolutely */
            top: 50px;
            /* Distance from top */
            left: 300px;
            /* Distance from left */
            max-width: 80px;
            /* Limit the width if necessary */
            max-height: 80px;
            /* Limit the width if necessary */
        }

        .logos {
            position: absolute;
            /* Position the image absolutely */
            top: 50px;
            /* Distance from top */
            right: 300px;
            /* Distance from left */
            max-width: 80px;
            /* Limit the width if necessary */
            max-height: 80px;
            /* Limit the width if necessary */
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
            /* Simplified margin properties */
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
</head>

<body>
    <div class="container">
        <div class="certificate">
            <!-- START OF HEADER -->
            <img src="assets/images/isu-logo.png" alt="Logo" class="logo"> <!-- Added logo image -->
            <img src="assets/images/isu-logo.png" alt="Logo" class="logos"> <!-- Added logo image -->
            <div class="header">
                <div class="paragraphs">Republic of The Philippines</div>
                <div class="paragraph">ISABELA STATE UNIVERSITY</div>
                <div class="paragraphs">Santiago Extension Unit</div>
                <div class="paragraphs">Santiago City</div>
                <div class="hs"><i>Health Services
                        <br> SUPPLIE CONSUMPTION
                        <br> REPORT FOR MONTH OF
                    </i></div>
            </div>
        </div>

        <div class="tg-wrap">
            <table class="tg">
                <thead>
                    <tr>
                        <td class="tg-1wig">DATE</td>
                        <td class="tg-1wig">PATIENT</td>
                        <td class="tg-1wig">COURSE/YR</td>
                        <td class="tg-1wig">DIAGNOSIS</td>
                        <td class="tg-1wig">MEDICINES USED</td>
                        <td class="tg-1wig">SIGNATURE</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach($consultations as $consultation)
                    <tr>
                        <td class="tg-0pky">{{ $consultation->created_at->format('Y-m-d') }}</td>
                        <td class="tg-0pky">
                            {{ $consultation->student->firstname }}
                            {{ $consultation->student->middlename }}
                            {{ $consultation->student->lastname }}
                        </td>
                        <td class="tg-0pky">{{ $consultation->student->course }}-{{ $consultation->student->year }}</td>
                        <td class="tg-0pky">{{ $consultation->diagnosis }}</td>
                        <td class="tg-0pky">
                            @foreach($consultation->med_used as $med)
                            {{ $med->medicine->med_name }}: {{ $med->quantity }}<br>
                            @endforeach
                        </td>
                        <td class="tg-0pky"></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

        </div>

        <div class="flex-container">
            <div class="left-text">DEBBIE-LYN P. DOLOJAN,RN,MSN</div>
            <div class="right-text">NICOLAS L. ILAGAN, M.D., FPMSI.</div>
        </div>
        <div class="flex-container">
            <div class="sn">School Nurse</div>
            <div class="phy">University Physician & Director for Health Services</div>
        </div>

        <div class="bot"><b>ISUS-HeS-MCR-037c</b></div>
        <div class="bot">Effectivity: March 29, 2022</div>
        <div class="bot">Revision 0</div>
    </div>
</body>

</html>