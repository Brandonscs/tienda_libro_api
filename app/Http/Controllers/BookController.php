<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;

class BookController extends Controller
{
    public function index()
    {
        try {
            $books = Book::all();

            return response()->json(['success' => true, 'data' => $books]);
        } catch (Exception $e) {
            Log::error($e->getMessage() . ' line: ' . $e->getLine() . ' file: ' . $e->getFile());

            return response()->json(['success' => false, 'message' => 'Error de servidor', 'info' => $e->getMessage()], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function show($id)
    {
        try {
            $book = Book::find($id);
            if (empty($book)) {
                return response()->json(['success' => false, 'message' => 'No existe este libro'], Response::HTTP_NOT_FOUND);
            } else {
                return response()->json(['success' => true, 'data' => $book]);
            }

        } catch (Exception $e) {
            Log::error($e->getMessage() . ' line: ' . $e->getLine() . ' file: ' . $e->getFile());

            return response()->json(['success' => false, 'message' => 'Error de servidor', 'info' => $e->getMessage()], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function store(Request $request)
    {
        try {
            $book = Book::create($request->all());

            return response()->json(['success' => true, 'message' => 'Libro creado.', 'data' => $book], Response::HTTP_CREATED);
        } catch (Exception $e) {
            Log::error($e->getMessage() . ' line: ' . $e->getLine() . ' file: ' . $e->getFile());

            return response()->json(['success' => false, 'message' => 'Error de servidor', 'info' => $e->getMessage()], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $book = Book::find($id);

            if (empty($book)) {
                return response()->json(['success' => false, 'message' => 'No existe este libro'], Response::HTTP_NOT_FOUND);
            }

            $book->update($request->all());

            return response()->json(['success' => true, 'message' => 'Libro actualizado.', 'data' => $book], Response::HTTP_CREATED);
        } catch (Exception $e) {
            Log::error($e->getMessage() . ' line: ' . $e->getLine() . ' file: ' . $e->getFile());

            return response()->json(['success' => false, 'message' => 'Error de servidor', 'info' => $e->getMessage()], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function destroy($id)
    {
        try {
            $book = Book::find($id);

            if (empty($book)) {
                return response()->json(['success' => false, 'message' => 'No existe este libro'], Response::HTTP_NOT_FOUND);
            } 

            $book->delete();

            return response()->json(null, Response::HTTP_NO_CONTENT);
        } catch (Exception $e) {
            Log::error($e->getMessage() . ' line: ' . $e->getLine() . ' file: ' . $e->getFile());

            return response()->json(['success' => false, 'message' => 'Error de servidor', 'info' => $e->getMessage()], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}