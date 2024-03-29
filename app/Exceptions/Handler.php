<?php

namespace App\Exceptions;

use DomainException;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    /**
     * Report or log an exception.
     *
     * @param  \Throwable  $exception
     * @return void
     *
     * @throws \Exception
     */
    public function report(Throwable $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Throwable  $exception
     * @return \Symfony\Component\HttpFoundation\Response
     *
     * @throws \Throwable
     */
    public function render($request, Throwable $exception)
    {
        if ($exception instanceof ModelNotFoundException) {
            return response()->json([
                "error" => true,
                "message" => $exception->getMessage(),
                "exception" => 'ModelNotFoundException'
            ], 404);
        } elseif ($exception instanceof QueryException) {
            return response()->json([
                "error" => true,
                "message" => $exception->getMessage(),
                "exception" => 'QueryException'
            ], 422);
        } elseif ($exception instanceof DomainException) {
            return response()->json([
                "error" => true,
                "message" => $exception->getMessage(),
                "exception" => 'QueryException'
            ], 422);
        } elseif ($exception instanceof Exception) {
            return response()->json([
                "error" => true,
                "message" => $exception->getMessage(),
                "exception" => 'Exception'
            ], 500);
        }
    }
}
