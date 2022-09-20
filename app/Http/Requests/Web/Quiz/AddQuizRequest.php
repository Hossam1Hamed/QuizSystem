<?php

namespace App\Http\Requests\Web\Quiz;

use Illuminate\Foundation\Http\FormRequest;

class AddQuizRequest extends FormRequest
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
            'name'             => ['string', 'required', 'unique:quizzes,name'],
            'numberOfQuestions' => ['numeric','min:1', 'required'],
        ];
    }
    public function messages()
    {
        return [
            'name.string' => trans('name most be string'),
            'name.required' => trans('name field is required'),
            'name.unique' => trans('this name aleardy taken'),
            'numberOfQuestions.numeric' => trans('this field must be number'),
            'numberOfQuestions.min:1' =>trans('this field must be bigger than 1 '),
            'numberOfQuestions.required' => trans('this field is required'),
        ];
    }
}
