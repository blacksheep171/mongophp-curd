<?php

require_once __DIR__ . '/vendor/autoload.php';
// delete
$bookId = $_GET['bookId'] ?? '';
$mongo = (new MongoDB\Client)->test;
$authors = $mongo->authors;
$books = $mongo->books;

// Perform the aggregation to find documents to delete
$pipeline = [
    [
        '$lookup' => [
            'from' => 'authors',
            'localField' => 'authorId',
            'foreignField' => 'authorId',
            'as' => 'authorDetails'
        ]
    ],
    [
        '$unwind' => '$authorDetails'
    ],
    [
        '$match' => [
            'bookId' => $bookId
        ]
    ]
];
// Get the documents that match the criteria
$document = $books->aggregate($pipeline);
// $deleteUser = $collection->deleteOne(['name' => $username]);
$deleteUser = $document->deleteOne(['bookId' => $bookId]);
header('location: view.php');