<?php
/* Login check and database fetching for user management page */
Atomik::needed('logincheck');
allowed();
$admins = A('db:select adminid, adminnick from admin');
$adarray = $admins->fetchAll();
