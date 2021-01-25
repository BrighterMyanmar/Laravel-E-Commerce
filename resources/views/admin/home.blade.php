@extends('layout.base')

@section('title','Admin Home Page')

@section('content')

    @if(Session::has('info'))
        @if(Session::get('info') === 'on')
            @php $phone = Auth::user()->phone; @endphp
            <script>
                let phone = "{{$phone}}";
                localStorage.setItem('rememberMe',true);
                localStorage.setItem('phone',phone);
            </script>
        @else
            <script>
                localStorage.setItem('rememberMe',false);
                localStorage.removeItem('phone');
            </script>
        @endif
    @endif

    <h1>Admin Home Page</h1>
@stop
