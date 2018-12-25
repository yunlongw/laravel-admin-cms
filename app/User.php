<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Support\Facades\Cache;

class User extends Authenticatable
{
    use  HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
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

    public function getUserInfo($uid)
    {
        $value = Cache::get("user:{$uid}");
        if (!$value) {
            $data = $this->find($uid);
            if ($data) {
                Cache::set("user:{$uid}", json_encode($data), 3600);
            }
        } else {
            $data = json_decode($value, true);
        }

        return $data;
    }


    public function allPermission()
    {
//        return $this->getAllPermissions();
    }

    public function allRoles()
    {
//        return $this->
    }
}
