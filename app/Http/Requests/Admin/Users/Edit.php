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
            'password' => ['required'],
            'newPassword' => ['required', 'string', 'min:8'],
            'is_admin' => 'required|string|in:user,admin'
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
