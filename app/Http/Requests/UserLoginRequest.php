<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserLoginRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'phone'=>'required|digits_between:7,11',
            'password'=>'required|min:8'
        ];
    }
    public function messages(){
        return [
            'phone.required'=>'Phone နံပါတ် မထည့်လို့ မရဘူးလေ',
            'phone.digits_between'=>'Phone နံပါတ် အနည်းဆုံး ၇ လုံး အများဆုံး ၁၁ လုံး ထည့်ပါ။',
            'password.required'=>'Password မထည့်လို့ မရဘူးလေကွာ',
            'password.min'=>'Password အနည်းဆုံး ၈ လုံးထည့်ပါ'
        ];
    }
}
