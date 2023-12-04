<a class="btn-sm app-btn-info" href="{{ route('studentView', ['id' => $id]) }}">View</a>

@if (Auth::user()->role == 'nurse')
    <a class="btn-sm app-btn-success" href="{{ route('studentCert', ['id' => $id]) }}" target="_blank">Print Student
        Certificate</a>
    <a class="btn-sm app-btn-danger" data-confirm-delete="true"
        href="{{ route('deletestudent', ['id' => $id]) }}">Delete</a>
@endif
