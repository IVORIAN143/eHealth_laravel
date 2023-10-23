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
                        <br> MEDICINE CONSUMPTION
                        <br> REPORT FOR MONTH OF
                    </i></div>
            </div>
        </div>

        <div class="tg-wrap">
            <table class="tg">
                <thead>
                    <tr>
                        <th class="tg-0pky">Medicine</th>
                        <th class="tg-0lax" colspan="2">Balance(Beginning)</th>
                        <th class="tg-0lax" colspan="2">Purchased during the Period</th>
                        <th class="tg-0lax">TOTAL</th>
                        <th class="tg-0pky" colspan="2">Issued during the Period</th>
                        <th class="tg-0pky" colspan="2">Balance(End)</th>
                        <th class="tg-0pky">Expiry</th>
                    </tr>
                    <tr>
                        <td class="tg-baqh"></td>
                        <td class="tg-baqh">Quantity</td>
                        <td class="tg-baqh">Amount</td>
                        <td class="tg-baqh">Quantity</td>
                        <td class="tg-baqh">Amount</td>
                        <td class="tg-baqh"></td>
                        <td class="tg-baqh">Quantity</td>
                        <td class="tg-baqh">Amount</td>
                        <td class="tg-baqh">Quantity</td>
                        <td class="tg-baqh">Amount</td>
                        <td class="tg-baqh"></td>
                    </tr>
                </thead>
                <tbody>
                    @foreach($medicines as $medicine)
                    <tr>
                        @php($totalQuantity = $medicine->med_quantity + $medicine->SumMed())
                        <td class="tg-0pky">{{$medicine->med_name}}</td>
                        <td class="tg-0pky">{{$medicine->quantity}}</td>
                        <td class="tg-0pky"></td>
                        <td class="tg-0pky">{{$medicine->SumMed()}}</td>
                        <td class="tg-0pky"></td>
                        <td class="tg-0pky">{{$totalQuantity}}</td>
                        <td class="tg-0pky">{{$medicine->countUsed()}}</td>
                        <td class="tg-0pky"></td>
                        <td class="tg-0pky">{{$totalQuantity - $medicine->countUsed()}}</td>
                        <td class="tg-0pky"></td>
                        <td class="tg-0pky">{{$medicine->description}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>


        <div class="flex-container">
            <div class="left-text">
                <div class="left-text">
                    <div class="left">Prepared by:</div>
                    <br>DEBBIE-LYN P. DOLOJAN,RN,MSN
                    <div class="sn">Nurse Attednant</div>
                </div>
            </div>

            <div class="right-text">
                <div class="right-text">
                    <div class="right">Noted by:</div>
                    <br>ENGR. EDWARD B. PANGANIBAN, Ph,D.
                    <div class="phy">Campus Coordinator</div>
                </div>
            </div>
        </div>




    </div>
</body>

</html>