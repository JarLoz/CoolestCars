<?php
function printComments($commentarray){
	foreach($commentarray as $comment){
		echo '<p>'.$comment['time'].' <b>'.$comment['usernickname'].':</b> '.$comment['commenttext'].'</p>';
	}
}
