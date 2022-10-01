<?php

//Establish a connection to your db server

// $dsn data source name : mysql://hostname=localhost;dbname=php_pdo
try {

    $connection = new PDO('mysql://hostname=localhost;dbname=php_pdo', 'root', '', array(
        //PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAME UTF8',
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ));
/*echo '<pre>';
    var_dump($connection->exec('SELECT * FROM employees;'));
    echo '<pre>';

    var_dump($connection->query('SELECT * FROM employees;'));
    echo '<pre>';
    tryMe(7554 );*/
} catch (PDOException $e){
    // echo $e->getMessage() ;
    echo 'Sorry you may not have access the database server';
}
if (isset($_POST['submit'])) {
    $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
    if ($connection->exec('INSERT INTO employees SET name ="' . $name. '"')){
        $message = 'Employee, ' . $name .' inserted successfully';
    } else {
        $message = 'Error inserted employee, ' . $name;
    }
}
//var_dump($connection);
//$name = 'Khalil';
/*if ($connection->exec('INSERT INTO employees SET name = "'. $name .'"')){
    echo 'Employee '. $name .' has been inserted successfully';
}*/
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PDO</title>
        <style type="text/css">
            *{
                margin: 0;
                padding: 0;
                border: 0;
                outline: none;
                line-height: 1.2;
                font-size: 1em;
            }
            form.app_form{
                width: 300px;
                margin: 100px auto 0 auto;
            }

            form.app_form fieldset{
                padding: 10px;
                background: #f1f1f1;
                border: solid 1px #e4e4e4;
            }
            form.app_form fieldset legend{
                font: 1em 'Arial, Helvetice, sans-serif';
                color: #666;
                background: #e4e4e4;
                padding: 5px;
            }
            form.app_form table {
                width: 100%;
            }
            form.app_form label {
                font-family: Arial;
                color: #666666;
            }
            form.app_form table tr td input[type=text]{
                width: 90%;
                padding: 2%;
                font-size: 1em;

            }
            form.app_form table tr td input[type=submit]{
                padding: 8px;
                border-radius: 3px;
                background: darkcyan;
                color: #fff;
                font-family: Arial;
                font-size: 1em;
            }
            form.app_form table tr td{
                padding: 4px;
            }
        </style>
</head>
<body>
<form class="app_form" method="POST" enctype="application/x-www-form-urlencoded">
    <p class="message"><?= isset($message) ? $message : ''?></p>
    <fieldset>
        <legend>Employee Information</legend>
    <table>
        <tr>
            <label for="name">Employee Name</label>
        </tr>
        <tr>
            <td>
                <input type="text" name="name" placeholder="Write the employee name here">
            </td>
        </tr>
        <tr>
            <td>
                <input type="submit" name="submit" value="save">
            </td>
        </tr>
    </table>
    </fieldset>
</form>

</body>
</html>

