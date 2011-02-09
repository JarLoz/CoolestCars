<?php
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
