<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\Book;
use Illuminate\Http\Response;
use App\Http\Requests\SaveBookRequest;
use App\Http\Controllers\Api\Controller;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::all();

        return response()->json(['success' => true, 'data' => $books]);
    }

    public function show($id)
    {
        $book = Book::find($id);

        return $this->checkModelExists(function () use ($book) {
            return response()->json(['success' => true, 'data' => $book]);
        }, $book, trans('messages.book.not_found'));
    }

    public function store(SaveBookRequest $request)
    {
        $book = Book::create($request->all());

        return response()->json(['success' => true, 'message' => trans('messages.book.created'), 'data' => $book], Response::HTTP_CREATED);
    }

    public function update(SaveBookRequest $request, $id)
    {
        $book = Book::find($id);

        return $this->checkModelExists(function () use ($book, $request) {
            $book->update($request->all());

            return response()->json(['success' => true, 'message' => trans('messages.book.updated'), 'data' => $book], Response::HTTP_CREATED);
        }, $book, trans('messages.book.not_found'));
    }

    public function destroy($id)
    {
        $book = Book::find($id);

        return $this->checkModelExists(function () use ($book){
            $book->delete();

            return response()->json(null, Response::HTTP_NO_CONTENT);
        }, $book, trans('messages.book.not_found'));
    }
}