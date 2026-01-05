<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true; // Permite requisições
    }

    public function rules(): array
    {
        return [
            'category_id' => ['required', 'exists:categories,id'],
            'name'        => ['required', 'min:3', 'max:150'],
            'description' => ['nullable', 'min:3'],
            'price'       => ['required', 'numeric', 'min:0', 'decimal:0,2'],
            'stock'       => ['required', 'integer', 'min:0'],
            'image'       => ['nullable', 'image', 'mimes:jpeg,png,jpg', 'max:2048'], // Se for upload de arquivo
        ];
    }


    public function messages(): array
    {
        return [
            'category_id.required' => 'A categoria é obrigatória.',
            'category_id.exists'   => 'A categoria selecionada não existe.',

            'name.required'  => 'O nome do produto é obrigatório.',
            'name.min'       => 'O nome deve ter no mínimo 3 caracteres.',
            'name.max'       => 'O nome deve ter no máximo 150 caracteres.',

            'price.required' => 'O preço é obrigatório.',
            'price.numeric'  => 'O preço deve ser numérico.',
            'price.min'      => 'O preço deve ser maior ou igual a 0.',

            'stock.required' => 'O estoque é obrigatório.',
            'stock.integer'  => 'O estoque deve ser um número inteiro.',
            'stock.min'      => 'O estoque não pode ser negativo.',
        ];
    }
}
