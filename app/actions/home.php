<?php

$carresult = A('db:carselection');
$allcars = $carresult->fetchAll();
shuffle($allcars);
$leftcar = $allcars[0];
$rightcar = $allcars[1];
