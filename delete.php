<?php

require_once __DIR__ . '/vendor/autoload.php';
// delete
// $username = $_GET['username'] ?? '';
$id = $_GET['_id'] ?? '';
$objectId = new MongoDB\BSON\ObjectId($id) ?? null;
$collection = (new MongoDB\Client)->test->users;
// $deleteUser = $collection->deleteOne(['name' => $username]);
$deleteUser = $collection->deleteOne(['_id' => $objectId]);
header('location: index.php');

