<?php
$rule = array(
	'carid' => array('required' => true),
	'commenttext' => array('required' => true),
	'usernickname' => array('required' => true));
if(($data = Atomik::filter($_POST, $rule)) === false){
	Atomik::flash('Invalid form', 'error');
	Atomik::redirect('carpage&carid='.$_POST['carid']);
}
Atomik_DB::insert('carcomment', $data);
Atomik::redirect('carpage&carid='.$_POST['carid']);
