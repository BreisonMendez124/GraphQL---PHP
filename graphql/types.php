<?php

use app\Models\User;
use GraphQL\Type\Definition\ObjectType;
use GraphQL\Type\Definition\Type;

$userType = new ObjectType([
    'name' => 'User',
    'description' => 'Prueba Tecnica Back',
    'fields' => function() use(&$estatusType){
        return [
            'id' => Type::int(),
            'usuario' => Type::string(),
            'fecha_creacion' => Type::string(),
            'fecha_actaulizacion' => Type::string(),
            'estatus_id' => [
                "type" => Type::listOf($estatusType),
                "resolve" => function($root,$args){
                    $userId = $root['estatus_id'];
                    $user = User::where('id',$userId)->with(['estatus_id'])->first();
                    return $user->estatus->toArray();
                }
            ],
        ]; 
    }
]);

$estatusType = new ObjectType([
    'name' => 'Estatus',
    'description' => 'Tipo de dato para el estatus',
    'fields' => [
        'id' => Type::int(),
        'descripcion' => Type::string()
    ]
]);