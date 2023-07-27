<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\LiteraryGenre;
use Illuminate\Http\Response;
use App\Http\Requests\SaveLiteraryGenreRequest;
use App\Http\Controllers\Api\Controller;

class LiteraryGenreController extends Controller
{
    public function index()
    {
        //$authors = Author::all();
        $literaryGenres = LiteraryGenre::with('books')->get();

        $literaryGenres->each(function ($literaryGenre){
            $this->hide($literaryGenre);
    });

        return response()->json(['success' => true, 'data' => $literaryGenres]);
    }

    public function show($id)
    {
        $literaryGenre = LiteraryGenre::find($id);

        return $this->checkModelExists(function () use ($literaryGenre) {
            $this->load($literaryGenre);
            
            $this->hide($literaryGenre);
            return response()->json(['success' => true, 'data' => $literaryGenre]);
        }, $literaryGenre, trans('messages.literaryGenre.not_found'));
    }

    public function store(SaveLiteraryGenreRequest $request)
    {
        $literaryGenre = LiteraryGenre::create($request->all());

        $this->load($literaryGenre);
            
        $this->hide($literaryGenre);

        return response()->json(['success' => true, 'message' => trans('messages.literaryGenre.created'), 'data' => $literaryGenre], Response::HTTP_CREATED);
    }

    public function update(SaveLiteraryGenreRequest $request, $id)
    {
        $literaryGenre = LiteraryGenre::find($id);

        return $this->checkModelExists(function () use ($literaryGenre, $request) {
            $literaryGenre->update($request->all());

            $this->load($literaryGenre);
            
            $this->hide($literaryGenre);

            return response()->json(['success' => true, 'message' => trans('messages.literaryGenre.updated'), 'data' => $literaryGenre], Response::HTTP_CREATED);
        }, $literaryGenre, trans('messages.literaryGenre.not_found'));
    }

    public function destroy($id)
    {
        $literaryGenre = LiteraryGenre::find($id);

        return $this->checkModelExists(function () use ($literaryGenre) {
            $literaryGenre->books()->detach();
            $literaryGenre->delete();

            return response()->json(null, Response::HTTP_NO_CONTENT);
        }, $literaryGenre, trans('messages.literaryGenre.not_found'));
    }

    // Ocultar los atributos created_at, updated_at y pivot
    public function hide($literaryGenre)
    {
        $literaryGenre->makeHidden(['created_at', 'updated_at']);
        
        $literaryGenre->books->each(function ($book) {
            $book->makeHidden(['created_at', 'updated_at', 'pivot']);
        });
    }

    // Carga las relaciones de books
    public function load($literaryGenre)
    {
        $literaryGenre->load('books');
    }
}
