<a class="btn-sm app-btn-info" href="{{ route('studentView', ['id' => $id]) }}">VIEW</a>

@if (Auth::user()->role == 'nurse')
    <a class="btn-sm app-btn-success" href="{{ route('studentCert', ['id' => $id]) }}" target="_blank">PRINT</a>
    {{-- <a class="btn-sm app-btn-danger" data-confirm-delete="true"
        href="{{ route('deletestudent', ['id' => $id]) }}">Delete</a> --}}

    {{-- <a class="btn-sm app-btn-info" type="button" data-bs-toggle="modal" data-bs-target="#editstudentModal"
        onclick="ShowStudentModal('{{ $id }}','{{ $fad_Allergy }}','{{ $fad_indicate }}','{{ $student_id }}','{{ $contact }}','{{ $lastname }}','{{ $firstname }}','{{ $middlename }}','{{ $gender }}','{{ $civilStat }}','{{ $dateOfBirth }}','{{ $course }}','{{ $year }}','{{ $homeAddress }}','{{ $parentName }}','{{ $parentAddress }}','{{ $relationship }}','{{ $parentNumber }}','{{ $height }}','{{ $weight }}','{{ $infectedCovid }}','{{ $recieveVaccine }}','{{ $dateDose1 }}','{{ $dateDose2 }}','{{ $dateBoostDose1 }}','{{ $dateBoostDose2 }}','{{ $vaccineBrand }}','{{ $dose1 }}','{{ $dose2 }}','{{ $boostLocation1 }}','{{ $boostLocation2 }}','{{ $semester }}','{{ $schoolYear }}')">
        Edit Student Information
    </a> --}}


    <a class="btn-sm app-btn-info" href="{{ route('studentUpdate', ['id' => $id]) }}">UPDATE</a>
@endif
