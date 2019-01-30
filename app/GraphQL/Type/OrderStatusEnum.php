<?php

namespace App\GraphQL\Type;

use Rebing\GraphQL\Support\Type as GraphQLType;

class OrderStatusEnum extends GraphQLType
{
    protected $enumObject = true;

    protected $attributes = [
        'name' => 'OrderStatusEnum',
        'description' => 'The types of demographic elements',
        'values' => [
            'NEWHOPE' => '0',
            'EMPIRE' => '1',
            'JEDI' => '2',
        ],
    ];

}
