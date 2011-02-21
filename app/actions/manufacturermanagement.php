<?php
/* Login check, database search. It's a quite common pattern on this application. */
Atomik::needed('logincheck');
allowed();

$manufacturers = A('db: select manufacturerid as manid, name from manufacturer');
$manarray = $manufacturers->fetchAll();
