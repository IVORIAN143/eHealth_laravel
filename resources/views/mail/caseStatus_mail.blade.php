<!DOCTYPE html>
<html>

<head>
    <title>Emergency</title>
</head>

<body>
    <p>Good day!</p>
    <p>We have a patient presenting with a severe case requiring immediate attention. Kindly review this consultation
        promptly and advise on necessary actions.</p>
    <p>Thank you.</p>
    <p>ISU-eHealthmate</p>
    <p>Consultation ID: {{ $caseStatus->id }}</p>
    <p>Patient Name: {{ $caseStatus->student->firstname }} {{ $caseStatus->student->middlename }}
        {{ $caseStatus->student->lastname }}</p>
    <p>Patient Course: {{ $caseStatus->student->course }}</p>
    <p>Patient Year Level: {{ $caseStatus->student->year_level }}</p>


    <hr />
</body>

</html>
