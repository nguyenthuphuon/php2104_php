<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\ProductName;
use App\Rules\ProductTitle;

class StoreProductRequest extends FormRequest
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
            'name' => ['required', 'regex:/^[a-zA-Z0-9\s]+$/i'],
            'title' => 'required',
            'image' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'The :attribute cannot be blank.',
            'name.regex' => 'The :attribute cannot contain special characters.',
            'title.required' => 'The :attribute cannot be blank.',
            'image.required' => 'The :attribute cannot be blank.',
        ];
    }
}
