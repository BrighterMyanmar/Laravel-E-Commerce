@extends('layout.base')

@section('title','Orders')

@section('content')
    <h1 class="text-center text-in my-5">All Orders</h1>
    <div class="col-md-8 offset-md-2">
        <table class="table table-bordered">
            <thead>
                <tr class="bg-dark text-white">
                    <th>No.</th>
                    <th>Name</th>
                    <th>Count</th>
                    <th>Total</th>
                    <th>Items</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
            @foreach($orders as $order)
                <tr>
                    <td>{{$order->id}}</td>
                    <td>{{Auth::user()->name}}</td>
                    <td>{{$order->count}}</td>
                    <td>{{$order->total}}</td>
                    <td>
                        <a href="{{route('orderitem-byid',$order->id)}}" class="btn btn-info btn-sm"><i class="material-icons">visibility</i></a>
                    </td>
                    <td>
                        <form action="{{route('order-status-change',$order->id)}}" method="post">
                            @csrf
                            <input type="hidden" name="_method" value="PATCH">
                            <button class="btn @if($order->status) btn-success @else btn-danger @endif btn-sm">change</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@stop
