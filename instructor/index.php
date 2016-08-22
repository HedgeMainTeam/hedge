<?php

	include("header.php");
    if(isset($_COOKIE['current_user'])){
        header("Location:insert.php");
    }
	include("loginform.php");
	include("footer.php");

?>