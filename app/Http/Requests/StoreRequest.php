<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
            'name' => 'required|string|max:255|min:2',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Введите имя',
            'name.max' => 'Имя не должно превышать 255 символов',
            'email.required' => 'Введите email',
            'email.email' => 'Некорректный email',
            'email.max' => 'Email не должен превышать 255 символов',
            'phone.required' => 'Введите номер телефона',
            'phone.max' => 'Номер телефона не должен превышать 20 символов',
        ];
    }
}
