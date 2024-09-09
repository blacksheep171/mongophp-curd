<?php
require_once __DIR__ . '/vendor/autoload.php';

// replace one
// $collection = (new MongoDB\Client)->test->users;

// $updateResult = $collection->replaceOne(
//     ['username' => 'admin2'],
//     [
//         'username' => 'Admin3',
//         'email' => 'admin3@gmail.com',
//         'name' => 'Admin 3'
//     ]
// );
// printf("Matched %d document(s)\n", $updateResult->getMatchedCount());
// printf("Modified %d document(s)\n", $updateResult->getModifiedCount());

$collection = (new MongoDB\Client)->test->users;
$document = $_POST ?? [];
// var_dump($document);die;
$id = $document['_id'] ?? '';
$objectId = new MongoDB\BSON\ObjectId($id) ?? null;
$updateResult = $collection->updateOne(
    ['_id' => $objectId],
    ['$set' => [
            'username' => $document['username'],
            'email' => $document['email'],
            'name' => $document['name'],
        ]
    ],
    ["upsert" => false]
);

header('location: index.php');
