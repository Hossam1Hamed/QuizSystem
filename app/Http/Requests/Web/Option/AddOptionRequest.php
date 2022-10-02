<?php

namespace App\Http\Requests\Web\Option;

use Illuminate\Foundation\Http\FormRequest;

class AddOptionRequest extends FormRequest
{
    
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'question_id'   => ['required'],
            'option_text'   => ['required','string'],
            'points'        => ['required' , 'numeric'],
        ];
    }
    public function messages()
    {
        return [
            'question_id.required' => trans('Question field is required'),
            'option_text.required' => trans('Option Text field is required'),
            'option_text.string' => trans('Option Text most be string'),
            'points.required' => trans('Points field is required'),
            'points.numeric' => trans('this field must be number'),
        ];
    }
}
