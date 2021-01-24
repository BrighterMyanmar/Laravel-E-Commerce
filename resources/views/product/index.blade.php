@extends('layout.base')

@section('title','All Products')

@section('content')
    <h1 class="text-center text-info my-5">All Products</h1>
    <a href="{{route('products.create')}}" class="btn btn-primary btn-sm">Create <i class="material-icons">add</i></a>

        <table class="table table-bordered">
            <thead>
                <tr class="bg-dark text-white">
                    <th>No.</th>
                    <th>Name</th>
                    <th>Image</th>
                    <th>Colors</th>
                    <th>Sizes</th>
                    <th>Price</th>
                    <th>Description</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($products as $product)
                <tr>
                    <td>{{$product->id}}</td>
                    <td>{{$product->name}}</td>
                    <td>
                        @php $images = explode(',',$product->images);  @endphp
                        @foreach($images as $image)
                        <img src="{{url('/uploads/'.$image)}}" alt="" with=50 height=50>
                        @endforeach
                    </td>
                    <td>{{$product->colors}}</td>
                    <td>{{$product->sizes}}</td>
                    <td>{{$product->price}}</td>
                    <td>@php echo Str::substr($product->description, 0, 10) @endphp</td>
                    <td>
                        <a href="{{route('products.edit',$product->id)}}" class="btn btn-warning btn-sm"><i class="material-icons">edit</i></a>
                        <x-button :action="route('products.destroy',$product->id)" />
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
@stop
