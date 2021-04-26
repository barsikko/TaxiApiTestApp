<?php

namespace App\Exceptions;

use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Http\Response;
use Illuminate\Validation\ValidationException;
use Symfony\Component\Routing\Exception\RouteNotFoundException;
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
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     *
     * @return void
     */
    public function register()
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }

   /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Throwable  $exception
     * @return \Illuminate\Http\Response|\Illuminate\Http\JsonResponse
     *
     * @throws \Throwable
     */
    public function render($request, Throwable $exception)
    {

            if ($exception instanceof ValidationException)
        {
            $errors = $exception->validator->errors()->getMessages();

            return response()->json($errors, Response::HTTP_UNPROCESSABLE_ENTITY);
        }

             if ($exception instanceOf AuthenticationException)
         {
            return response()->json($exception->getMessage(), Response::HTTP_UNAUTHORIZED);
         }

          if ($exception instanceOf AuthorizationException)
         {
            return response()->json($exception->getMessage(), Response::HTTP_FORBIDDEN);
         }

          if ($exception instanceOf ModelNotFoundException)
        {
            $model = strtolower(class_basename($exception->getModel()));

            return response()->json("Does not exist any instance of {$model} with the given id", Response::HTTP_NOT_FOUND);
        }

           if ($exception instanceOf RouteNotFoundException)
        {

          return response()->json($exception->getMessage(), Response::HTTP_FORBIDDEN);  
        }

             if ($exception instanceOf \Exception)
         {
            return response()->json($exception->getMessage(), Response::HTTP_UNPROCESSABLE_ENTITY);
         }


        return parent::render($request, $exception);

        /*if ($exception instanceof HttpException)
        {
            $code = $exception->getStatusCode();
            $message = Response::$statusTexts[$code];

            return $this->errorResponse($message, $code);
        }

        if ($exception instanceOf ModelNotFoundException)
        {
            $model = strtolower(class_basename($exception->getModel()));

            return $this->errorResponse("Does not exist any instance of {$model} with the given id", Response::HTTP_NOT_FOUND );
        }

         if ($exception instanceOf AuthorizationException)
         {
            return $this->errorResponse($exception->getMessage(), Response::HTTP_FORBIDDEN);
         }

           if ($exception instanceOf AuthenticationException)
         {
            return $this->errorResponse($exception->getMessage(), Response::HTTP_UNAUTHORIZED);
         }

         if ($exception instanceOf ValidationException)
         {
            $errors = $exception->validator->errors()->getMessages();

            return $this->errorResponse($errors, Response::HTTP_UNPROCESSABLE_ENTITY);
         }


         if (env('APP_DEBUG', false)){
            return parent::render($request, $exception);
         }

        return $this->errorResponse('Unexpected error. Try later', Response::HTTP_INTERNAL_SERVER_ERROR);
*/
    }
}
