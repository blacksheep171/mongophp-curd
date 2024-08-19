<?php
require_once __DIR__ . '/vendor/autoload.php';

// insert
$collection = (new MongoDB\Client)->test->users;
$insertOneResult = $collection->insertOne([
    'username' => 'admin2',
    'email' => 'admin2@gmail.com',
    'name' => 'Admin 2',
]);
printf("Inserted %d document(s)\n", $insertOneResult->getInsertedCount());
var_dump($insertOneResult->getInsertedId());

//insert many

// $collection = (new MongoDB\Client)->test->users;

// $insertManyResult = $collection->insertMany([
//     [
//         'username' => 'Hieu',
//         'email' => 'hieuadmin@gmail.com',
//         'name' => 'Admin Hieu',
//     ],
//     [
//         'username' => 'Test',
//         'email' => 'test@gmail.com',
//         'name' => 'Test User',
//     ],
// ]);

// printf("Inserted %d document(s)\n", $insertManyResult->getInsertedCount());

// var_dump($insertManyResult->getInsertedIds());