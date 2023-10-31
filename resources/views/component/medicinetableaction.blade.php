@if(Auth::user()->role == 'nurse')
<button class="btn-sm app-btn-secondary" id="editMedicine" onclick="ShowModal('{{$id}}', '{{$med_name}}', '{{$description}}', '{{$expiration}}', '{{$quantity}}')">edit</button>
<a class="btn-sm app-btn-secondary" data-confirm-delete="true" href="{{route('deletemedicine', ['id'=> $id])}}">Delete</a>
<button class="btn-sm app-btn-secondary" id="addsuuplymed" onclick="ShowAddModalmed ('{{$id}}')">Add Supply</button></button>
@endif