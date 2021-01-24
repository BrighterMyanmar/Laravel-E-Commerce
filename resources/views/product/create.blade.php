@extends('layout.base')

@section('title','Create Products')

@section('content')
    <h1 class="text-center text-info my-2">Create Products</h1>
    <div class="col-md-8 offset-md-2">
        <form action="{{route('products.store')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-6 mb-3">
                    <x-input name="name" type="text"/>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="category_id" class="form-label">Category</label>
                    <select class="form-select rounded-0" name="category_id" id="category_id"
                    onchange="catChange(event)">
                        @foreach($cats as $cat)
                            <option value="{{$cat->id}}">{{$cat->name}}</option>
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
                            <option value="{{$tag->id}}">{{$tag->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-6 mb-3">
                    <x-input name="price" type="number"/>
                </div>
                <div class="col-md-6 mb-3">
                    <x-input name="colors" type="text" cn="Colors (ကော်မာ ခံထည့်ပါ)"/>
                </div>
                <div class="col-md-6 mb-3">
                    <x-input name="sizes" type="text" cn="Sizes (ကော်မာ ခံထည့်ပါ)"/>
                </div>
                <div class="col-md-6 mb-3">
                    <x-input name="images[]" type="file" m='multiple'/>
                </div>
                <div class="col-md-12 mb-3">
                    <x-textarea name="description" type="text"/>
                </div>
            </div>
            <button type="submit" class="btn btn-primary btn-sm float-end">Create</button>
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

        filterSub(cats[0].id);


    </script>
@endpush
