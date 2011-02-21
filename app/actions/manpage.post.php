<?php
/* Also exactly the same as carpage.post.php. The pages are basically identical. I might've even saved some code if I'd done them
   as one page. But then, this whole exercise has been a learning experience unlike anything else. It is a good thing to
   save certain oversights so you can retrospectively follow your progress. Am I right? */
$rule = array(
	'manufacturerid' => array('required' => true),
	'commenttext' => array('required' => true),
	'usernickname' => array('required' => true));
if(($data = Atomik::filter($_POST, $rule)) === false){
	Atomik::flash('Invalid form', 'error');
	Atomik::redirect('manpage&manufacturerid='.$_POST['manufacturerid']);
}
$data['commenttext'] = substr($data['commenttext'],0,100);
Atomik_DB::insert('manufacturercomment', $data);
Atomik::redirect('manpage&manufacturerid='.$_POST['manufacturerid']);
