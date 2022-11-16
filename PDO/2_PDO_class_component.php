<?php
session_start();
 require_once 'db.php';
 require_once '3_PDO_class.php';



if (isset($_POST['submit'])) {

    $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
    $address = filter_input(INPUT_POST, 'address', FILTER_SANITIZE_STRING);
    $age = filter_input(INPUT_POST, 'age', FILTER_SANITIZE_NUMBER_INT);
    $salary = filter_input(INPUT_POST, 'salary', FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
    $tax = filter_input(INPUT_POST, 'tax', FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);

    $params = array(
        ':name' => $name,
        ':age' => $age,
        ':address' => $address,
        ':salary' => $salary,
        ':tax' => $tax
    );

    if (isset($_GET['action']) && $_GET['action'] == 'edit' && isset($_GET['id'])) {
        $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
        $sql = 'UPDATE employees SET name = :name,address = :address, salary = :salary, tax = :tax , age = :age WHERE id = :id';
        $params[':id'] = $id;
    } else {
        $sql = 'INSERT INTO employees SET name = :name,address = :address, salary = :salary, tax = :tax , age = :age';
    }
    //$employee = new Employee($name, $age, $address, $salary, $tax);
    /*$employee->name = $name;
    $employee->age = $age;
    $employee->address = $address;
    $employee->salary = $salary;
    $employee->tax = $tax;*/


    //Inserting or updating employees
    /*$sql = 'INSERT INTO employees SET name ="' . $name . '",
                   address = "' . $address .'", salary = ' . $salary . ',
                  tax = ' . $tax .', age = ' . $age;*/

    $stm = $connection->prepare($sql);

//    if ($connection->exec($sql /*'INSERT INTO employees SET name ="' . $name. '"'*/)){
//        $message = 'Employee, ' . $sql .' inserted successfully';
//    } else {
//        $message = 'Error inserted employee, ' . $name;
//    }

    if ($stm->execute($params) === true){
        $_SESSION['message'] = 'Employee, ' . $name .' saving successfully';
        header('Location: http://localhost:63342/PDO/2_PDO_class_component.php?_ijt=c7o7hvvu33t55g6lam2mp9p8q5&_ij_reload=RELOAD_ON_SAVE');
        session_write_close();
        exit;
    } else {
        $error = true;
        $_SESSION['message'] = 'Error saving employee, ' . $name;
    }

}

// Update
if (isset($_GET['action']) && $_GET['action'] == 'edit' && isset($_GET['id'])) {
    $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
    if ($id > 0) {
        $sql = 'SELECT * FROM employees WHERE id = :id';
        $result = $connection->prepare($sql);
        $foundUser = $result->execute(array(':id' => $id));
        if ($foundUser === true)
        {
            $user =  $result->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Employee', array('name', 'age', 'address', 'salary', 'tax'));
            $user = array_shift($user);
        }
    }
}

// Delete
if (isset($_GET['action']) && $_GET['action'] == 'delete' && isset($_GET['id'])) {
    $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
    if ($id > 0) {
        $sql = 'DELETE FROM employees WHERE id = :id';
        $result = $connection->prepare($sql);
        $foundUser = $result->execute(array(':id' => $id));
        if ($foundUser === true)
        {
            $_SESSION['message'] = 'Employee, ' . $name .' DELETED successfully';
        header('Location: http://localhost:63342/PDO/2_PDO_class_component.php?_ijt=c7o7hvvu33t55g6lam2mp9p8q5&_ij_reload=RELOAD_ON_SAVE');
            session_write_close();
            exit;
        }
    }
}

// Reading from database back

$sql = 'SELECT * FROM employees';
$stmt = $connection-> query($sql);
$result = $stmt->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Employee', array('name', 'age', 'address', 'salary', 'tax'));
$result = (is_array($result) && !empty($result)) ? $result : false;

//$result = $stmt->fetchAll(PDO::FETCH_BOTH;


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
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet">
</head>
<body>
<div class="wrapper">
    <div class="empform">
        <form class="app_form" method="POST" enctype="application/x-www-form-urlencoded">
            <fieldset>
                <legend>Employee Information</legend>
                <?php if (isset($_SESSION['message'])) { ?>
                <p class="message <?= isset($error) ? 'error' : '' ?>"> <?= $_SESSION['message'] ?></p>
                <?php
                    unset($_SESSION['message']);
                }
                ?>
                <table>
                <tr>
                    <label for="name">Employee Name</label>
                </tr>
                <tr>
                    <td>
                        <input type="text" id="name" name="name" placeholder="Write the employee name here" value="<?= isset($user) ? $user->name : '' ?>" required>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="age">Employee Age</label>
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="number" id="age" name="age" min="22" max="60" value="<?= isset($user) ? $user->age : '' ?>" required>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="address">Employee Address</label>
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="text" id="address" name="address" placeholder="Write the employee address here" value="<?= isset($user) ? $user->address : '' ?>">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="salary">Employee Salary</label>
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="number" id="salary" name="salary" step="0.01" min="1500" max="9000" value="<?= isset($user) ? $user->salary : '' ?>" required>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="tax">Employee Tax (%)</label>
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="number" id="tax" name="tax" step="0.01" min="1" max="5" value="<?= isset($user) ? $user->tax : '' ?>" required>
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
            <th>Control</th>
            </thead>
            <tbody>
            <?php
                if (false !== $result) {
                    foreach ($result as $employee) {
                      ?>
                     <tr>
                    <td><?= $employee->name?></td>
                    <td><?= $employee->age?></td>
                    <td><?= $employee->address?></td>
                    <td><?= $employee->calculateSalary()?> LE</td>
                    <td><?= $employee->tax?></td>
                    <td>
                        <a href="?action=edit&id=<?= $employee->id?>"><i class="fa fa-edit"></i></a>
                        <a href="?action=delete&id=<?= $employee->id?>" onclick="if (!confirm('Do you want to delete this employee')) return false"><i class="fa fa-times"></i></a>
                    </td>
                    </tr>

            <?php
                    }
                 } else {
            ?>
            <td colspan="5"><p>Sorry no employees in this list</p></td>
            <?php
                }
            ?>

            </tbody>
        </table>
    </div>
</div>

</body>
</html>

