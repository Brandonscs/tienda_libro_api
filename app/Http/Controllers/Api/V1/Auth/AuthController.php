<?php

namespace App\Http\Controllers\Api\V1\Auth;

use Exception;
use App\Models\User;
use Illuminate\Http\Response;
use Tymon\JWTAuth\Facades\JWTAuth;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Api\Controller;
use App\Http\Requests\AuthRegisterRequest;

class AuthController extends Controller
{
    public function register(AuthRegisterRequest $request)
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

    public function login(LoginRequest $request)
    {
        try {
            $credentials = $request->only('email', 'password');

        if(!$token = JWTAuth::attempt($credentials)) {
            return response()->json(['success' => false, 'message' => 'Credenciales invalidas'], Response::HTTP_UNAUTHORIZED);
        }

        $user = User::select('name', 'email')->where('email', $request->email)->first();

        return response()->json(['success' => true, 'data' => $user, 'token' => $token]);
        } catch (Exception $e) {
            Log::error($e->getMessage() . ' line: ' . $e->getLine() . ' file: ' . $e->getFile());

            return response()->json(['success' => false, 'message' => 'Error de servidor', 'info' => $e->getMessage()], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function me()
    {
        try {
            return response()->json(['success' => true, 'data' => Auth::user()]);
        } catch (Exception $e) {
            Log::error($e->getMessage() . ' line: ' . $e->getLine() . ' file: ' . $e->getFile());

            return response()->json(['success' => false, 'message' => 'Error de servidor', 'info' => $e->getMessage()], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function logout()
    {
        try {
            Auth::logout();

            return response()->json(['success' => true, 'message' => 'Seccion cerrada con éxito']);
        } catch (Exception $e) {
            Log::error($e->getMessage() . ' line: ' . $e->getLine() . ' file: ' . $e->getFile());

            return response()->json(['success' => false, 'message' => 'Error de servidor', 'info' => $e->getMessage()], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}