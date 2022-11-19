<?php
require_once 'db.php';
require_once '3_PDO_class.php';

//$emp = new Employee('Aya', '24', 'aswan, egypt', '1.2', '5000');
////var_dump($emp->create());
//$Majjd = Employee::getByPK(2);
//$Majjd->setName('Majd K');
//var_dump($Majjd->save());

$emps = Employee::get(
    'SELECT name, age FROM employees WHERE age = :age',
    array(
        'age' => array(Employee::DATA_TYPE_INT, '25')
    )
);

var_dump($emps);