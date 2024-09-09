<?php
require_once __DIR__ . '/vendor/autoload.php';

$username = $_POST['username'] ?? '';
$email = $_POST['email'] ?? '';
$name = $_POST['name'] ?? '';
// insert
$collection = (new MongoDB\Client)->test->users;
$insertOneResult = $collection->insertOne([
    'username' => $username,
    'email' => $email,
    'name' => $name,
]);

header("Location: index.php");
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