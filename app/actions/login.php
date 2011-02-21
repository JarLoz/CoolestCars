<?php
/* Another simple script. If someone is already logged in, but wanders to the login page, he is redirected to the admin home page */
Atomik::needed('logincheck');
if(checkValidLogin()){
	Atomik::redirect('adminhome');
}
