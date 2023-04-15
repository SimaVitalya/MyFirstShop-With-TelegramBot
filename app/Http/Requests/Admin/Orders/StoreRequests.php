<?php

namespace App\Http\Requests\Admin\Orders;

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
            'code' => 'required|unique:products,code|max:255',
            'name' => 'required|max:255',
            'description' => 'required',
            'category_id' => 'required|integer',
            'image' => 'required|image',
            'price' => 'required|numeric|min:0',
            'new_price' => 'nullable|numeric|min:0',
        ];
    }

    public function messages()
    {
        return [
            'code.required' => 'Поле Код является обязательным для заполнения',
            'code.unique' => 'Продукт с таким Кодом уже существует',
            'code.max' => 'Код не может быть длиннее 255 символов',
            'name.required' => 'Поле Название является обязательным для заполнения',
            'name.max' => 'Название не может быть длиннее 255 символов',
            'description.required' => 'Поле Описание является обязательным для заполнения',
            'category_id.required' => 'Поле Категория является обязательным для заполнения',
            'category_id.integer' => 'Категория должна быть целым числом',
            'image.image' => 'Загруженный файл должен быть изображением',
            'image.required' => 'Загрузите изображение',
            'price.required' => 'Поле Цена является обязательным для заполнения',
            'price.numeric' => 'Цена должна быть числом',
            'price.min' => 'Цена не может быть отрицательной',
            'new_price.numeric' => 'Новая цена должна быть числом',
            'new_price.min' => 'Новая цена не может быть отрицательной',
        ];
    }
}
