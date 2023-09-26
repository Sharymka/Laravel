<?php

namespace App\Http\Requests\Admin\Categories;

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
        $tableNameCategory = (new Category())->getTable();
        return[
            'title' => ['required', 'string', 'min:3', 'max:150'],
//            'categories_id' => ['required', 'integer', "exist:{$tableNameCategory}, id"],
            'author' => ['required', 'min:2', 'max:100'],
            'description' => ['nullable', 'string']

        ];
    }

    public function attributes(): array
    {
        return  [
            'title' => 'наименование',
            'description' => 'описание',
        ];
    }
}
