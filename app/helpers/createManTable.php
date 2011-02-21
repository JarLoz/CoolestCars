<?php
/* A similar function to createCarTable(), but for the manufacturer ranking page. */
function createManTable($manufacturers){
	foreach($manufacturers as $man){
		echo '<tr>';
		echo '<td><a href="'.Atomik::url('manpage', array(manufacturerid => $man['manufacturerid'])).'" title="'.$man['mname'].'">'.$man['mname'].'</a></td>';
		echo '<td>'.(int)$man['score'].'</td>';
		echo '<tr>';
	}
}
