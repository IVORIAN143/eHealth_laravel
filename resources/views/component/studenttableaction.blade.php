<a class="btn-sm app-btn-secondary" href="#">View</a>

@if(Auth::user()->role == 'nurse')
<a class="btn-sm app-btn-secondary" data-confirm-delete="true" href="{{route('deletestudent', ['id'=> $id])}}">Delete</a>
@endif
