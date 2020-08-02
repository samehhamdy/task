@if(count($errors) > 0)
    <div class="alert alert-danger">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <strong>Error</strong>
        @foreach($errors->all() as $error)
            <li>{{$error}}</li>
            @endforeach
    </div>
    @endif

@if(session('msg'))
    <script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
    <script  type="text/javascript">
        $(document).ready(function () {
            Swal.fire(
                'Good job!',
                '{{session("msg")}}',
                'success'
            )
        });
    </script>
    @endif
@if(session('error'))
    <div class="alert alert-danger">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        {{session('error')}}
    </div>
@endif

@if(session('msgw'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{session('msgw')}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif
