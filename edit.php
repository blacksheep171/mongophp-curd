<?php

require_once __DIR__ . '/vendor/autoload.php';

// find
$collection = (new MongoDB\Client)->test->users;
$id = $_GET['_id'] ?? '';
$objectId = new MongoDB\BSON\ObjectId($id) ?? null;
$user = $collection->findOne(['_id' => $objectId]);
// $user = $collection->findOne(['username' => 'Hieu']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <title>MongoDB Edit</title>
</head>
<style type="text/css">
.mongo-container {
    margin: 0 auto;
    padding: 20px;
    width: 800px;
}
</style>
</head>
<body>
<div class="mongo-container">
    <h2>Edit MongoDB - UUID: <?=$user->_id;?></h2>
    <form class="form-horizontal" action="/update.php" method="POST">
      <input type="hidden" class="form-control" id="_id" name="_id" value="<?=$user->_id;?>"/>
      <div class="mb-3">
          <label for="username" class="form-label">User Name</label>
          <input type="text" class="form-control" id="username" name="username" value="<?=$user->username;?>" placeholder="Enter User Name"/>
      </div>
      <div class="mb-3">
          <label for="email" class="form-label">Email address</label>
          <input type="email" class="form-control" id="email" name="email" aria-describedby="email"  value="<?=$user->email;?>" placeholder="Enter Email Address"/>
      </div>
      <div class="mb-3">
          <label for="name" class="form-label">Name</label>
          <input type="text" class="form-control" id="name" name="name" value="<?=$user->name;?>" placeholder="Enter Name"/>
      </div>
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
</body>
</html>