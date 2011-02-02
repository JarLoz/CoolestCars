<?php

Atomik::set(array(

	'app/layout' => '_layout',

	'styles' => array('assets/css/main.css')
    
));

Atomik::set('plugins/Db', array(
	'dsn' => 'pgsql:host=localhost;dbname=coolcars',
	'username' => 'webapp',
	'password' => ''
));
