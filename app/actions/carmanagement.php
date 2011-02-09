<?php
Atomik::needed('logincheck');
allowed();
$manufacturers = A("db: select manufacturerid as manid, name from manufacturer");
$cars = A("db: select carid, name from car");
$carsarray = $cars->fetchAll();
$manarray = $manufacturers->fetchAll();
