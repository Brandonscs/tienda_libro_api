<?php

namespace App\Http\Controllers\Api;

use Closure;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    protected function checkModelExists(Closure $callback, $model, $message)
    {
        if (empty($model)) {
            return response()->json(['success' => false, 'message' => $message], Response::HTTP_NOT_FOUND);
        } else {
            return $callback();
        }
    }
}