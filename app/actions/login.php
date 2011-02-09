<?php
Atomik::needed('logincheck');
if(checkValidLogin()){
	Atomik::redirect('adminhome');
}
