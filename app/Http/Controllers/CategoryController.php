<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    // LISTAR TODAS AS CATEGORIAS
    public function index()
    {
        return response()->json(Category::all(), 200);
    }

    // CRIAR UMA NOVA CATEGORIA
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:3|max:100|unique:categories,name',
            'description' => 'nullable|min:3'
        ]);

        $category = Category::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'description' => $request->description
        ]);

        return response()->json([
            'message' => 'Categoria criada com sucesso!',
            'data' => $category
        ], 201);
    }

    // EXIBIR UMA CATEGORIA ESPECÍFICA
    public function show($id)
    {
        $category = Category::find($id);

        if (!$category) {
            return response()->json([
                'error' => 'Categoria não encontrada'
            ], 404);
        }

        return response()->json($category, 200);
    }

    // ATUALIZAR UMA CATEGORIA
    public function update(Request $request, $id)
    {
        $category = Category::find($id);

        if (!$category) {
            return response()->json([
                'error' => 'Categoria não encontrada'
            ], 404);
        }

        $request->validate([
            'name' => 'sometimes|min:3|max:100|unique:categories,name,' . $id,
            'description' => 'nullable|min:3'
        ]);

        $category->update([
            'name' => $request->name ?? $category->name,
            'slug' => Str::slug($request->name ?? $category->name),
            'description' => $request->description ?? $category->description
        ]);

        return response()->json([
            'message' => 'Categoria atualizada com sucesso!',
            'data' => $category
        ], 200);
    }

    // EXCLUIR UMA CATEGORIA
    public function destroy($id)
    {
        $category = Category::find($id);

        if (!$category) {
            return response()->json([
                'error' => 'Categoria não encontrada'
            ], 404);
        }

        $category->delete();

        return response()->json([
            'message' => 'Categoria excluída com sucesso!'
        ], 200);
    }
}
