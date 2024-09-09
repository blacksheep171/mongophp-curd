<?php

require_once __DIR__ . '/vendor/autoload.php';

// find
$collection = (new MongoDB\Client)->test->users;
$id = $_GET['_id'] ?? '';
$objectId = new MongoDB\BSON\ObjectId($id) ?? null;
$user = $collection->findOne(['_id' => $objectId]);
// $user = $collection->findOne(['email' => 'hieuadmin@gmail.com']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <title>MongoDB Details</title>
</head>
<style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
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
        <h2>MongoDB Detail</h2>
    </div>    
    <table class="mt-2 mb-2">
        <tr>
            <th>Id</th>
            <th>UUID</th>
            <th>UserName</th>
            <th>Email</th>
            <th>Name</th>
            <th>Actions</th>
        </tr>
        <?php $index = 1; ?>     
        <tr>
            <td><?= $index; ?></td>
            <td><?= $user->_id; ?></td>
            <td><?= $user->username; ?></td>
            <td><?= $user->email; ?></td>
            <td><?= $user->name; ?></td>
            <td>
                <a href="/edit?_id=<?=$user->_id?>" class="btn btn-warning mb-2">Edit</a></br>
                <a href="/delete.php?_id=<?= $user->_id;?>" class="btn btn-danger mb-2">Delete</a>
            </td>
        </tr>
        <?php $index++; ?>
    </table>
</div>
</body>
</html>