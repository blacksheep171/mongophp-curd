<?php 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <title>Add new Record</title>
</head>
<body>
<style type="text/css">
.mongo-container {
    margin: 0 auto;
    padding: 20px;
    width: 800px;
}
</style>
<div class="mongo-container">
    <h2>Add New</h2>
    <form class="form-horizontal" action="/insert.php" method="POST">
    <div class="mb-3">
    <div class="mb-3">
        <label for="username" class="form-label">User Name</label>
        <input type="text" class="form-control" id="username" name="username" value="" placeholder="Enter User Name"/>
    </div>
        <label for="email" class="form-label">Email address</label>
        <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp"  value="" placeholder="Enter Email Address"/>
    </div>
    <div class="mb-3">
        <label for="name" class="form-label">Name</label>
        <input type="text" class="form-control" id="name" name="name" value="" placeholder="Enter Name"/>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
</body>
</html>