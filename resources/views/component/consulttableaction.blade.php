@if (Auth::user()->role == 'nurse' && $status == 2)
    <button class="btn-sm app-btn-primary"
        onclick="ShowModal('{{ $id }}', '{{ $student_id }}',{{ $caseStatus }}, '{{ $complaints }}', '{{ $diagnosis }}','{{ $remarks }}','{{ $instruction }}' ,'{{ $prescrib_meds }}', '{{ $prescrib_equips }}', '{{ $prescrib_med_quantity }}', '{{ $prescrib_equip_quantity }}')">
        edit</button>
@elseif(Auth::user()->role == 'nurse' && $status == 0)
    <button class="btn-sm app-btn-primary"
        onclick="ShowModal('{{ $id }}', '{{ $student_id }}', {{ $caseStatus }}, '{{ $complaints }}', '{{ $diagnosis }}','{{ $remarks }}','{{ $instruction }}' ,'{{ $prescrib_meds }}', '{{ $prescrib_equips }}', '{{ $prescrib_med_quantity }}', '{{ $prescrib_equip_quantity }}')">
        edit</button>
@elseif(Auth::user()->role == 'doctor' && $status == 0)
    <button class="btn-sm app-btn-primary"
        onclick="ShowModal('{{ $id }}', '{{ $student_id }}', {{ $caseStatus }}, '{{ $complaints }}', '{{ $diagnosis }}','{{ $remarks }}','{{ $instruction }}' ,'{{ $prescrib_meds }}', '{{ $prescrib_equips }}', '{{ $prescrib_med_quantity }}', '{{ $prescrib_equip_quantity }}')">
        edit</button>
@endif

@if (Auth::user()->role == 'nurse')
    <button class="btn-sm app-btn-danger"> <a data-confirm-delete="true"
            href="{{ route('deleteConsultation', ['id' => $id]) }}">Delete</a> </button>
@endif

@if (Auth::user()->role == 'doctor')
    @if ($status == 0)
        <a class="btn-sm app-btn-success" href="{{ route('statusApprove', ['id' => $id]) }}">Aprrove</a>
        <a class="btn-sm app-btn-danger" href="{{ route('statusDisapprove', ['id' => $id]) }}">Reject</a>
    @endif
@endif
