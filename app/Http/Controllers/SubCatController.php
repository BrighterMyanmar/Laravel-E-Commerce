<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryCreateRequest;
use App\Models\Category;
use App\Models\SubCat;
use Illuminate\Http\Request;

class SubCatController extends Controller
{
    public function index($id)
    {
        $cat = Category::find($id)->load(['subcats']);
        return view('subcat.index', compact('cat'));
    }
    public function create($id)
    {
        $cat = Category::find($id);
        return view('subcat.create', compact('cat'));
    }


    public function store(CategoryCreateRequest $request, $id)
    {
        $file = $request->file('image');
        $imageName = uniqid() . "_" . $file->getClientOriginalName();
        $file->move(public_path() . '/uploads', $imageName);

        $cat = new SubCat();
        $cat->name = $request->input('name');
        $cat->category_id = $id;
        $cat->image = $imageName;

        if ($cat->save()) {
            return redirect()->route('cat.sub.index', $id);
        } else {
            return redirect()->back('error', 'Sub Category Insert Error');
        }
    }

    public function show(SubCat $subCat)
    {
    }

    public function edit(SubCat $subCat, $id)
    {
        $category = SubCat::find($id);
        return view('subcat.edit', compact('category'));
    }

    public function update(Request $request, SubCat $subCat, $id)
    {
        $validate = $request->validate([
            'name' => 'required'
        ]);

        if ($validate) {
            $category = SubCat::find($id);
            $category->name = $request->input('name');

            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $imageName = uniqid() . "_" . $file->getClientOriginalName();
                $file->move(public_path() . '/uploads', $imageName);
                $category->image = $imageName;
            }

            if ($category->update()) {
                return redirect()->route('cat.sub.index', $category->category_id);
            } else {
                return redirect()->back('error', 'Update Error');
            }
        }
    }

    public function destroy(SubCat $subCat,$id)
    {
       $cat = SubCat::find($id);
       $cat->delete();
       return redirect()->route('cat.sub.index',$cat->category_id);
    }
}
