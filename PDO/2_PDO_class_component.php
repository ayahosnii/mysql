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
    <link rel="stylesheet" href="main.css">
</head>
<body>
<div class="wrapper">
    <div class="empform">
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
                        <input type="text" name="name" placeholder="Write the employee name here" required>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="age">Employee Age</label>
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="number" name="age" min="22" max="60" required>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="address">Employee Address</label>
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="text" name="address" placeholder="Write the employee address here">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="salary">Employee Salary</label>
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="number" name="salary" step="0.01" min="1500" max="9000" required>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="tax">Employee Tax (%)</label>
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="number" name="tax" min="1" max="5" required>
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
    </div>
    <div class="employees">
        <table>
            <thead>
            <th>Name</th>
            <th>Age</th>
            <th>Address</th>
            <th>Salary</th>
            <th>Tax (%)</th>
            </thead>
            <tbody>
            <tr>
                <td>Aya</td>
                <td>25</td>
                <td>Cairo</td>
                <td>3000</td>
                <td>0.03</td>
            </tr>
            <tr>
                <td>Aya</td>
                <td>25</td>
                <td>Cairo</td>
                <td>3000</td>
                <td>0.03</td>
            </tr>
            </tbody>
        </table>
    </div>
</div>

</body>
</html>

