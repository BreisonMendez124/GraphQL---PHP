<?php

use GraphQL\Type\Definition\ObjectType;

require('mutations/UserMutation.php');
require('mutations/EstatusMutation.php');

$mutations = array();
$mutations += $userMutations;
$mutations += $estatusMutation;

$rootMutation = new ObjectType([
    'name' => 'Mutation',
    'fields' => $mutations
]);