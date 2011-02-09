<?php
if(isset($_SESSION['adminlogin'])){
	session_destroy();
}
Atomik::redirect('home');
