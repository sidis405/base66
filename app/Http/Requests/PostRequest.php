<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
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
            'title' => 'required|min:4|max:191',
            'preview' => 'required',
            'body' => 'required',
            'category_id' => 'required|exists:categories,id',
            'cover' => 'sometimes|image|mimes:jpeg,bmp,png',
        ];
    }
}
