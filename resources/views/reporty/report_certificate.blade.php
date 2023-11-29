<style>
    /* Base styles for larger screens */
    body {
        font-family: Arial, sans-serif;
        text-align: center;
    }

    .certificate {
        width: 100%;
        max-width: 800px;
        margin: 0 auto;
        border: 2px solid #333;
        background-color: #fff;
        position: relative;
        box-sizing: border-box;
        padding: 20px;
    }


    .logo {
        position: absolute;
        top: 50px;
        left: 160px;
        max-width: 80px;
        max-height: 80px;
    }

    .logos {
        position: absolute;
        top: 50px;
        right: 160px;
        max-width: 80px;
        max-height: 80px;
    }

    .certificate img {
        max-width: 100%;
        height: auto;
    }

    .title {
        font-size: 24px;
        margin-top: 15px;
        font-weight: bold;
    }

    .paragraph {
        font-size: 15px;
        font-weight: bold;
    }

    .paragraphs {
        font-size: 15px;
        font-family: Arial, Helvetica, sans-serif;
    }

    .hs {
        font-size: 24px;
        margin-top: 10px;
        margin-bottom: 1px;
        font-weight: bold;
        font-family: Arial, Helvetica, sans-serif;
    }

    .header {
        padding-top: 55px;
    }

    hr.solid {
        border-top: 2px solid #000000;
        left: 1px;
        width: 640px;
    }

    .wordleft {
        text-align: left;
        font-weight: bold;
        font-size: 19px;
        text-indent: 15px;
        padding-top: 20px;
        padding-bottom: 5px;
    }

    .wr {
        text-align: left;
        font-size: 15px;
        text-indent: 15px;
        padding-top: 5px;
        padding-bottom: 5px;
    }

    .letter {
        padding-top: 50px;
        padding-right: 30px;
        padding-bottom: 50px;
        padding-left: 20px;
    }

    .justify {
        text-align: justify;
        text-indent: 60px;
        font-size: 15px;
        padding-top: 55px;
        padding-bottom: 5px;
    }

    .flex-container {
        display: flex;
        justify-content: space-between;
    }

    .left-text {
        font-size: 15px;
        margin-top: 15px;
        text-indent: 15px;
        text-decoration: underline;
        font-weight: bold;
        padding-top: 40px;
    }

    .right-text {
        font-size: 15px;
        margin-top: 15px;
        text-indent: 15px;
        text-decoration: underline;
        font-weight: bold;
        padding-right: 55px;
        padding-top: 40px;
    }

    .sn {
        text-align: left;
        text-indent: 15px;
        padding-bottom: 60px;
    }

    .phy {
        text-indent: 15px;
        padding-right: 15px;
        padding-bottom: 40px;
    }

    .bot {
        text-align: left;
        text-indent: 15px;
        padding-right: 15px;
        padding-bottom: 5px;
    }

    #agePlaceholder {
        font-weight: bold;
        text-decoration: underline;
    }

    /* Responsive styles for smaller screens */
    @media screen and (max-width: 768px) {
        .certificate {
            max-width: 100%;
            margin: 0;
            border: none;
        }

        .header {
            padding-top: 30px;
        }
    }

    @media print {

        /* Adjust styles for printing */
        .certificate {
            border: none;
            padding: 0;
        }
    }
</style>


<div class="certificate">
    <!-- START OF HEADER -->
    <img src="assets/images/isu-logo.png" alt="Logo" class="logo"> <!-- Added logo image -->
    <img src="assets/images/isu-logo-med.png" alt="Logo" class="logos"> <!-- Added logo image -->
    <div class="header">
        <div class="paragraphs">Republic of The Philippines</div>
        <div class="paragraph">ISABELA STATE UNIVERSITY</div>
        <div class="paragraphs">Santiago Extension Unit</div>
        <div class="paragraphs">Santiago City</div>
        <div class="hs"><i>Health Services</i></div>
    </div>
    <!-- END OF HEADER -->
    <hr class="solid">
    <div class="title"><u>MEDICAL CERTIFICATE</u></div>
    <div class="letter">
        <div class="wordleft">TO WHOM IT MAY CONCERN,</div>
        <div class="justify">
            <b>THIS IS TO CERTIFY</b> that <strong><u>{{ $student->firstname }} {{ $student->middlename }}
                    {{ $student->lastname }}</u></strong>,
            age <span id="agePlaceholder">XX</span> years old, sex <strong><u>{{ $student->gender }}</u></strong>
        </div>
        <div class="wr">civil status <u> {{ $student->civilStat }} </u> , a student/employee of <b><u>ISABELA STATE
                    UNIVERSITY-Santiago Extension Unit.</u></b></div>
        <div class="wr">with ID Number
            {{ substr($student->student_id, 0, 2) }}-{{ substr($student->student_id, 2) }} was seen and examined in this
            clinic on <span id="currentDatePlaceholder">____</span>.</div>


        <div class="wordleft">DIAGNOSIS: </div>
        <div class="wordleft">Remarks: </div>

        <div class="wr">Given this <u><b>{{ date('jS') }} </b></u> day of <u><b>
                    {{ date('F') }},{{ date('Y') }}.</b></u></div>
        <div class="flex-container">
            <div class="left-text">DEBBIE-LYN P. DOLOJAN,RN,MSN</div>
            <div class="right-text">NICOLAS L. ILAGAN, M.D., FPMSI.</div>
        </div>
        <div class="flex-container">
            <div class="sn">School Nurse</div>
            <div class="phy">University Physician & Director for Health Services</div>
        </div>
        <div class="sn"><small>Regular Medical Certificate.</small></div>
        <div class="bot"><b>ISUS-HeS-MCR-037c</b></div>
        <div class="bot">Effectivity: March 29, 2022</div>
        <div class="bot">Revision 0</div>
    </div>

    <script>
        window.onload = function() {
            window.print();
        }


        var age = getAge("{{ $student->dateOfBirth }}");
        document.getElementById("agePlaceholder").innerHTML = age;

        function getAge(dateString) {
            var today = new Date();
            var birthDate = new Date(dateString);
            var age = today.getFullYear() - birthDate.getFullYear();

            return age;
        }


        var currentDate = new Date();
        // Format the date as "MM/DD/YYYY" or any format you prefer
        var formattedDate = (currentDate.getMonth() + 1) + "/" + currentDate.getDate() + "/" + currentDate.getFullYear();
        // Set the formatted date in the placeholder
        document.getElementById("currentDatePlaceholder").textContent = formattedDate;
    </script>
