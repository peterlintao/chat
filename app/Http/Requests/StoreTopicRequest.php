<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTopicRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'title' => 'required|max:200',
            'content' => 'required|max:2000',
            'category_id' => 'required|exists:categories,id',
        ];
    }
    public function attributes(){
        return [
            'title' => '帖子标题',
            'content' => '帖子内容',
            'category' => '帖子分类',
        ];
    }
}
