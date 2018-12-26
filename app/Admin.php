<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/12/26/026
 * Time: 18:28
 */

namespace App;


use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;


class Admin extends Authenticatable
{
    use  HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Note: 如果要使用 HasRoles trait 到其它 model，需要添加属性 protected $guard_name = 'web';，否则会出现错误！
     * @var string
     */
    protected $guard_name = 'admin';


}