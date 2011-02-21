<?php
/* Another admin page, so admin rights are checked right off the bat. If everything checks out, the manufacturers and cars are loaded from database and placed
   in $carsarray and $manarray variables */
Atomik::needed('logincheck');
allowed();
$manufacturers = A("db: select manufacturerid as manid, name from manufacturer");
$cars = A("db: select carid, name from car");
$carsarray = $cars->fetchAll();
$manarray = $manufacturers->fetchAll();
