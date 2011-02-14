<?php
Atomik::needed('logincheck');
allowed();
$admins = A('db:select adminid, adminnick from admin');
$adarray = $admins->fetchAll();
