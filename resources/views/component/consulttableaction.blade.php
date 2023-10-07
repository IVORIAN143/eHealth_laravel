<button class="btn-sm app-btn-secondary"  onclick="ShowModal ('{{$id}}', '{{$student_id}}', '{{$diagnosis}}', '{{$prescrib_meds}}','{{$instruction}}' )"> edit</button>
@if(Auth::user()->role == 'nurse')
<a class="btn-sm app-btn-danger" data-confirm-delete="true" href="{{route('deleteConsultation', ['id'=> $id])}}">Delete</a>
@endif
