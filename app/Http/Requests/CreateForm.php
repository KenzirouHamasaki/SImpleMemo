<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CreateForm extends FormRequest
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
            'name' => 'required|string|max:20',
            'name2' => 'required|string|max:40',
            'category' => 'required|array',
            'category.*' => Rule::in(['category1', 'category2', 'category3']),
            'review' => 'required|integer',
            'comment' => 'required|string|max:300',
            'callNumber' => 'required|string|max:16',
        ];
    }
}
