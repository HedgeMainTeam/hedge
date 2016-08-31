<?php

include("connect.php");

if(isset($_POST['submit'])){
    $currentUser = $_COOKIE['user_signup'];
	$stdNum = $_POST['stdNum'];
	$sql = "update clients set maxstudents = '$stdNum' where email = '$currentUser'";
	$query = mysqli_query($connection, $sql);
	
	if($query){
		echo "Done";
        setcookie("current_user", $currentUser, time() + 24 * 60 * 60, "/");
        setcookie("user_signup", "", time() - 3600, "/");
		header("Location:profile.php");
	}

	else{
		print("Update failed : error " . $connection->error);
	}
}


echo"

<center>
	<div id = \"view\">
	<div id = \"signup\">
	<br/><br/><h2>Almost Done</h2><br/>
		<form id = \"signup\" method = \"POST\"	action = \"form3.php\">
			<p>Maximum Number of Students You would like to follow<br/><br/>
			<select id = \"input\" name=\"stdNum\">
                <option value=\"5\">5</option>
                <option value=\"10\">10</option>
                <option value=\"15\">15</option>
                <option value=\"20\">20</option>
            </select><br/><br/>
            <input id = \"submit\" type = \"submit\" id = \"submit\" name = \"submit\" value= \"Done\"/>
		</form>
	</div>
	</div>
	</center><br/><br/><br/><br/>


";
?>