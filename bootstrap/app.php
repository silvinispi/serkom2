<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Http\Request;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        // Kalau user BELUM login, arahkan ke halaman login admin
        $middleware->redirectGuestsTo(fn (Request $request) => route('admin.login'));

        // Kalau user SUDAH login, arahkan ke dashboard admin (bukan balik ke /)
        $middleware->redirectUsersTo(fn (Request $request) => route('admin.dashboard'));
        $middleware->alias([
            'role' => \App\Http\Middleware\RoleMiddleware::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        //
    })->create();
