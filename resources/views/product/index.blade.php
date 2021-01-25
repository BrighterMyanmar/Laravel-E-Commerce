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
                        <img src="{{url('/uploads/'.$image)}}" alt="" with=50 height=50
                        @php $mg = url('/uploads/'.$image) @endphp
                        onclick="showLightBox('{{$mg}}')"
                        >
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

        <div class="modal" tabindex="-1" id="lightBox">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">Modal title</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <img src="" alt="" id="lightImage">
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                  <button type="button" class="btn btn-primary">Save changes</button>
                </div>
              </div>
            </div>
          </div>
@stop


@push('script')
    <script>
        let showLightBox = (image) => {
            let lightImage = document.querySelector("#lightImage");
            lightImage.src = image;
            let myModel = new bootstrap.Modal(document.querySelector('#lightBox'), {keyboard: false});
            myModel.show();
        }
    </script>
@endpush
