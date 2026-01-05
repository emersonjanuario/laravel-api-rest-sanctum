<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;


class ProductController extends Controller
{
    // LISTAR TODOS OS PRODUTOS
    public function index()
    {
        return response()->json(
            Product::with('category')->get(),
            200
        );
    }

    // CRIAR PRODUTO
    public function store(StoreProductRequest $request)
    {
        $request->validate([
            'category_id' => 'required|exists:categories,id',
            'name'        => 'required|min:3|max:150',
            'description' => 'nullable|min:3',
            'price'       => 'required|numeric|min:0',
            'stock'       => 'required|integer|min:0',
            'image'       => 'nullable|string'
        ]);

        $product = Product::create([
            'category_id' => $request->category_id,
            'name'        => $request->name,
            'slug'        => Str::slug($request->name),
            'description' => $request->description,
            'price'       => $request->price,
            'stock'       => $request->stock,
            'image'       => $request->image
        ]);

        return response()->json([
            'message' => 'Produto criado com sucesso!',
            'data'    => $product
        ], 201);
    }

    // EXIBIR PRODUTO
    public function show($id)
    {
        $product = Product::with('category')->find($id);

        if (!$product) {
            return response()->json([
                'error' => 'Produto não encontrado'
            ], 404);
        }

        return response()->json($product, 200);
    }

    // ATUALIZAR PRODUTO
    public function update(UpdateProductRequest $request, $id)
    {
        $product = Product::find($id);

        if (!$product) {
            return response()->json([
                'error' => 'Produto não encontrado'
            ], 404);
        }

        $request->validate([
            'category_id' => 'sometimes|exists:categories,id',
            'name'        => 'sometimes|min:3|max:150',
            'description' => 'nullable|min:3',
            'price'       => 'sometimes|numeric|min:0',
            'stock'       => 'sometimes|integer|min:0',
            'image'       => 'nullable|string'
        ]);

        $product->update([
            'category_id' => $request->category_id ?? $product->category_id,
            'name'        => $request->name ?? $product->name,
            'slug'        => Str::slug($request->name ?? $product->name),
            'description' => $request->description ?? $product->description,
            'price'       => $request->price ?? $product->price,
            'stock'       => $request->stock ?? $product->stock,
            'image'       => $request->image ?? $product->image
        ]);

        return response()->json([
            'message' => 'Produto atualizado com sucesso!',
            'data'    => $product
        ], 200);
    }

    // EXCLUIR PRODUTO
    public function destroy($id)
    {
        $product = Product::find($id);

        if (!$product) {
            return response()->json([
                'error' => 'Produto não encontrado'
            ], 404);
        }

        $product->delete();

        return response()->json([
            'message' => 'Produto excluído com sucesso!'
        ], 200);
    }
}
