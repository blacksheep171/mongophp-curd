<?php
require_once __DIR__ . '/vendor/autoload.php';

// $collection = (new MongoDB\Client)->test->users;
// $updateResult = $collection->updateOne(
//     ['username' => 'admin2'],
//     ['$set' => ['name' => 'Super Admin']]
// );

// printf("Matched %d document(s)\n", $updateResult->getMatchedCount());
// printf("Modified %d document(s)\n", $updateResult->getModifiedCount());

// replace one
$collection = (new MongoDB\Client)->test->users;

$updateResult = $collection->replaceOne(
    ['username' => 'admin2'],
    [
        'username' => 'Admin3',
        'email' => 'admin3@gmail.com',
        'name' => 'Admin 3'
        ]
);
printf("Matched %d document(s)\n", $updateResult->getMatchedCount());
printf("Modified %d document(s)\n", $updateResult->getModifiedCount());
