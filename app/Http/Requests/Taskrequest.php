<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Taskrequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
   
    public function rules(): array
    {
        $isUpdate = in_array($this->method(), ['PUT', 'PATCH']);

        return [
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'status' => 'boolean',


            'data' => 'required|date',
        ];
    }
}
