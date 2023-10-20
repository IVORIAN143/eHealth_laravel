@extends('layout.master')

@section('content')

    <h1> Dashboard </h1>

    <div class="row g-4 mb-4">
        <div class="col-6 col-lg-3">
            <div class="app-card app-card-stat shadow-sm h-100">
                <div class="app-card-body p-3 p-lg-4">
                    <h4 class="stats-type mb-1">Student</h4>
                    <div id="studentsLabelCount" class="stats-figure"></div>
                    <div class="stats-meta text-success">
{{--                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-arrow-up" fill="currentColor" xmlns="http://www.w3.org/2000/svg">--}}
{{--                            <path fill-rule="evenodd" d="M8 15a.5.5 0 0 0 .5-.5V2.707l3.146 3.147a.5.5 0 0 0 .708-.708l-4-4a.5.5 0 0 0-.708 0l-4 4a.5.5 0 1 0 .708.708L7.5 2.707V14.5a.5.5 0 0 0 .5.5z"></path>--}}
{{--                        </svg> 20%--}}
                    </div>
                </div><!--//app-card-body-->
                <a class="app-card-link-mask" href="{{route('students')}}"></a>
            </div><!--//app-card-->
        </div><!--//col-->

        <div class="col-6 col-lg-3">
            <div class="app-card app-card-stat shadow-sm h-100">
                <div class="app-card-body p-3 p-lg-4">
                    <h4 class="stats-type mb-1">Equipment</h4>
                    <div class="stats-figure">{{ $equipment }}</div>
                    <div class="stats-meta text-success">
{{--                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-arrow-down" fill="currentColor" xmlns="http://www.w3.org/2000/svg">--}}
{{--                            <path fill-rule="evenodd" d="M8 1a.5.5 0 0 1 .5.5v11.793l3.146-3.147a.5.5 0 0 1 .708.708l-4 4a.5.5 0 0 1-.708 0l-4-4a.5.5 0 0 1 .708-.708L7.5 13.293V1.5A.5.5 0 0 1 8 1z"></path>--}}
{{--                        </svg> --}}
                    </div>
                </div><!--//app-card-body-->
                <a class="app-card-link-mask" href="{{route('inventory')}}"></a>
            </div><!--//app-card-->
        </div><!--//col-->
        <div class="col-6 col-lg-3">
            <div class="app-card app-card-stat shadow-sm h-100">
                <div class="app-card-body p-3 p-lg-4">
                    <h4 class="stats-type mb-1">Medicine</h4>
                    <div class="stats-figure">{{$medicine}}</div>
                    <div class="stats-meta text-success">
{{--                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-arrow-down" fill="currentColor" xmlns="http://www.w3.org/2000/svg">--}}
{{--                            <path fill-rule="evenodd" d="M8 1a.5.5 0 0 1 .5.5v11.793l3.146-3.147a.5.5 0 0 1 .708.708l-4 4a.5.5 0 0 1-.708 0l-4-4a.5.5 0 0 1 .708-.708L7.5 13.293V1.5A.5.5 0 0 1 8 1z"></path>--}}
{{--                        </svg> --}}
                    </div>
                </div><!--//app-card-body-->
                <a class="app-card-link-mask" href="{{route('inventory')}}"></a>
            </div><!--//app-card-->
        </div><!--//col-->
        <div class="col-6 col-lg-3">
            <div class="app-card app-card-stat shadow-sm h-100">
                <div class="app-card-body p-3 p-lg-4">
                    <h4 class="stats-type mb-1">Consultation</h4>
                    <div class="stats-figure"></div>

                </div><!--//app-card-body-->
                <a class="app-card-link-mask" href="{{route('consultation')}}"></a>
            </div><!--//app-card-->
        </div><!--//col-->
        @if(Auth::user()->role == 'nurse')
        <div class="col-6 col-lg-3">
            <div class="app-card app-card-stat shadow-sm h-100">
                <div class="app-card-body p-3 p-lg-4">
                    <h4 class="stats-type mb-1">User</h4>
                    <div class="stats-figure">{{$users}}</div>
                    <div class="stats-meta">
                        Open</div>
                </div><!--//app-card-body-->
                <a class="app-card-link-mask" href="{{route('user')}}"></a>
            </div><!--//app-card-->
        </div><!--//col-->
        @endif
    </div>
@stop

@push('js')
<script>
    $(function(){
        initialize()
        $("#semester").on("change",function(){
            initialize()
        });
        $('#schoolYear').on('change', function(){
            initialize()
        })

    });

    function initialize(){
        $.ajax({
            url: "{{route("home")}}",
            method: "get",
            data: {
                semester : $("#semester").val(),
                schoolyear: $('#schoolYear').val()
            },
            success:function(response){
                $('#studentsLabelCount').html(response.students);
                console.log(response.students)
            }
        })
    }
</script>

@endpush
