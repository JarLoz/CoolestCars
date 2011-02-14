<?php
Atomik::needed('logincheck');
allowed();

$manufacturers = A('db: select manufacturerid as manid, name from manufacturer');
$manarray = $manufacturers->fetchAll();
