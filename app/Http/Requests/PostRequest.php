<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
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
    public function rules()
    {
        return [
            'user_id' => 'required|exists:users,id',
            'titre' => 'required|max:255',
            'description' => 'required',
            'contenue' => 'required',
            'image' => 'sometimes|file|max:2048',
            'link' => 'nullable|max:255'
        ];
    }
}
