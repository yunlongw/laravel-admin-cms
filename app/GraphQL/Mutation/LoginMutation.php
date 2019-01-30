<?php

namespace App\GraphQL\Mutation;

use GraphQL;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Error\AuthorizationError;
use Rebing\GraphQL\Support\Mutation;
use Rebing\GraphQL\Support\SelectFields;
use Auth;

class LoginMutation extends Mutation
{
    protected $guard = 'graphql';

    protected $attributes = [
        'name' => 'LoginMutation',
        'description' => 'A mutation'
    ];

    public function type()
    {
        return GraphQL::type('user');
    }

    public function args()
    {
        return [
            'email' => [
                'name' => 'email',
                'type' => Type::nonNull(Type::string()),
            ],
            'password' => [
                'name' => 'password',
                'type' => Type::nonNull(Type::string())
            ]
        ];
    }

    public function resolve($root, $args, SelectFields $fields, ResolveInfo $info)
    {
        $credentials = [
            'email' => $args['email'],
            'password' => $args['password']
        ];

        if (!$token = $this->guard()->attempt($credentials)) {
            throw new AuthorizationError('Invalid Credentials.');
        }
        $user = $this->guard()->user();
        $user->remember_token = $token;
        return $user;
    }

    public function guard()
    {
        return Auth::guard($this->guard);
    }
}
