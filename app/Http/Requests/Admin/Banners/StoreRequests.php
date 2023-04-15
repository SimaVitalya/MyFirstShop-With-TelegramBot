<?php

namespace App\Http\Requests\Admin\Banners;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequests extends FormRequest
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

            'title' => 'required',
            'description' => 'required',
            'image' => 'required|image',

        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Поле Название является обязательным для заполнения',
            'description.required' => 'Поле Описание является обязательным для заполнения',
            'image.image' => 'Загруженный файл должен быть изображением',
            'image.required' => 'Загрузите изображение',

        ];
    }
}
