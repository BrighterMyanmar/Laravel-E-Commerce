<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductCreateRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            "category_id" => 'required',
            "subcat_id" => 'required',
            "tag_id" => 'required',
            "name" => 'required|unique:products',
            "price" => 'required',
            "images" => 'required',
            "colors" => 'required',
            "sizes" => 'required',
            "description" => 'required'
        ];
    }
}
