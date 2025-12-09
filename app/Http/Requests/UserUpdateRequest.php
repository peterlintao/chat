<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class UserUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => ['required', 'string', 'max:100','min:2','regex:/^[\x{4e00}-\x{9fa5}A-Za-z0-9\-\_]+$/u', Rule::unique('users')->ignore(Auth::user()->id)],
            'email' => ['required', 'email', Rule::unique('users')->ignore(Auth::user()->id),],
            'introduction' => ['nullable', 'string', 'max:200','min:2'],
        ];
    }

//    public function messages(){
//        return [
//            'name.required' => '用户名不能为空',
//            'name.min' => '用户名字数不能少于2',
//            'name.max' => '用户名字数不能多于100',
//            'name.regex' => '用户名格式错误',
//            'name.not_regex' => '用户名格式不正确',
//            'introduction.min' => '个人简介字数要在2-200之间',
//            'introduction.max' => '个人简介字数不能多于200',
//        ];
//    }

    public function attributes(){
        return [
            'name'=> '用户名',
            'introduction' => '用户简介',
            'email'=>'电子邮件',
        ];
    }
}
