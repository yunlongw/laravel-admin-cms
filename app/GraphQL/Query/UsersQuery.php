<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/1/28/028
 * Time: 17:34
 */

namespace App\GraphQL\Query;


use App\Http\Controllers\Api\Model\Member;
use GraphQL;
use GraphQL\Type\Definition\Type;
use Auth;
use Rebing\GraphQL\Support\Query;

class UsersQuery extends Query
{
    protected $attributes = [
        'name' => 'Users query'
    ];

    protected $guard = 'graphql';


//    public function authorize(array $args)
//    {
//        return ! Auth::guard($this->guard)->guest();
//    }

    public function type()
    {
        return Type::listOf(GraphQL::type('user'));
    }

    public function args()
    {
        return [
            'id' => [
                'name' => 'id',
                'type' => Type::string()
            ],
            'email' => [
                'name' => 'email',
                'type' => Type::string(),
            ]
        ];
    }

    public function resolve($root, $args)
    {
        if (isset($args['id'])) {
            return Member::where('id' , $args['id'])->get();
        }

        if (isset($args['email'])) {
            return Member::where('email', $args['email'])->get();
        }

        return Member::all();
    }
}
