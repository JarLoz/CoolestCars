<?php
$rule = array(
	'manufacturerid' => array('required' => true),
	'commenttext' => array('required' => true),
	'usernickname' => array('required' => true));
if(($data = Atomik::filter($_POST, $rule)) === false){
	Atomik::flash('Invalid form', 'error');
	Atomik::redirect('manpage&manufacturerid='.$_POST['manufacturerid']);
}
Atomik_DB::insert('manufacturercomment', $data);
Atomik::redirect('manpage&manufacturerid='.$_POST['manufacturerid']);
