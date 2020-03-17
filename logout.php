<?php
	session_start();
	session_destroy();
	//Where the user will be redirected to upon logging out
	header('Location: login.php');
?>
