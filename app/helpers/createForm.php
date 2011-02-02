<?php
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
