<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Auth\AuthenticationException;
use Auth;
class Handler extends ExceptionHandler
{
    protected function unauthenticated($request, AuthenticationException $exception)
    {
        if ($request->expectsJson()) {
            return response()->json(['error' => 'Unauthenticated.'], 401);
        }
        if ($request->is('sprovider') || $request->is('sprovider/*')) {
            return redirect()->guest('/login/sprovider');
        }
        if ($request->is('clientlog') || $request->is('clientlog/*')) {
            return redirect()->guest('/login/clientlog');
        }
        if ($request->is('stafflog') || $request->is('stafflog/*')) {
            return redirect()->guest('/login/stafflog');
        }

        return redirect()->guest(route('login'));
    }
}
