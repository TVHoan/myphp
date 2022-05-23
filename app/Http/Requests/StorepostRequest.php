<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorepostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return True;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => ['required', 'string'],
            'slug' => ['required', 'string'],
            'image' => ['mimes:jpeg,jpg,png,gif','max:10000','required'],
            'sumary' => ['required', 'string'],
            'content' => ['required', 'string'],
        ];
    }
    public function messages()
    {
        return [
            'title.required' => 'tiêu đề không được để trống',
            'slug.required' => 'A message is required',
        ];
    }
}
