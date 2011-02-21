<?php
/* Comment posting logic. Run-of-the-mill database insertion, only notable thing being the comment text length limit imposed
   by the substr() function on row 13 */
$rule = array(
	'carid' => array('required' => true),
	'manufacturerid' => array('required' => true),
	'commenttext' => array('required' => true),
	'usernickname' => array('required' => true));
if(($data = Atomik::filter($_POST, $rule)) === false){
	Atomik::flash('Invalid form', 'error');
	Atomik::redirect('carpage&carid='.$_POST['carid']);
}
$data['commenttext'] = substr($data['commenttext'],0,100);
Atomik_DB::insert('carcomment', $data);
Atomik::redirect('carpage&carid='.$_POST['carid']);
