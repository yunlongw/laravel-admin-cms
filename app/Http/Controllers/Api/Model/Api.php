<?php

namespace App\Http\Controllers\Api\Model;

use Illuminate\Database\Eloquent\Model;

class Api extends Model
{
    //
    protected $fillable = [
        'request_method', 'check_token', 'url', 'name', 'version', 'headers', 'request', 'response',
    ];
}
