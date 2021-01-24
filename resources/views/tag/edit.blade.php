@extends('layout.base')

@section('title','All Categories')

@section('content')
    <h1 class="text-center text-info my-5">Edit Tag</h1>
    <div class="col-md-6 offset-md-3">
        <form action="{{route('tags.update',$tag->id)}}" method="post" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="_method" value="PATCH">
            <x-input name="name" type="text" r="required" :value="$tag->name"/>
            <p>Current Image =>
                <a href="{{url('/uploads/'.$tag->image)}}">{{$tag->image}}</a>
            </p>
            <x-input name="image" type="file"/>
            <button type="submit" class="btn btn-primary btn-sm float-end">Update</button>
        </form>
    </div>
@stop
