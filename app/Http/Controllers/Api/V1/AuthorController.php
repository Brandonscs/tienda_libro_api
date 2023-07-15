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

        return $this->checkModelExists(function () use ($author) {
            return response()->json(['success' => true, 'data' => $author]);
        }, $author, trans('messages.author.not_found'));
    }

    public function store(SaveAuthorRequest $request)
    {
        $author = Author::create($request->all());

        return response()->json(['success' => true, 'message' => trans('messages.author.created'), 'data' => $author], Response::HTTP_CREATED);
    }

    public function update(SaveAuthorRequest $request, $id)
    {
        $author = Author::find($id);

        return $this->checkModelExists(function () use ($author, $request) {
            $author->update($request->all());

            return response()->json(['success' => true, 'message' => trans('messages.author.updated'), 'data' => $author], Response::HTTP_CREATED);
        }, $author, trans('messages.author.not_found'));
    }

    public function destroy($id)
    {
        $author = Author::find($id);

        return $this->checkModelExists(function () use ($author) {
            $author->delete();

            return response()->json(null, Response::HTTP_NO_CONTENT);
        }, $author, trans('messages.author.not_found'));
    }
}