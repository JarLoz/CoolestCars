<?php
/* The page for handling adding and removing cars from the database. After login check, the POST array is examined for input.
   Depending on the input a new car is either added to the database or removed from the database. Notable is that also the comments
   about the car are deleted, something which didn't happen in early versions :) */
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
	Atomik_DB::delete('car', $data);
	Atomik_DB::delete('carcomment', $data);
}

Atomik::redirect('carmanagement');
