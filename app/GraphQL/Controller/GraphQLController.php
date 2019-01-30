<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/1/29/029
 * Time: 17:53
 */

namespace App\GraphQL\Controller;

use \Rebing\GraphQL\GraphQLController as BaseGraphQLController;

class GraphQLController extends BaseGraphQLController
{
    protected $guard = 'graphql';
}
