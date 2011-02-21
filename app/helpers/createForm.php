<?php
/* A function for creating a html form for the home page. This form is then sent on to home.post.php when an user clicks on a car. */
function createForm($formname, $winner, $loser){
	echo "<form id=\"";
	echo $formname;
	echo "\" method=\"post\" action=\"\">
	<input type=\"hidden\" name=\"winner\" value=\"";
	echo $winner['carid'];
	echo "\" />
	<input type=\"hidden\" name=\"loser\" value=\"";
    echo $loser['carid'];
    echo "\" /></form>";
}
?>
