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
        //$books = Book::all();
        $books = Book::with(['categories', 'authors', 'literaryGenres'])->get();

        $books->each(function ($books) {
        $this->hide($books);
    });

        return response()->json(['success' => true, 'data' => $books]);
    }

    public function show($id)
    {
        $book = Book::find($id);

        return $this->checkModelExists(function () use ($book) {
            $this->load($book);
            
            $this->hide($book);
            return response()->json(['success' => true, 'data' => $book]);
        }, $book, trans('messages.book.not_found'));
    }

    public function store(SaveBookRequest $request)
    {
        $book = Book::create($request->all());

        $this->associateData($request, $book);

        $this->load($book);

        $this->hide($book);

        return response()->json(['success' => true, 'message' => trans('messages.book.created'), 'data' => $book], Response::HTTP_CREATED);
    }

    public function update(SaveBookRequest $request, $id)
    {
        $book = Book::find($id);

        return $this->checkModelExists(function () use ($book, $request) {
            $book->update($request->all());

            $this->associateData($request, $book);

            $this->load($book);

            $this->hide($book);

            return response()->json(['success' => true, 'message' => trans('messages.book.updated'), 'data' => $book], Response::HTTP_CREATED);
        }, $book, trans('messages.book.not_found'));
    }

    public function destroy($id)
    {
        $book = Book::find($id);

        return $this->checkModelExists(function () use ($book){
            // Eliminar las relaciones con autores en la tabla books_authors
            $book->authors()->detach();

            // Eliminar las relaciones con géneros literarios en la tabla books_literary_genres
            $book->literaryGenres()->detach();
            $book->delete();

            return response()->json(null, Response::HTTP_NO_CONTENT);
        }, $book, trans('messages.book.not_found'));
    }

    // Ocultar los atributos created_at, updated_at y pivot
    public function hide($book)
    {
        $book->makeHidden(['created_at', 'updated_at']);

        $book->categories->makeHidden(['created_at', 'updated_at']);

        $book->authors->each(function ($author) {
            $author->makeHidden(['created_at', 'updated_at', 'pivot']);
        });

        $book->literaryGenres->each(function ($literaryGenre) {
            $literaryGenre->makeHidden(['created_at', 'updated_at', 'pivot']);
        });
    }

    // Carga las relaciones categories, authors y literaryGenres
    public function load($book)
    {
        $book->load(['categories', 'authors', 'literaryGenres']);
    }

    // Obtiene las ids de authors, literary genres y asocia o actualiza las relaciones
    public function associateData($request, $book)
    {
        $authorId = $request->input('author_id', []);
        $literaryGenreId = $request->input('literary_genre_id', []);

        $book->authors()->sync($authorId);
        $book->literaryGenres()->sync($literaryGenreId);
    }
}