<?php

require_once __DIR__ . '/vendor/autoload.php';
// delete
$collection = (new MongoDB\Client)->test->users;

$deleteUser = $collection->deleteOne(['name' => 'Bob']);

printf("Deleted %d document(s)\n", $deleteUser->getDeletedCount());

