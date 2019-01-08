<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/1/1/001
 * Time: 16:47
 */

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Api\Model\Member;
use App\Http\Controllers\Api\Response;
use Illuminate\Http\Request;
use App\Http\Controllers\Api\BaseController;
use Illuminate\Support\Facades\Hash;
use App\User;
use Validator;


class UserController extends BaseController
{

    protected $guard = 'api';

    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login']]);
    }


    public function index()
    {
        $users = User::all();
        return $this->response->array($users->all());
    }

    public function register(Request $request)
    {

        $rules = [
            'name' => ['required'],
            'email' => ['required'],
            'password' => ['required', 'min:6', 'max:16'],
        ];

        $payload = $request->only('name', 'email', 'password');
        $validator = Validator::make($payload, $rules);
        // 验证格式
        if ($validator->fails()) {
            return $this->response->array(Response::error(
                $validator->errors()
            ));
        }

        $member = Member::where(['email' => $payload['email']])->count();
        if ($member > 0) {
            return $this->response->array(Response::error('重复注册'));
        }


        $result = Member::create([
            'name' => $payload['name'],
            'email' => $payload['email'],
            'password' => Hash::make($payload['password']),
        ]);


        if ($result) {
            return $this->response->array(
                Response::success([])
            );
        } else {
            return $this->response->array(
                Response::error('注册失败')
            );
        }
    }


    public function login(Request $request)
    {
        $payload = $request->only(['email', 'password']);
        if ($token = $this->guard()->attempt($payload)) {
            return $this->response->array(
                Response::success(
                    [
                        'access_token' => $token,
                        'token_type' => 'bearer',
                        'expires_in' => $this->guard()->factory()->getTTL() * 60
                    ]
                )
            );
        } else {
            return $this->response->array(
                Response::return(401,'登录失败')
            );
        }
    }


    public function refresh()
    {
        return $this->response->array(
            Response::success([
                'access_token' => auth()->refresh()
            ])
        );
    }

    public function me()
    {
        return response()->json(
            Response::success(
                $this->guard()->user()
            ));
    }


    public function logout(Request $request)
    {
        auth()->logout();
        return $this->response->array(
            Response::return(Response::SUCCESS, 'Successfully logged out')
        );
    }


    public function guard()
    {
        return \Auth::guard($this->guard);
    }


}