@extends('layout.base')

@section('title','Sub Categories')

@section('content')
<h1 class="text-center text-info my-5">Sub Create Category</h1>
<div class="col-md-6 offset-md-3">
    <form action="{{route('cat.sub.store',$cat->id)}}" method="post" enctype="multipart/form-data">
        @csrf
        <x-input name="name" type="text" r="required"/>
        <x-input name="image" type="file" r="required"/>
        <button type="submit" class="btn btn-primary btn-sm float-end">Create</button>
    </form>
</div>
@stop
