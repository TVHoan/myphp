<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorecategoryRequest extends FormRequest
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
            'name' => ['required', 'string'],
            'slug' => ['required', 'string','unique:categories,slug'],
        ];
    }
    public function messages()
{
    return [
        'name.required' => 'Ten la truong bat buoc',
        'slug.unique' => 'slug khong duoc trung',
    ];
}
}
