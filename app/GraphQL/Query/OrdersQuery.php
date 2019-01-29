<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/1/28/028
 * Time: 17:34
 */

namespace App\GraphQL\Query;


use App\Models\Order;
use GraphQL;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Query;

class OrdersQuery extends Query
{
    protected $attributes = [
        'name' => 'order'
    ];

    public function type()
    {
        return Type::listOf(GraphQL::type('order'));
    }

    public function args()
    {
        return [
            'Id' => ['name' => 'Id', 'type' => Type::string()],
            'uid' => ['name' => 'uid', 'type' => Type::string()],
            'order_number' => ['name' => 'order_number', 'type' => Type::string()],
        ];
    }

    public function resolve($root, $args)
    {
        if (isset($args['id'])) {
            return Order::where('Id' , $args['Id'])->get();
        }

        if (isset($args['uid'])) {
            return Order::where('uid', $args['uid'])->get();
        }

        return Order::all();
    }
}
