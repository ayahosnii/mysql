<?php
session_start();
 require_once 'db.php';
 require_once '3_PDO_class.php';
 require_once 'abstractmodel.php';



if (isset($_POST['submit'])) {

    $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
    $address = filter_input(INPUT_POST, 'address', FILTER_SANITIZE_STRING);
    $age = filter_input(INPUT_POST, 'age', FILTER_SANITIZE_NUMBER_INT);
    $salary = filter_input(INPUT_POST, 'salary', FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
    $tax = filter_input(INPUT_POST, 'tax', FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);



    if (isset($_GET['action']) && $_GET['action'] == 'edit' && isset($_GET['id'])) {
        $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
        if ($id > 0) {
            $user = Employee::getByPK($id);
            $user->name = $name;
            $user->address = $address;
            $user->age = $age;
            $user->salary = $salary;
            $user->tax = $tax;
        }
    } else {
        $user = new Employee($name, $age, $address, $salary, $tax);
    }

    if ($user->save() === true){
        $_SESSION['message'] = 'Employee, ' . $name .' saved successfully';
        header('Location: http://localhost:63342/PDO/2_PDO_class_component.php?_ijt=c7o7hvvu33t55g6lam2mp9p8q5&_ij_reload=RELOAD_ON_SAVE');
        session_write_close();
        exit;
    } else {
        $error = true;
        $_SESSION['message'] = 'Error saved employee, ' . $name;
    }

}

// Update
if (isset($_GET['action']) && $_GET['action'] == 'edit' && isset($_GET['id'])) {
    $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
    if ($id > 0) {
        $user = Employee::getByPK($id);
    }
}

// Delete
if (isset($_GET['action']) && $_GET['action'] == 'delete' && isset($_GET['id'])) {
    $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
    if ($id > 0) {
        $user = Employee::getByPK($id);
        if ($user->delete() === true)
        {
            $_SESSION['message'] = 'Employee, ' . $name .' DELETED successfully';
            header('Location: http://localhost:63342/PDO/2_PDO_class_component.php?_ijt=c7o7hvvu33t55g6lam2mp9p8q5&_ij_reload=RELOAD_ON_SAVE');
            session_write_close();
            exit;
        }
    }
}

// Reading from database back
$result = Employee::getAll();

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

