@extends('layout.base')

@section('title','Sub Categories')

@section('content')
<h1 class="text-center text-info my-5">Edit Sub Category</h1>
<div class="col-md-6 offset-md-3">
    <form action="{{route('sub.update',$category->id)}}" method="post" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="_method" value="PATCH">
        <x-input name="name" type="text" r="required" :value="$category->name"/>
        <p>Current Image =>
            <a href="{{url('/uploads/'.$category->image)}}">{{$category->image}}</a>
        </p>
        <x-input name="image" type="file"/>
        <button type="submit" class="btn btn-primary btn-sm float-end">Update</button>
    </form>
</div>
@stop
