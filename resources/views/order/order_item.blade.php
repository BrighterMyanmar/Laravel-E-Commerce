@extends('layout.base')

@section('title','Order Items')

@section('content')
    <h1 class="text-center text-in my-5">All Order Items</h1>
    <div class="col-md-10 offset-md-1">
        <table class="table table-bordered">
            <thead>
                <tr class="bg-dark text-white">
                    <th>No.</th>
                    <th>Name</th>
                    <th>Image</th>
                    <th>Price</th>
                    <th>Count</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
            @foreach($orderitems as $item)
                <tr>
                    <td>{{$item->id}}</td>
                    <td>{{$item->name}}</td>
                    <td>
                        @php $images = explode(',',$item->images);  @endphp
                        @foreach($images as $image)
                        <img src="{{url('/uploads/'.$image)}}" alt="" with=50 height=50>
                        @endforeach
                    </td>
                    <td>{{$item->price}}</td>
                    <td>{{$item->count}}</td>
                    <td>{{$item->price * $item->count}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@stop
