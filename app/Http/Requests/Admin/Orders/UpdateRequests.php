<?php

namespace App\Http\Requests\Admin\Orders;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequests extends FormRequest
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
            'product_count'=>'|numeric',

        ];
    }

    public function messages()
    {
        return [
            'product_count.required' => 'Поле  является обязательным для заполнения',
            'product_count.numeric' => 'Поле должно именит цифру в формате(1-10)',
            'status.required' => 'Поле Статус является обязательным для заполнения',
        ];
    }
}
