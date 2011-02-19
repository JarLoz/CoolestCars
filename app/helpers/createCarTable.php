<?php
function createCarTable($cars){
	foreach($cars as $car){
		echo '<tr>';
		echo '<td><a href="'.Atomik::url('carpage', array(carid => $car['carid'])).'" title="'.$car['cname'].'">'.$car['cname'].'</a></td>';
		echo '<td><a href="'.Atomik::url('manpage', array(manufacturerid => $car['manufacturerid'])).'" title="'.$car['mname'].'">'.$car['mname'].'</a></td>';
		echo '<td>'.$car['score'].'</td>';
		echo '<tr>';
	}
}
