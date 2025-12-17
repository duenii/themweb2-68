<?php

namespace App\Http\Requests\Auth\Post;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Dimensions;

class CreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'title' => ['required','min:3', 'max:255', 'string'],
            'category' => ['required'],
            'file' => ['required','image', 'mimes:jpeg,png,jpg,gif,svg'],
            'publish' => ['required'],

        ];
    }
}
