<button class="btn-sm app-btn-secondary" id="editequip" onclick="ShowModalequip ('{{$id}}', '{{$equipname}}', '{{$descriptio}}')">edit</button>

@if(Auth::user()->role == 'nurse')
<a class="btn-sm app-btn-secondary" data-confirm-delete="true" href="{{route('deleteequip', ['id'=> $id])}}">Delete</a>
@endif
