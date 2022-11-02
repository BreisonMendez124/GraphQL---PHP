<?php 


use app\Models\User;
use GraphQL\Type\Definition\ObjectType;
use GraphQL\Type\Definition\Type;

$rootQuery = new ObjectType([
    'name' => 'Query',
    'fields' => [
        'ticket' => [
            'type' => $userType,
            'args' => [
                'id' => Type::int()
            ],
            'resolve' => function($root,$args){
                $user = User::find($args["id"])->toArray();
                return $user;
            }

        ],
        'tickets' => [
            'type' => Type::listOf($userType),            
            'resolve' => function($root, $args) {
                $tickets = User::get()->toArray();
                return $tickets;
            }
        ]
    ]
]);