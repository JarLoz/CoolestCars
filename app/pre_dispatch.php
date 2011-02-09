<?php
if(isset($_SESSION['adminlogin'])){
	$loginname = $_SESSION['loginname'];
	$logininfo = "Logged in as $loginname";
}else{
	$logininfo = "Not logged in";
}
