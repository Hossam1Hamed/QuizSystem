<?php

namespace App\Http\Requests\Web\Category;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCategoryRequest extends FormRequest
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

    public function rules()
    {
        return [
            'name' => ['string', 'required', 'unique:categories,name'],
        ];
    }

    public function messages()
    {
        return [
            'name.string' => trans('name most be string'),
            'name.required' => trans('name field is required'),
            'name.unique' => trans('this name aleardy taken'),
        ];
    }
}
