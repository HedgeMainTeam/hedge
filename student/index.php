<?php
    //include("logincheck.php");
	include("header.php");
    if(isset($_COOKIE['current_user'])){
        header("Location:notifications.php");
    }
	include("loginform.php");
	include("footer.php");
?>