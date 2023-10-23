<a class="btn-sm app-btn-secondary" href="">View</a>
<a class="btn-sm app-btn-secondary" href="{{ route('studentCert', ['id' => $id]) }}">Print Certificate</a>
@if(Auth::user()->role == 'nurse')
<a class="btn-sm app-btn-secondary" data-confirm-delete="true" href="{{route('deletestudent', ['id'=> $id])}}">Delete</a>
@endif