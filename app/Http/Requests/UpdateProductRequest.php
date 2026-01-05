<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'category_id' => 'sometimes|exists:categories,id',
            'name'        => 'sometimes|min:3|max:150',
            'description' => 'nullable|min:3',
            'price'       => 'sometimes|numeric|min:0',
            'stock'       => 'sometimes|integer|min:0',
            'image'       => 'nullable|string',
        ];
    }

    public function messages(): array
    {
        return [
            'category_id.exists' => 'A categoria selecionada não existe.',

            'name.min'  => 'O nome deve ter no mínimo 3 caracteres.',
            'name.max'  => 'O nome deve ter no máximo 150 caracteres.',

            'price.numeric' => 'O preço deve ser numérico.',
            'price.min'     => 'O preço deve ser maior ou igual a 0.',

            'stock.integer' => 'O estoque deve ser inteiro.',
            'stock.min'     => 'O estoque não pode ser negativo.',
        ];
    }
}
