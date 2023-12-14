@if (Auth::user()->role == 'nurse')
    <button class="btn-sm app-btn-primary" id="editMedicine"
        onclick="ShowModal('{{ $id }}', '{{ $med_name }}', '{{ $description }}', '{{ $expiration }}', '{{ $quantity }}')">edit</button>
    <button class="btn-sm app-btn-danger" onclick="deleteItem('medicine', {{ $id }})">Delete</button>
    <button class="btn-sm app-btn-success" id="addsuuplymed" onclick="ShowAddModalmed ('{{ $id }}')">Add
        Supply</button></button>
@endif
