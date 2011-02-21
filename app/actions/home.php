<?php
/* This script fetches the cars from database, shuffles the result and picks the two topmost ones to display on the page */
$carresult = A('db:carselection');
$allcars = $carresult->fetchAll();
shuffle($allcars);
$leftcar = $allcars[0];
$rightcar = $allcars[1];
