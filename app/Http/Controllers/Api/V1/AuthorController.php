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
        $authors = Author::all();

        return response()->json(['success' => true, 'data' => $authors]);
    }

    public function show($id)
    {
        $author = Author::find($id);

        return $this->checkModelExistsAuthor(function () use ($author) {
            return response()->json(['success' => true, 'data' => $author]);
        }, $author);
    }

    public function store(SaveAuthorRequest $request)
    {
        $author = Author::create($request->all());

        return response()->json(['success' => true, 'message' => 'Autor creado.', 'data' => $author], Response::HTTP_CREATED);
    }

    public function update(SaveAuthorRequest $request, $id)
    {
        $author = Author::find($id);

        return $this->checkModelExistsAuthor(function () use ($author, $request) {
            $author->update($request->all());

            return response()->json(['success' => true, 'message' => 'Autor actualizado.', 'data' => $author], Response::HTTP_CREATED);
        }, $author);
    }

    public function destroy($id)
    {
        $author = Author::find($id);

        return $this->checkModelExistsAuthor(function () use ($author) {
            $author->delete();

            return response()->json(null, Response::HTTP_NO_CONTENT);
        }, $author);
    }
}