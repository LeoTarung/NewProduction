<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use League\Flysystem\Exception;

use Illuminate\Support\Facades\Storage;
use Illuminate\Contracts\Filesystem\FileNotFoundException;
use League\Flysystem\FileNotFoundException as FlysystemFileNotFoundException;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array<int, class-string<Throwable>>
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array<int, string>
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

    public function render($request, Throwable $exception)
    {
        if ($exception instanceof Exception && $exception->getMessage() === 'Impossible to create the root directory') {
            // Tangani error League\Flysystem\Exception dengan pesan "Impossible to create the root directory"
            // Lakukan penanganan yang sesuai, seperti menampilkan pesan error atau melakukan tindakan lain yang Anda inginkan
            return response()->json(['error' => 'Tidak dapat membuat direktori root'], 500);
        }

        return parent::render($request, $exception);
    }

}
