<a class="btn-sm app-btn-primary"
    onclick="ShowModal ('{{ $id }}', '{{ $username }}','{{ $name }}', '{{ $role }}', '{{ $email }},' )">
    edit</a>
{{-- @if (Auth::user()->role == 'nurse')
    <a class="btn-sm app-btn-danger" data-confirm-delete="true" href="{{ route('deleteUser', ['id' => $id]) }}">Delete</a>
@endif --}}
