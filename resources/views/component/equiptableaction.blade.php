@if (Auth::user()->role == 'nurse')
    <button class="btn-sm app-btn-primary" id="editequip"
        onclick="ShowModalequip ('{{ $id }}', '{{ $equipname }}', '{{ $descriptio }}', '{{ $equi_expiration }}', '{{ $equip_quantity }}')">edit</button>
    <button class="btn-sm app-btn-danger" onclick="deleteItem('equipment', {{ $id }})">Delete</button>
    <button class="btn-sm app-btn-success" id="addsuuplyequip" onclick="ShowAddModalequip ('{{ $id }}')">Add
        Supply</button></button>
@endif
