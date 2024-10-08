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

$users = $collection->find();

// foreach ($users as $document) {
    // echo $document['username'], "\n";
//     echo '<pre>';
    // print_r($document);
// }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <title>MongoDB</title>
</head>
<style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}
</style>
</head>
<body>
<style type="text/css">
.mongo-container {
    margin: 0 auto;
    padding: 20px;
    width: 1200px;
}
</style>
<div class="mongo-container">
    <div class="title d-flex justify-content-between">
        <h2>Mongo DB Demo</h2>
        <div><a href="/add.php" class="btn btn-success">Add New</a></div>
    </div>    
    <table class="table  table-bordered mt-2 mb-2">
        <tr>
            <th>Id</th>
            <th>UUID</th>
            <th>UserName</th>
            <th>Email</th>
            <th>Name</th>
            <th>Actions</th>
        </tr>
        <?php $index = 1; ?>
        <?php foreach ($users as $user) : ?>
        
        <tr>
            <td><?= $index; ?></td>
            <td><?= $user->_id; ?></td>
            <td><?= $user->username; ?></td>
            <td><?= $user->email; ?></td>
            <td><?= $user->name; ?></td>
            <td>
                <a href="/detail.php?_id=<?=$user->_id?>" class="btn btn-primary mb-2">View</a></br>
                <a href="/edit.php?_id=<?=$user->_id?>" class="btn btn-warning mb-2">Edit</a></br>
                <a href="/delete.php?_id=<?= $user->_id;?>" class="btn btn-danger mb-2">Delete</a>
            </td>
        </tr>
        <?php $index++; ?>
        <?php endforeach; ?>
    </table>
</div>
</body>
</html>