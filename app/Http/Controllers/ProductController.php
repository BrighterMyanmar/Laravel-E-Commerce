<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductCreateRequest;
use App\Models\Category;
use App\Models\Product;
use App\Models\SubCat;
use App\Models\Tag;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function index()
    {
        $products = Product::all();
        return view('product.index', compact('products'));
    }

    public function create()
    {
        $cats = Category::all();
        $subcats = SubCat::all();
        $tags = Tag::all();
        return view('product.create', compact('cats', 'subcats', 'tags'));
    }

    public function store(ProductCreateRequest $request)
    {
        $files = $request->file('images');
        $images = "";

        foreach ($files as $file) {
            $imageName = uniqid() . "_" . $file->getClientOriginalName();
            $images .=  $imageName . ",";
            $file->move(public_path() . '/uploads/', $imageName);
        }

        $product = new Product();
        $product->category_id = $request->input('category_id');
        $product->subcat_id = $request->input('subcat_id');
        $product->tag_id = $request->input('tag_id');
        $product->name = $request->input('name');
        $product->price = $request->input('price');
        $product->colors = $request->input('colors');
        $product->sizes = $request->input('sizes');
        $product->description = $request->input('description');
        $product->images = $images;

        $product->save();
        return redirect()->route('products.index');
    }

    public function show(Product $product)
    {
        //
    }

    public function edit($id)
    {
        $cats = Category::all();
        $subcats = SubCat::all();
        $tags = Tag::all();
        $product = Product::find($id);
        return view('product.edit', compact('product', 'cats', 'subcats', 'tags'));
    }


    public function update(Request $request, $id)
    {
        $validate = $request->validate([
                "category_id" => 'required',
                "subcat_id" => 'required',
                "tag_id" => 'required',
                "name" => 'required',
                "price" => 'required',
                "colors" => 'required',
                "sizes" => 'required',
                "description" => 'required'
        ]);

        if($validate){
            $product = Product::find($id);

            if($request->hasFile('images')){
                $files = $request->file('images');
                $images = "";

                foreach ($files as $file) {
                    $imageName = uniqid() . "_" . $file->getClientOriginalName();
                    $images .=  $imageName . ",";
                    $file->move(public_path() . '/uploads/', $imageName);
                }
                $product->images = $images;
            }
            $product->category_id = $request->input('category_id');
            $product->subcat_id = $request->input('subcat_id');
            $product->tag_id = $request->input('tag_id');
            $product->name = $request->input('name');
            $product->price = $request->input('price');
            $product->colors = $request->input('colors');
            $product->sizes = $request->input('sizes');
            $product->description = $request->input('description');

            $product->update();

            return redirect()->route('products.index');
        }else{
            return redirect()->back()->with('error',"Validation Error!");
        }
    }

    public function destroy($id)
    {
        $product = Product::find($id);
        $product->delete();
        return redirect()->route('products.index');
    }
}
