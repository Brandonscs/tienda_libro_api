<?php

namespace App\Http\Controllers\Api\V1;

use Exception;
use App\Models\Author;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;
use App\Http\Requests\SaveAuthorRequest;
use App\Http\Controllers\Api\Controller;

class AuthorController extends Controller
{
    public function index()
    {
        try {
            $authors = Author::all();

            return response()->json(['success' => true, 'data' => $authors]);
        } catch (Exception $e) {
            Log::error($e->getMessage() . ' line: ' . $e->getLine() . ' file: ' . $e->getFile());

            return response()->json(['success' => false, 'message' => 'Error de servidor', 'info' => $e->getMessage()], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function show($id)
    {
        try {
            $author = Author::find($id);
            if (empty($author)) {
                return response()->json(['success' => false, 'message' => 'No existe el autor'], Response::HTTP_NOT_FOUND);
            } else {
                return response()->json(['success' => true, 'data' => $author]);
            }

        } catch (Exception $e) {
            Log::error($e->getMessage() . ' line: ' . $e->getLine() . ' file: ' . $e->getFile());

            return response()->json(['success' => false, 'message' => 'Error de servidor', 'info' => $e->getMessage()], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function store(SaveAuthorRequest $request)
    {
        try {
            $author = Author::create($request->all());

            return response()->json(['success' => true, 'message' => 'Autor creado.', 'data' => $author], Response::HTTP_CREATED);
        } catch (Exception $e) {
            Log::error($e->getMessage() . ' line: ' . $e->getLine() . ' file: ' . $e->getFile());

            return response()->json(['success' => false, 'message' => 'Error de servidor', 'info' => $e->getMessage()], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function update(SaveAuthorRequest $request, $id)
    {
        try {
            $author = Author::find($id);

            if (empty($author)) {
                return response()->json(['success' => false, 'message' => 'No existe el autor'], Response::HTTP_NOT_FOUND);
            }

            $author->update($request->all());

            return response()->json(['success' => true, 'message' => 'Autor actualizado.', 'data' => $author], Response::HTTP_CREATED);
        } catch (Exception $e) {
            Log::error($e->getMessage() . ' line: ' . $e->getLine() . ' file: ' . $e->getFile());

            return response()->json(['success' => false, 'message' => 'Error de servidor', 'info' => $e->getMessage()], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function destroy($id)
    {
        try {
            $author = Author::find($id);

            if (empty($author)) {
                return response()->json(['success' => false, 'message' => 'No existe el autor'], Response::HTTP_NOT_FOUND);
            } 

            $author->delete();

            return response()->json(null, Response::HTTP_NO_CONTENT);
        } catch (Exception $e) {
            Log::error($e->getMessage() . ' line: ' . $e->getLine() . ' file: ' . $e->getFile());

            return response()->json(['success' => false, 'message' => 'Error de servidor', 'info' => $e->getMessage()], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
