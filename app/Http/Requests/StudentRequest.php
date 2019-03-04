<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StudentRequest extends FormRequest
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
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'surname' =>['required','string', 'max:255'],
            'phone' => ['required', 'max:30'],
            'address' => ['required','max:255'],
            'date_of_birth' => ['required'],

        ];
    }

    public function messages()
    {
        return [
            'required' => 'Поле :attribute обязательное к заполнению!',
            'max' => 'Максисально допустимое количество символов для поля :attribute - :max',
            'min' => 'Поле :attribute должно быть не короче 6 символов',
            'string' => 'Поле :attribute должно состоять из букв и символов',
        ];
    }
}
