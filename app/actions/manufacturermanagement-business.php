<?php
Atomik::needed('logincheck');
allowed();
if($_POST['add']){
	$rule = array('name' => array('required' => true),
		'imagename' => array('required' => true));
	
	if(($data = Atomik::filter($_POST, $rule)) === false) {
		Atomik::flash('Invalid form', 'error');
		Atomik::redirect('manufacturermanagement');
	}
	Atomik_DB::insert('manufacturer', $data);
}elseif ($_POST['delete']){
	$rule = array('manufacturerkey' => array('required' => true));
	if(($data = Atomik::filter($_POST, $rule)) === false){
		Atomik::flash('Invalid form', 'error');
		Atomik::redirect('manufacturermanagement');
	}
	Atomik_DB::delete('car', $data);
	Atomik_DB::delete('manufacturer', $data);
}
Atomik::redirect('manufacturermanagement');


