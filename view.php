<?php
require_once __DIR__ . '/vendor/autoload.php';

//Create View
$mongo = (new MongoDB\Client)->test;


$authors = $mongo->authors;
$books = $mongo->books;

// Perform the aggregation to join `books` with `authors`
$pipeline = [
   [
      '$lookup' => [
           'from' => 'authors',  // The collection to join
           'localField' => 'authorId',  // Field from `books`
           'foreignField' => 'authorId',  // Field from `authors`
           'as' => 'authorDetails'  // The new field for joined data
      ]
   ],
   [
      '$unwind' => '$authorDetails'  // Deconstruct the array returned from the lookup
   ],
   [
       '$project' => [  // Specify which fields to include in the output
           'bookId' => 1,
           'bookname' => 1,
           'price' => 1,
           'authorDetails.name' => 1
       ]
   ]
];

// Execute the aggregation pipeline
$result = $books->aggregate($pipeline);
// $result = $authors->aggregate($pipeline);

// Display the results
// foreach ($result as $document) {
//    echo "Book ID: " . $document['bookId'] . "\n";
//    echo "Book Name: " . $document['bookname'] . "\n";
//    echo "Price: " . $document['price'] . "\n";
//    echo "Author: " . $document['authorDetails']['name'] . "\n";
//    echo "---------------------------\n";
// }
?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
   <title>Display View</title>
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
        <h2>Book List</h2>
    </div>    
    <table class="mt-2 mb-2 table table-striped">
        <tr>
            <th>Id</th>
            <th>UUID</th>
            <th>Book Name</th>
            <th>Price</th>
            <th>Author</th>
        </tr>
        <?php $index = 1; ?>
        <?php foreach ($result as $document) : ?>
        
        <tr>
            <td><?= $index; ?></td>
            <td><?= $document->bookId; ?></td>
            <td><?= $document->bookname; ?></td>
            <td><?= $document->price; ?></td>
            <td><?= $document->authorDetails['name']; ?></td>
        </tr>
        <?php $index++; ?>
        <?php endforeach; ?>
    </table>
</div>
</body>
</html>
