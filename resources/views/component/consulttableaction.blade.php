@if (Auth::user()->role == 'nurse' && $status == 2)
    <button class="btn-sm app-btn-secondary" {{-- onclick="ShowModal('{{ $id }}', '{{ $student_id }}', '{{ $diagnosis }}', '{{ $prescrib_meds }}', '{{ $instruction }}')">Edit</button> --}} <button
        onclick="ShowModal('{{ $consultation->id }}', '{{ $consultation->student_id }}', '{{ $consultation->complaints }}', '{{ $consultation->diagnosis }}', '{{ $consultation->medicines->pluck('med_name')->implode(',') }}', '{{ $consultation->equipments->pluck('equipname')->implode(',') }}', '{{ $consultation->instruction }}', '{{ $consultation->remarks }}')">Edit</button>
@elseif(Auth::user()->role == 'nurse' && $status == 0)
    <button class="btn-sm app-btn-secondary"
        onclick="ShowModal ('{{ $id }}', '{{ $student_id }}', '{{ $diagnosis }}', '{{ $prescrib_meds }}','{{ $instruction }}' )">
        edit</button>
@elseif(Auth::user()->role == 'doctor' && $status == 0)
    <button class="btn-sm app-btn-secondary"
        onclick="ShowModal ('{{ $id }}', '{{ $student_id }}', '{{ $diagnosis }}', '{{ $prescrib_meds }}','{{ $instruction }}' )">
        edit</button>
@endif

@if (Auth::user()->role == 'nurse')
    <a class="btn-sm app-btn-secondary" data-confirm-delete="true"
        href="{{ route('deleteConsultation', ['id' => $id]) }}">Delete</a>
@endif

@if (Auth::user()->role == 'doctor')
    @if ($status == 0)
        <a class="btn-sm app-btn-secondary" href="{{ route('statusApprove', ['id' => $id]) }}">Aprrove</a>
        <a class="btn-sm app-btn-secondary" href="{{ route('statusDisapprove', ['id' => $id]) }}">Reject</a>
    @endif
@endif
