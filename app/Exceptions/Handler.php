<?php

namespace App\Exceptions;

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

    public function render ($request, Throwable $exception)
    {
        if($request->is("api/*")){
            // 将方法拦截到自己的ExceptionReport
            $reporter = Report::make($exception);
            if ($reporter->shouldReturn()) {
                return $reporter->report();
            }
            if (config('app.debug')) {
                //开发环境，则显示详细错误信息
                return parent::render($request, $exception);
            } else {
                //线上环境,未知错误，则显示500
                return $reporter->prodReport();
            }
        }
        return parent::render($request, $exception);

    }
}
