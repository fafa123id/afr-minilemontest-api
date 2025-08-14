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
            if ($e instanceof ModelNotFoundException || $e instanceof NotFoundHttpException) {
                return response()->json([
                    'message' => 'User not found for given ID ' . $request->route('id'),
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