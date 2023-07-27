<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\Author;
use Illuminate\Http\Response;
use App\Http\Requests\SaveAuthorRequest;
use App\Http\Controllers\Api\Controller;

class AuthorController extends Controller
{
    public function index()
    {
        //$authors = Author::all();
        $authors = Author::with('books')->get();

        $authors->each(function ($author){
            $this->hide($author);
    });

        return response()->json(['success' => true, 'data' => $authors]);
    }

    public function show($id)
    {
        $author = Author::find($id);

        return $this->checkModelExists(function () use ($author) {
            $this->load($author);
            
            $this->hide($author);
            return response()->json(['success' => true, 'data' => $author]);
        }, $author, trans('messages.author.not_found'));
    }

    public function store(SaveAuthorRequest $request)
    {
        $author = Author::create($request->all());

        $this->load($author);
            
        $this->hide($author);

        return response()->json(['success' => true, 'message' => trans('messages.author.created'), 'data' => $author], Response::HTTP_CREATED);
    }

    public function update(SaveAuthorRequest $request, $id)
    {
        $author = Author::find($id);

        return $this->checkModelExists(function () use ($author, $request) {
            $author->update($request->all());

            $this->load($author);
            
            $this->hide($author);

            return response()->json(['success' => true, 'message' => trans('messages.author.updated'), 'data' => $author], Response::HTTP_CREATED);
        }, $author, trans('messages.author.not_found'));
    }

    public function destroy($id)
    {
        $author = Author::find($id);

        return $this->checkModelExists(function () use ($author) {
            $author->books()->detach();
            $author->delete();

            return response()->json(null, Response::HTTP_NO_CONTENT);
        }, $author, trans('messages.author.not_found'));
    }

    // Ocultar los atributos created_at, updated_at y pivot
    public function hide($author)
    {
        $author->makeHidden(['created_at', 'updated_at']);
        
        $author->books->each(function ($book) {
            $book->makeHidden(['created_at', 'updated_at', 'pivot']);
        });
    }

    // Carga las relaciones de books
    public function load($author)
    {
        $author->load('books');
    }
}