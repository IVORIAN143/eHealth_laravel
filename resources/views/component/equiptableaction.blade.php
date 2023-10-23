@if(Auth::user()->role == 'nurse')
<button class="btn-sm app-btn-secondary" id="editequip" onclick="ShowModalequip ('{{$id}}', '{{$equipname}}', '{{$descriptio}}')">edit</button>
<a class="btn-sm app-btn-secondary" data-confirm-delete="true" href="{{route('deleteequip', ['id'=> $id])}}">Delete</a>
<button class="btn-sm app-btn-secondary" id="addsuuplyequip" onclick="ShowAddModalequip ('{{$id}}')">Add Supply</button></button>
@endif