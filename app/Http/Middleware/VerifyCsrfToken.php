<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as BaseVerifier;

class VerifyCsrfToken extends BaseVerifier
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    protected $except = [        
        'api/user',
        'api/user/*',
        'api/aluno',
        'api/aluno/*',
        'api/curso',
        'api/curso/*',
        'api/atletica',
        'api/atletica/*',
        'api/time',
        'api/time/*',
        'api/candidato',
        'api/candidato/*',
        'api/jogador',
        'api/jogador/*',
        '/',
        '/*',
    ];
}
