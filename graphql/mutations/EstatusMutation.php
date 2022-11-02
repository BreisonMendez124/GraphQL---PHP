<?php

use app\Models\Estatus;
use GraphQL\Type\Definition\Type;

$estatusMutation = [
    'addEstatus' => [
        'type' => $estatusType,
        'args' => [
            'descripcion' => Type::nonNull(Type::string()),
        ],
        'resolve' => function($root, $args) {
            $estatus = new Estatus([
                'descripcion' => $args['descripcion']
            ]);

            $estatus->save();
            return $estatus->toArray();
        }
    ]
];