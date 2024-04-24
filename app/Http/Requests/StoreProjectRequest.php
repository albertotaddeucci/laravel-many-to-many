<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProjectRequest extends FormRequest
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
        return [
            'title' => 'required|max:100',
            'description' => 'nullable|max:500',
            'img' => 'file|nullable|max:1024|mimes:jpg,png',
            // 'tech' => 'required|max:100',
            'github_url' => 'nullable|max:300',
            'devices' => 'nullable|max:100',
            'type_id' => 'nullable|exists:types,id'
        ];
    }

    public function messages(): array
    {
        return [
            'title.required' => "Devi inserire un titolo",
            'title.max' => 'Deve avere un massimo di :max caratteri',

            'description.max' => 'Deve avere un massimo di :max caratteri',

            'img.max' => 'Deve essere di 1024KB o inferiore',
            'img.mimes' => 'Deve un file di tipo .png o .jpg',

            // 'tech.required' => 'Devi inserire le tecnologie utilizzate',
            // 'tech.max' => 'Deve avere un massimo di :max caratteri',

            'github_url.max' => 'Deve avere un massimo di :max caratteri',

            'devices.max' => 'Deve avere un massimo di :max caratteri',



        ];
    }
}
