<?php

namespace App\Http\Requests\Admin\Users;

use App\Http\Enums\news\Status;
use App\Models\Category;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Enum;

class Edit extends FormRequest
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
        return[
            'name' => ['required', 'string', 'min:3', 'max:150'],
            'email' => ['required', 'min:2', 'max:100'],
            'is_admin' => 'required|integer|in:0, 1'
        ];
    }

    public function attributes(): array
    {
        return  [
            'name' => 'имя',
            'email' => 'электронная почта',
            'is_admin' => 'это_админ'
        ];
    }
}
