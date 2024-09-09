<?php
require_once __DIR__ . '/vendor/autoload.php';

// insert 2 collections
$authors = (new MongoDB\Client)->test->authors;

$authorInsert = $authors->insertMany([
    
    [ 
        'authorId' => 1, 
        'name' => 'Hieu Nguyen'
    ],
    [ 
        'authorId' => 2,
        'name' => 'Long Pham'
    ],
    [ 
        'authorId' => 3,
        'name' => 'Thu Tran'
    ],
    [ 
        'authorId' => 4,
        'name' => 'Alex Nguyen'
    ]
]);
 
 $books = (new MongoDB\Client)->test->books;
 $bookInsert = $books->insertMany([
    [ 'bookId' => 1, 'bookname' => 'Book 1', 'authorId' => 1, 'price' => '20$' ],
    [ 'bookId' => 2, 'bookname' => 'Book 2', 'authorId' => 2, 'price' => '10$' ],
    [ 'bookId' => 3, 'bookname' => 'Book 3', 'authorId' => 4, 'price' => '5$' ],
    [ 'bookId' => 4, 'bookname' => 'Book 4', 'authorId' => 3, 'price' => '15$' ],
    [ 'bookId' => 5, 'bookname' => 'Book 5', 'authorId' => 2, 'price' => '20$' ],
    [ 'bookId' => 6, 'bookname' => 'Book 6', 'authorId' => 3, 'price' => '12$' ],
    [ 'bookId' => 7, 'bookname' => 'Book 7', 'authorId' => 4, 'price' => '5$' ],
    [ 'bookId' => 8, 'bookname' => 'Book 8', 'authorId' => 1, 'price' => '10$' ],
    [ 'bookId' => 9, 'bookname' => 'Book 9', 'authorId' => 1, 'price' => '30$' ]
]);


printf("Inserted %d auhtor(s)\n", $authorInsert->getInsertedCount());
printf("Inserted %d book(s)\n", $bookInsert->getInsertedCount());