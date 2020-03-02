<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreShop_loginPost extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'l_name'=>'required|unique:shop_login|max:12',
            'l_password'=>'required'
        ];
    }
    public function messages(){
        return [
            'l_name.required'=>'用户名不能为空',
            'l_name.unique'=>'用户名已存在',
            'l_name.max'=>'用户名最大是12位',
            'l_password.required'=>'密码必填'
        ];
    }
}
