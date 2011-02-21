<?php
/* Quite similar to the carmanagement-business.php. Only difference is that when deleting a manufacturer,
   also the cars and comments associated with those cars are deleted. A car cannot exist without a manufacturer,
   is the reasoning behind this logic. */
Atomik::needed('logincheck');
allowed();
if($_POST['submit'] == 'add'){
	$rule = array('name' => array('required' => true),
		'imagename' => array('required' => true));
	
	if(($data = Atomik::filter($_POST, $rule)) === false) {
		Atomik::flash('Invalid form', 'error');
		Atomik::redirect('manufacturermanagement');
	}
	Atomik_DB::insert('manufacturer', $data);
}elseif ($_POST['submit'] == 'delete'){
	$rule = array('manufacturerkey' => array('required' => true));
	if(($data = Atomik::filter($_POST, $rule)) === false){
		Atomik::flash('Invalid form', 'error');
		Atomik::redirect('manufacturermanagement');
	}
	Atomik_DB::delete('car', $data);
	$data = array('manufacturerid' => $data['manufacturerkey']);
	Atomik_DB::delete('manufacturer', $data);
	Atomik_DB::delete('carcomment', $data);
	Atomik_DB::delete('manufacturercomment', $data);
}
Atomik::redirect('manufacturermanagement');


