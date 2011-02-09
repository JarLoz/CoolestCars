<?php
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
	Atomik::redirect('adminhome');
}
