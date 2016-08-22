<?php
	error_reporting(0);

	if($_COOKIE['current_user']) {
		setcookie("current_user", "", time() - 3600, "/");
	}
	header("Location: index.php");
?>