<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StudentCreateRequest extends FormRequest
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
             'nis' => 'unique:students|max:8',
            'name' => 'max:50'
        ];
    }

    // public function attributes(){
    //     return[
    //         'class_id' => 'class',     // cara mengganti nama class field pada notif validate yang berbeda 
    //     ]
    // }

    public function messages(){
        return[
            'name.max' => 'Nama maksimal 50 karakter',
            'nis.max' => 'NIS maksimal :max karakter'
        ];
    }
}
