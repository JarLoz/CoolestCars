<?php
/* Nothing much here either. If a person is logged in, his session is destroyed. */
if(isset($_SESSION['adminlogin'])){
	session_destroy();
}
Atomik::redirect('home');
