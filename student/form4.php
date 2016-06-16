<?php

echo "

	<center>
	<div id = \"view\">
	<div id = \"signup\">
	<h2>Biography</h2>
		<form id = \"signup\" method = \"POST\"	action = \"studentsignup4.php\">
			<textarea id = \"bio\" name=\"bio\" rows=\"20\" cols=\"70\"  placeholder = \"Tell us a Few things about yourself\" ></textarea><br>
			<input id = \"submit\" type = \"submit\" id = \"submit\" name = \"submit\" value= \"Continue\"/>
		</form>
	</div>
	</div>
	</center><br/>

";

$connection = mysqli_connect("localhost", "root", "", "unitest" ) or die ("Failed to connect to server : " . mysqli_connect_error());
$CurrentUserEmail = $_COOKIE['current_user'];

$submitted = $_POST['submit'];

if (!$submitted) {
	print("Not submitted<br/>");
}
else
{
	$Biography = $_POST['bio'];

	if (!$Biography) {
		$Biography = "N/A";
		$Query = "UPDATE students SET Biography = '$Biography' WHERE Email = '$CurrentUserEmail'";

		$updated = mysqli_query($connection, $Query);
		if($updated)
		{
			print("Updated database<br/>");
		}
		else
		{
			print("Update failed : error " . $connection->error);
		}
	}
	else
	{
		$Query = "UPDATE students SET Biography = '$Biography' WHERE Email = '$CurrentUserEmail'";

		$updated = mysqli_query($connection, $Query);
		if($updated)
		{
			print("Updated database<br/>");
		}
		else
		{
			print("Update failed : error " . $connection->error);
		}
	}

	header("Location: summary.php");
}

?>