<?php
/*	setcookie('remember', NULL, -1);*/
	session_unset();
	session_destroy();

	header('Location:'.URL.'login');
	exit;
