<?php

require_once __DIR__ . '/vendor/autoload.php';

// find

// $collection = (new MongoDB\Client)->test->users;
// $document = $collection->findOne(['email' => 'hieuadmin@gmail.com']);
// echo "<pre>";
// print_r($document);

// find many

$collection = (new MongoDB\Client)->test->users;
// $collection = (new MongoDB\Client)->test->authors;

$user = $collection->find();

foreach ($user as $document) {
    // echo $document['username'], "\n";
    echo '<pre>';
    print_r($document);
}
