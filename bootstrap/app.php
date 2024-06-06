<?php

use App\Http\Middleware\AdministradorMiddleware;
use App\Http\Middleware\MedicoMiddleware;
use App\Http\Middleware\SecretarioMiddleware;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        api: __DIR__.'/../routes/api.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->alias([
            'MedicoMiddleware'=> MedicoMiddleware::class,
            'AdministradorMiddleware'=> AdministradorMiddleware::class,
            'SecretarioMiddleware'=> SecretarioMiddleware::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
