<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryCreateRequest;
use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{

    public function index()
    {
        $tags = Tag::all();
        return view('tag.index', compact('tags'));
    }

    public function create()
    {
        return view('tag.create');
    }

    public function store(CategoryCreateRequest $request)
    {
        $file = $request->file('image');
        $imageName = uniqid() . "_" . $file->getClientOriginalName();
        $file->move(public_path() . '/uploads', $imageName);

        $cat = new Tag();
        $cat->name = $request->input('name');
        $cat->image = $imageName;

        if ($cat->save()) {
            return redirect()->route('tags.index');
        } else {
            return redirect()->back('error', 'Tag Insert Error');
        }
    }

    public function show(Tag $tag)
    {
        //
    }

    public function edit($id)
    {
        $tag = Tag::find($id);
        return view('tag.edit', compact('tag'));
    }

    public function update(Request $request, $id)
    {
        $validate = $request->validate([
            'name' => 'required'
        ]);

        if ($validate) {
            $category = Tag::find($id);
            $category->name = $request->input('name');

            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $imageName = uniqid() . "_" . $file->getClientOriginalName();
                $file->move(public_path() . '/uploads', $imageName);
                $category->image = $imageName;
            }

            if ($category->update()) {
                return redirect()->route('tags.index');
            } else {
                return redirect()->back('error', 'Update Error');
            }
        }
    }


    public function destroy($id)
    {
        $category = Tag::find($id);
        $category->delete();
        return redirect()->route('tags.index');
    }
}
