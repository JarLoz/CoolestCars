<?php
/* The bread and butter of the admin controls, the login checking management. The checkValidLogin() function
   returns true or false depending on whether an user currently has admin privileges. The allowed() function
   does basically the same, but instead of returning true or false, it bounces the user back to the home page
   if the user doesn't have needed privileges for the page. */
function checkValidLogin(){
	if(isset($_SESSION['adminlogin'])){
		$loginname = $_SESSION['loginname'];
		$password = $_SESSION['password'];
		$search = A("db: select * from admin where adminnick='$loginname'");
		$row = $search->fetch();
		if((empty($row)) === false){
			if($password == $row['adminpassword']){
				return true;
			}
		}
	}
	return false;
}

function allowed(){
	if(checkValidLogin())
		return;
	Atomik::redirect('home');
	return;
}
