<?php
/* The basic logic behind logging in. Nothing exceptional, the user's password is hashed using MD5 and then checked against the database.
   If a match is found, session variables are initialized and the user is redirected to the admin homepage. */
$rule = array(
	'loginname' => array('required' => true),
	'password' => array('required' =>true)
	);
if(Atomik::filter($_POST, $rule) === false){
	Atomik::flash(A('app/filters/messages'), 'error');
	return;
}
$loginname = $_POST['loginname'];
$password = md5($_POST['password']);
$searchresult = A("db:select * from admin where adminnick='$loginname'");
$datarow = $searchresult->fetch();
if(empty($datarow)){
	Atomik::flash('Invalid login', 'loginfail');
	return;
}elseif ($password != $datarow['adminpassword']){
	Atomik::flash('Invalid login', 'loginfail');
	return;
}else{
	$_SESSION['adminlogin'] = true;
	$_SESSION['loginname'] = $loginname;
	$_SESSION['password'] = $password;
	$_SESSION['adminid'] = $datarow['adminid'];
	Atomik::redirect('adminhome');
}
