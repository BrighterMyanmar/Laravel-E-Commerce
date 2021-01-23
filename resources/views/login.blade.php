@extends('layout.base')

@section('title','Admin Login')

@section('content')
    <h1 class="text-center text-info my-5">BM E-Commerce Admin Login</h1>

    <div class="col-md-6 offset-md-3">
        <form method="post">
            @csrf
            <x-input name="phone" type="number" value="09400400400" r="required"/>
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
