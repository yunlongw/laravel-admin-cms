<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * Indicates whether the XSRF-TOKEN cookie should be set on the response.
     *
     * @var bool
     */
    protected $addHttpCookie = true;

    /**
     * 从 CSRF 验证中排除的 URL
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    protected $except = [
        'alipay/*',
        'http://example.com/foo/bar',
        'http://example.com/foo/*',
    ];
}
