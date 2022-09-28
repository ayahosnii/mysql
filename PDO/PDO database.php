<?php

//Establish a connection to your db server

// $dsn data source name : mysql://hostname=localhost;dbname=php_pdo
try {

    $connection = new PDO('mysql://hostname=localhost;dbname=php_pdo', 'root', '', array(
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION

    ));
echo '<pre>';
    var_dump($connection->exec('SELECT * FROM employees;'));
    echo '<pre>';
    tryMe(7554 );
} catch (PDOException $e){
    // echo $e->getMessage() ;
    echo 'Sorry you may not have access the database server';
}

//var_dump($connection);
var_dump($connection);


function tryMe($var)
{
    if ($var > 2) {
        echo 'Yes';
    } else {
        throw new Exception('Sorry you provided a wrong number');
    }
}

