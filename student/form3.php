<?php
include("connect.php");
echo "

	<center>
	<div id = \"view\">
	<div id = \"signup\">
	<h2>Biography</h2>
		<form id = \"signup\" method = \"POST\"	action = \"form3.php\">
			<textarea id = \"bio\" name=\"bio\" rows=\"20\" cols=\"70\"  placeholder = \"Tell us a Few things about yourself\" ></textarea><br>
			<input id = \"submit\" type = \"submit\" id = \"submit\" name = \"submit\" value= \"Continue\"/>
		</form>
	</div>
	</div>
	</center><br/>

";

$currentUser = $_COOKIE['user_signup'];
if(isset($_POST['submit'])){
    $bio = $_POST['bio'];
    $sql = "update students set Biography = '$bio' where Email = '$currentUser'";
    $query = mysqli_query($connection, $sql);
    if($query){
        setcookie("current_user", $currentUser, time() + 24 * 60 * 60, "/");
        setcookie("user_signup", "", time() - 3600, "/");
        header("Location:profile.php");
    }

    else{
        $connection->error;
    }
}


?>