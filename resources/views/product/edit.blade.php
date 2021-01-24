@extends('layout.base')

@section('title','Create Products')

@section('content')
    <h1 class="text-center text-info my-2">Create Products</h1>
    <div class="col-md-8 offset-md-2">
        <form action="{{route('products.update',$product->id)}}" method="post" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="_method" value="PATCH">
            <div class="row">
                <div class="col-md-6 mb-3">
                    <x-input name="name" type="text" :value="$product->name"/>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="category_id" class="form-label">Category</label>
                    <select class="form-select rounded-0" name="category_id" id="category_id"
                    onchange="catChange(event)">
                        @foreach($cats as $cat)
                            <option value="{{$cat->id}}" @if($cat->id == $product->category_id) selected @endif>{{$cat->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="subcat_id" class="form-label">Sub Category</label>
                    <select class="form-select rounded-0" name="subcat_id" id="subcat_id">
                    </select>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="tag_id" class="form-label">Tag</label>
                    <select class="form-select rounded-0" name="tag_id" id="tag_id"
                    onchange="catChange(event)">
                        @foreach($tags as $tag)
                            <option value="{{$tag->id}}" @if($tag->id == $product->tag_id) selected @endif>{{$tag->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-6 mb-3">
                    <x-input name="price" type="number"  :value="$product->price"/>
                </div>
                <div class="col-md-6 mb-3">
                    <x-input name="colors" type="text"
                     cn="Colors (ကော်မာ ခံထည့်ပါ)"  :value="$product->colors"/>
                </div>
                <div class="col-md-6 mb-3">
                    <x-input name="sizes" type="text"
                    cn="Sizes (ကော်မာ ခံထည့်ပါ)"  :value="$product->sizes"/>
                </div>
                <div class="col-md-6 mb-3">
                    <x-input name="images[]" type="file" m='multiple'/>
                </div>
                <div class="col-md-12 mb-3">
                    <x-textarea name="description" type="text"  :value="$product->description"/>
                </div>
            </div>
            <button type="submit" class="btn btn-primary btn-sm float-end">Update</button>
        </form>
    </div>
@stop

@push('script')
    <script>

        let cats = "{{$cats}}";
        cats = cats.replace(/&quot;/g,"\"");
        cats = JSON.parse(cats);

        let subcats = "{{$subcats}}";
        subcats = subcats.replace(/&quot;/g,"\"");
        subcats = JSON.parse(subcats);

        let catChange = (e) => {
            let catId = e.target.value;
            filterSub(catId);
        }
        let filterSub  = (id) =>{
            let subs = subcats.filter((s)=> s.category_id == id);
            let str = "";

            for(let sub of subs){
                str += ` <option value="${sub.id}">${sub.name}</option>`;
            }
            document.querySelector('#subcat_id').innerHTML = str;
        }
        let selectedCatId = "{{$product->category_id}}";
        filterSub(selectedCatId);


    </script>
@endpush
