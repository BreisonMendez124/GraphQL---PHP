<?php

use app\Models\User;
use GraphQL\Type\Definition\Type;

$userMutations = [
    'addTicket' => [
        'type' => $userType,
        'args' => [
            'usuario' => Type::nonNull(Type::string()),
            'fecha_creacion' => Type::nonNull(Type::string()),
            'fecha_actaulizacion' => Type::nonNull(Type::string()),
            'estatus_id' => Type::nonNull(Type::int()),
        ],
        'resolve' => function($root, $args) {
            $user = new User([
                'usuario' => $args['usuario'],
                'fecha_creacion' => $args['fecha_creacion'],
                'fecha_actaulizacion' => $args['fecha_actaulizacion'],
                'estatus_id' => $args['estatus_id'],
            ]);
            $user->save();
            return $user->toArray();
        }
    ],
    'modifyUser' => [
        'type' => $userType,
        'args' => [
            'id' => Type::nonNull(Type::int()),
            'usuario' => Type::string(),
            'fecha_creacion' => Type::string(),
            'fecha_actaulizacion' => Type::string(),
            'estatus_id' => Type::int()
        ],
        'resolve' => function($root, $args) {
            $user = User::find($args['id']);
            $user->usuario = isset($args['usuario']) ? $args['usuario'] : $user->usuario;
            $user->fecha_creacion = isset($args['fecha_creacion']) ? $args['fecha_creacion'] : $user->fecha_creacion;
            $user->fecha_actaulizacion = isset($args['fecha_actaulizacion']) ? $args['fecha_actaulizacion'] : $user->fecha_actaulizacion;
            $user->estatus_id = isset($args['estatus_id']) ? $args['estatus_id'] : $user->estatus_id;            
            $user->save();

            return $user->toArray();
        }
    ],
    'deleteUser' => [
        'type' => $userType,
        'args' => [
            'id' => Type::nonNull(Type::int())
        ],
        'resolve' => function($root, $args) {
            $user = User::find($args['id']);
            $user->delete();
            return $user->toArray();
        }
    ],
];