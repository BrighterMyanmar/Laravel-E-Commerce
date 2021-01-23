@extends('layout.base')

@section('title','Sub Categories')

@section('content')
<h1 class="text-center text-info my-5">All Sub Categories</h1>
<div class="col-md-8 offset-md-2">
    <a href="{{route('cat.sub.create',$cat->id)}}" class="btn btn-primary btn-sm">Create <i class="material-icons">add</i></a>
    <table class="table table-bordered">
        <thead>
          <tr class="bg-dark text-white">
            <th scope="col">No</th>
            <th scope="col">Name</th>
            <th scope="col">Image</th>
            <th scope="col">Child</th>
            <th scope="col">Actions</th>
          </tr>
        </thead>
        <tbody>
          @foreach($cat->subcats as $cat)
          <tr>
            <td>{{$cat->id}}</td>
            <td>{{$cat->name}}</td>
            <td><img src="{{url('/uploads/'.$cat->image)}}" alt="" width=50 height=50></td>
            <td>
                <a href="{{route('cat.sub.index',$cat->id)}}" class="btn btn-info btn-sm"><i class="material-icons">visibility</i></a>
            </td>
            <td>
                <a href="{{route('sub.edit',$cat->id)}}" class="btn btn-warning btn-sm">
                    <i class="material-icons">edit</i>
                </a>
                <x-button :action="route('sub.destroy',$cat->id)" />
            </td>
          </tr>
          @endforeach

        </tbody>
      </table>
</div>
@stop
