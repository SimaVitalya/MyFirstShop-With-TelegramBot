<?php

namespace App\Http\Requests\Admin\Categories;

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
            'code' => 'required|unique:categories,code,',
            'name' => 'required|unique:categories,name,',
            'description' => 'required',
            'image' => 'required|image',
        ];
    }

    public function messages()
    {
        return [
            'code.required' => 'Поле Код является обязательным для заполнения',
            'code.unique' => 'Категория с таким Кодом уже существует',
            'name.required' => 'Поле Название является обязательным для заполнения',
            'name.unique' => 'Категория с таким Названием уже существует',
            'description.required' => 'Поле Описание является обязательным для заполнения',
            'image.image' => 'Загруженный файл должен быть изображением',
            'image.required' => 'Необходимо загрузить картинку',
        ];
    }
}
