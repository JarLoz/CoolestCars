<?php
/* A simple helper function for printing out the comments in a given array that has been previously retrieved from the database. 
   Used in carpage.phtml and manpage.phtml */
function printComments($commentarray){
	foreach($commentarray as $comment){
		echo '<p>'.$comment['time'].' <b>'.$comment['usernickname'].':</b> '.$comment['commenttext'].'</p>';
	}
}
