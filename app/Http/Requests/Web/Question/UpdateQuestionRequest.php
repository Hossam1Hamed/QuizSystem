<?php

namespace App\Http\Requests\Web\Question;

use Illuminate\Foundation\Http\FormRequest;

class UpdateQuestionRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'category_id'      => ['required'],
            'question_text'    => ['string', 'required'],
        ];
    }

    public function messages()
    {
        return [
            'category_id.required' => trans('category field is required'),
            'question_text.string' => trans('question most be string'),
            'question_text.required' => trans('question field is required'),
        ];
    }
}
