@if (Auth::user()->role == 'nurse' && $status == 2)
    <button class="btn-sm app-btn-primary" {{-- onclick="ShowModal('{{ $id }}', '{{ $student_id }}', '{{ $diagnosis }}', '{{ $prescrib_meds }}', '{{ $instruction }}')">Edit</button> --}}
        onclick="ShowModal('{{ $id }}', '{{ $student_id }}', '{{ $complaints }}', '{{ $diagnosis }}', '{{ $instruction }}' ,'{{ $medicines->pluck('med_name')->implode(',') }}', '{{ $equipments->pluck('equipname')->implode(',') }}')">Edit</button>
@elseif(Auth::user()->role == 'nurse' && $status == 0)
    <button class="btn-sm app-btn-primary"
        onclick="ShowModal('{{ $id }}', '{{ $student_id }}', '{{ $complaints }}', '{{ $diagnosis }}','{{ $remarks }}','{{ $instruction }}' ,'{{ $prescrib_meds }}', '{{ $prescrib_equips }}', '{{ $prescrib_med_quantity }}', '{{ $prescrib_equip_quantity }}')">
        edit</button>
@elseif(Auth::user()->role == 'doctor' && $status == 0)
    <button class="btn-sm app-btn-primary"
        onclick="ShowModal ('{{ $id }}', '{{ $student_id }}', '{{ $diagnosis }}', '{{ $prescrib_meds }}','{{ $instruction }}' )">
        edit</button>
@endif

@if (Auth::user()->role == 'nurse')
    <button class="btn-sm app-btn-danger"> <a data-confirm-delete="true"
            href="{{ route('deleteConsultation', ['id' => $id]) }}">Delete</a> </button>
@endif

@if (Auth::user()->role == 'doctor')
    @if ($status == 0)
        <button> <a class="btn-sm app-btn-secondary" href="{{ route('statusApprove', ['id' => $id]) }}">Aprrove</a>
        </button>
        <button><a class="btn-sm app-btn-secondary" href="{{ route('statusDisapprove', ['id' => $id]) }}">Reject</a>
        </button>
    @endif
@endif
