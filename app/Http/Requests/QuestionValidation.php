<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class QuestionValidation extends FormRequest
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
            'question'=>'required',
            'opt1'=>'required|max:200',
            'opt2'=>'required|max:200',
            'opt3'=>'required|max:200',
            'opt4'=>'required|max:200',
            'ans'=>'required',
            'cat_id'=>'required'
        ];
    }

    public function messages()
    {
        return[
            'question.required'=>'Write question',
            'opt1.required'=>'Option is required',
            'opt2.required'=>'Option is required',
            'opt3.required'=>'Option is required',
            'opt4.required'=>'Option is required',
            'ans.required'=>'Answer is required'
        ];  
    }
}
