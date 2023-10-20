<button class="btn-sm app-btn-secondary"  onclick="ShowModal ('{{$id}}', '{{$username}}', '{{$role}}', '{{$email}}' )"> edit</button>
@if(Auth::user()->role == 'nurse')
<a class="btn-sm app-btn-secondary" data-confirm-delete="true" href="{{route('deleteUser', ['id'=> $id])}}">Delete</a>
@endif
