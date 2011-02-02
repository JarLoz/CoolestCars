<?php

$carresult = A('db:select manufacturer.name as mname, car.name as cname, car.imagename from car inner join manufacturer on car.manufacturerkey = manufacturer.manufacturerid');
$allcars = $carresult->fetchAll();
shuffle($allcars);
