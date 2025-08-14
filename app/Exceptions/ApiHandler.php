<?php

namespace App\Exceptions;

use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Throwable;

class ApiHandler
{
    /**
     * Render an exception into an HTTP response.
     */
    public function __invoke(Throwable $e, Request $request)
    {
        if ($request->is('api/*') || $request->wantsJson()) {
            if ($e instanceof NotFoundHttpException) {
                return response()->json([
                    'message' => 'Resource not found',
                ], 404);
            }

            if ($e instanceof ValidationException) {
                return response()->json([
                    'message' => 'Validation error',
                    'errors' => $e->errors(),
                ], 422);
            }

        }
    }
}