<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/1/28/028
 * Time: 17:36
 */

namespace App\GraphQL\Type;

use GraphQL;
use App\Http\Controllers\Api\Model\Member;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Type as GraphQLType;


class UsersType extends GraphQLType
{
    protected $attributes = [
        'name'          => 'User',
        'description'   => 'A user',
        'model'         => Member::class,
    ];

    public function fields()
    {
        return [
            'id' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'The id of the member',
                'alias' => 'user_id', // Use 'alias', if the database column is different from the type name
            ],
            'name' => [
                'type' => Type::string(),
                'description' => 'the name of member'
            ],
            'email' => [
                'type' => Type::string(),
                'description' => 'The email of member',
//                'privacy' => function(array $args){
//                    return $args['id'] == Auth::id();
//                }
            ],
            // Uses the 'getIsMeAttribute' function on our custom User model
            'isMe' => [
                'type' => Type::boolean(),
                'description' => 'True, if the queried user is the current user',
                'selectable' => false, // Does not try to query this from the database
            ],
            'order' => [
                'type' =>Type::listOf(GraphQL::type('order')),
                'description' => "user's order",
            ],
            'friend' => [
                'type' => Type::listOf(GraphQL::type('user')),
            ],
            'remember_token' => [
                'type' => Type::string(),
                'description' => 'user token'
            ],
        ];
    }

    // If you want to resolve the field yourself, you can declare a method
    // with the following format resolve[FIELD_NAME]Field()
    protected function resolveEmailField($root, $args)
    {
        return strtolower($root->email);
    }
}
