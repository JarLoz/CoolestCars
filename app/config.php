<?php

Atomik::set(array(

	'app/layout' => '_layout',

	'styles' => array('assets/css/main.css'),

	'scripts' => array()
    
));
/*This is where the database configuration is done. The default is a database called "coolcars"
with an user named "webapp", but these can be changed for different deployments*/
Atomik::set('plugins/Db', array(
	'dsn' => 'pgsql:host=localhost;dbname=coolcars',
	'username' => 'webapp',
	'password' => ''
));
