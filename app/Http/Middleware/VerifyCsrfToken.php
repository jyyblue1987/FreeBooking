<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as BaseVerifier;
use Closure;

class VerifyCsrfToken extends BaseVerifier
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    protected $except = [
        '*/roomPhotos'
    ];

    public function handle($request, Closure $next)
    {
        if ('testing' !== app()->environment())
        {
            return parent::handle($request, $next);
        }

        return $next($request);
    }
}
