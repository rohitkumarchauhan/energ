<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;

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
     * This is a great spot to send exceptions to Sentry, Bugsnag, etc.
     *
     * @param  \Exception $exception
     * @return void
     */
    public function report(Exception $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Exception $exception
     * @return \Illuminate\Http\Response
     */
    public function render($request, Exception $exception)
    {
        if ($exception instanceof AuthenticationException) {
            return redirect()->route('login');
        }
        if ($exception instanceof \Illuminate\Session\TokenMismatchException) {
            // return redirect()->route('login');

            return redirect()->route('login')/*->with(['status' => 'danger', 'message' => 'Good Day Sir/Mam, Unfortunately you were inactive for 30 minutes. In order for us to protect your account, we have signed you out! Don\'t worry as you can log back in whenever you are ready! We look forward to seeing you again soon and as always the SME9ja Team always has your back!'])*/
                ;
        }

        if ($exception instanceof PostTooLargeException) {
            return response('You have uploaded a large file.');
            //return redirect()->back()->withInput()->with(['status' => 'error', 'message' => 'You have uploaded a large file.']);
        }
        if (!$exception instanceof ValidationException) {

            if (env('APP_ENV') == 'prod') {
                $status = 400;
                $message = "Something went wrong! Please contact customer support for assistance.";
                // If this exception is an instance of HttpException
                if ($this->isHttpException($exception)) {
                    // Grab the HTTP status code from the Exception
                    $status = $exception->getStatusCode();
                    $message = $exception->getMessage();
                }
                $page_title = "ERROR- " . $status;
                if ($message == "" && $status == 404) {
                    $message = trans('error.page_not_found');
                } elseif ($message == "" && $status == 400) {
                    $message = "Something went wrong! Please contact customer support for assistance.";
                }
                return response()->view('errors.error', ['exception' => $exception, 'page_title' => $page_title, 'status' => $status, 'message' => $message,], $status);
            }
            //
//            }else{
//                if ($this->isHttpException($exception)) {
//
//                    // Grab the HTTP status code from the Exception
//                    $status = $exception->getStatusCode();
//                    $message = $exception->getMessage();
//                }
//                $page_title = "ERROR- " . $status;
//
//
//                if ($message == "" && $status == 404) {
//                    $message = trans('error.page_not_found');
//                }
//
//                return response()->view('errors.error', ['exception' => $exception, 'page_title' => $page_title, 'status' => $status, 'message' => $message,], $status);
//
//            }
        }


        return parent::render($request, $exception);
    }
}
