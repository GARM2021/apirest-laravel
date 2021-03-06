<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array<int, string>
     */
    protected $except = [
        
        'http://localhost:8000/registro', //! C24
        'http://localhost:8000/cursos', //! C30
        'http://localhost:8000/cursos/*' //! C31

    ];
}
