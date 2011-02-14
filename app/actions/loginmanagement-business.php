<?php
Atomik::needed('logincheck');
allowed();
if($_POST['add']){
	$rule = array('adminnick' => array('required' => true),
		'adminpassword' => array('required' => true));
	if(($data = Atomik::filter($_POST, $rule)) === false){
		Atomik::flash('Invalid form', 'error');
		Atomik::redirect('loginmanagement');
	}
	$hashpassword = md5($data['adminpassword']);
	$data['adminpassword'] = $hashpassword;
	$searchresult = A('db: select adminid from admin where adminnick=\''.$data['adminnick'].'\'');
	$datarow = $searchresult->fetch();
	if(empty($datarow)){
		Atomik_DB::insert('admin', $data);
		Atomik::redirect('loginmanagement');
	}
	Atomik::flash('Admin with similar username already exists', 'error');
	Atomik::redirect('loginmanagement');
}elseif($_POST['delete']){
	$rule = array('adminid' => array('required' => true));
	if(($data = Atomik::filter($_POST, $rule)) === false){
		Atomik::flash('Invalid form', 'error');
		Atomik::redirect('loginmanagement');	
	}
	if($data['adminid'] == $_SESSION['adminid']){
		Atomik::flash("Can't delete a session you are currently logged in as", 'error');
		Atomik::redirect('loginmanagement');
	}
	Atomik_DB::delete('admin', $data);
	Atomik::redirect('loginmanagement');
}



