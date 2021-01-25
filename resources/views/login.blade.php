@extends('layout.base')

@section('title','Admin Login')

@section('content')
    <h1 class="text-center text-info my-5">BM E-Commerce Admin Login</h1>

    <div class="col-md-6 offset-md-3">
        <form method="post" autocomplete="off">
            @csrf
            <x-input name="phone" type="number" r="required"/>
            <x-input name="password" type="password"/>

            <div class="row justify-content-between">
            <div class="col-md-6">
                <div class="col-md3 mb-3 form-check">
                    <input type="checkbox" class="form-check-input" id="rememberMe" name="rememberMe">
                    <label class="form-check-label" for="rememberMe">Remember Me</label>
                </div>
            </div>
            <div class="col-md-6">
                <button type="submit" class="btn btn-primary btn-sm float-end">Login</button>
            </div>
            </div>
        </form>
    </div>
@stop


@push('script')
    <script>
        let chk = localStorage.getItem('rememberMe');
        if(chk == 'true'){
            let phone = localStorage.getItem('phone');
            document.querySelector('#phone').value = phone;
            document.querySelector('#rememberMe').checked = chk == 'true';
        }

    </script>
@endpush
