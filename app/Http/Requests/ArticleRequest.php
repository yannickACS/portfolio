<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArticleRequest extends FormRequest
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
            'name' => 'bail|required|max:255|unique:articles,name', 
            'page' => 'bail|required',
            'slug' => 'bail|required|max:255|unique:articles,slug',
            'title' => 'bail|required|max:255|unique:articles,title',
            'subtitle' => 'bail|required|max:255|unique:articles,subtitle',
            'content' => 'bail|required|max:32000|unique:articles,content'
        ];
    }
}
