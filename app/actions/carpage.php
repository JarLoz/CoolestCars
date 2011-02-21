<?php
/* Just some database searches using the GET parameter. The basic information of the car as well as the comments
   associated with the car are fetched from the database using the carid */
if($_GET['carid']){
	$search = A('db:select * from carpage where carid = '.$_GET['carid']);
	$car = $search->fetch();
	if(empty($car)){
		Atomik::flash('No such car', 'error');
		Atomik::redirect('home');
	}
	$search = A('db:select * from carcomment_ordered where carid = '.$car['carid']);
	$comments = $search->fetchAll();
}
else{
	Atomik::redirect('home');
}

