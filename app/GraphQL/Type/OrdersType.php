<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/1/28/028
 * Time: 20:48
 */

namespace App\GraphQL\Type;

use App\Models\Order;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Type as GraphQLType;

class OrdersType extends GraphQLType
{
    protected $attributes = [
        'name' => "order",
        'description' => 'order',
        'model' => Order::class
    ];

    public function fields()
    {
        return [
            'Id' => [
                'type' => Type::nonNull(Type::string()),
            ],
            'uid' => [
                'type' => Type::nonNull(Type::string()),
            ],
            'order_number' => [
                'type' => Type::nonNull(Type::string()),
            ],
            'total' => [
                'type' => Type::int(),
            ],
            'created_at' => [
                'type' => Type::string(),
            ],
            'updated_at' => [
                'type' => Type::string(),
            ],

        ];
    }
}
