<?php
if($_GET['manufacturerid']){
	$search = A('db:select * from manufacturer where manufacturerid = '.$_GET['manufacturerid']);
	$man = $search->fetch();
	if(empty($man)){
		Atomik::flash('No such manufacturer', 'error');
		Atomik::redirect('home');
	}
	$search = A('db:select * from manufacturercomment_ordered where manufacturerid = '.$man['manufacturerid']);
	$comments = $search->fetchAll();
}
else{
	Atomik::redirect('home');
}

