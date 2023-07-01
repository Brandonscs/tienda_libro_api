<?php

namespace App\Http\Controllers\Api\V1\Auth;

use Exception;
use App\Models\User;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Api\Controller;
use App\Http\Requests\AuthRegisterRequest;

class AuthController extends Controller
{
    public function resgister(AuthRegisterRequest $request)
    {
        try {
            $data = $request->all();
            $data['password'] = bcrypt($request->password);

            $user = User::create($data);

            return response()->json(['success' => true, 'message' => 'Usuario registrado', 'data' => $user], Response::HTTP_CREATED);
        } catch (Exception $e) {
            Log::error($e->getMessage() . ' line: ' . $e->getLine() . ' file: ' . $e->getFile());

            return response()->json(['success' => false, 'message' => 'Error de servidor', 'info' => $e->getMessage()], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}