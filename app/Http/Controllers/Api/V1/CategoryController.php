<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\Category;
use Illuminate\Http\Response;
use App\Http\Requests\SaveCategoryRequest;
use App\Http\Controllers\Api\Controller;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::with('books')->get();

        $categories->each(function ($category){
            $this->hide($category);
    });

        return response()->json(['success' => true, 'data' => $categories]);
    }

    public function show($id)
    {
        $category = Category::find($id);

        return $this->checkModelExists(function () use ($category) {
            $this->load($category);
            
            $this->hide($category);
            return response()->json(['success' => true, 'data' => $category]);
        }, $category, trans('messages.category.not_found'));
    }

    public function store(SaveCategoryRequest $request)
    {
        $category = Category::create($request->all());

        $this->load($category);
            
        $this->hide($category);

        return response()->json(['success' => true, 'message' => trans('messages.category.created'), 'data' => $category], Response::HTTP_CREATED);
    }

    public function update(SaveCategoryRequest $request, $id)
    {
        $category = Category::find($id);

        return $this->checkModelExists(function () use ($category, $request) {
            $category->update($request->all());

            $this->load($category);
            
            $this->hide($category);

            return response()->json(['success' => true, 'message' => trans('messages.category.updated'), 'data' => $category], Response::HTTP_CREATED);
        }, $category, trans('messages.category.not_found'));
    }

    public function destroy($id)
    {
        $category = Category::find($id);

        return $this->checkModelExists(function () use ($category) {
            $category->delete();

            return response()->json(null, Response::HTTP_NO_CONTENT);
        }, $category, trans('messages.category.not_found'));
    }

    // Ocultar los atributos created_at, updated_at y pivot
    public function hide($category)
    {
        $category->makeHidden(['created_at', 'updated_at']);
        
        $category->books->each(function ($book) {
            $book->makeHidden(['created_at', 'updated_at', 'pivot']);
        });
    }

    // Carga las relaciones de books
    public function load($category)
    {
        $category->load('books');
    }
}
