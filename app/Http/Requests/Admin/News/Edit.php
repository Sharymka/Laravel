<?php

namespace App\Http\Requests\Admin\News;

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
            'category_id' => "required|exists_in_database:{$tableNameCategory},id",
            'author' => ['required', 'min:2', 'max:100'],
            'status' => ['required', new Enum(Status::class)],
            'image'  => ['nullable', 'image'],
            'description' => ['nullable', 'string', 'min:5', 'max:100']

        ];
    }

    public function attributes(): array
    {
        return  [
            'title' => 'наименование',
            'description' => 'описание',
            'author' => 'автор',
        ];
    }
}
