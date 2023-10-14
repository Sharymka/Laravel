<?php

namespace App\Http\Requests\Admin\Resources;

use Illuminate\Foundation\Http\FormRequest;

class Create extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'url' => 'required|url|max:255|active_url'
        ];
    }

    public function messages(): array
    {
        return [
            'url.required' => ' поле адрес источника новостей обязательно для заполнения.',
            'url.max' => 'поле адрес источника новостей не должно превышать 255 символов.',
            'url.active_url' => 'Введите действительный адрес источника новостей.'
        ];
    }

    public function attributes(): array
    {
        return [
            'url' => 'адрес источника новостей',
        ];
    }
}
