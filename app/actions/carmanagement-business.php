<?php
Atomik::needed('logincheck');
allowed();
if($_POST['add']){
	$rule = array(
		'name' => array('required' => true),
		'manufacturerkey' => array('required' => true),
		'imagename' => array('required' => true));
	if(($data = Atomik::filter($_POST, $rule)) === false) {
		Atomik::flash('Invalid form', 'error');
		Atomik::redirect('carmanagement');	
	}
	Atomik_DB::insert('car', $data);

}
elseif($_POST['delete']){
	$rule = array(
		'carid' => array('required' => true));
	if(($data = Atomik::filter($_POST, $rule)) === false){
		Atomik::flash('Invalid form', 'error');
		Atomik::redirect('carmanagement');	
	}
	echo "Trying to delete carid";
	echo $data['carid'];
	Atomik_DB::delete('car', $data);
}

Atomik::redirect('carmanagement');
