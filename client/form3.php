<?php

include("connect.php");
$submitted = $_POST['submit'];


if(!$submitted){
	echo "Nothing Yet";
}

else{
    $currentUser = $_COOKIE['current_user'];
	$stdNum = $_POST['stdNum'];
	$sql = "update clients set maxstudents = '$stdNum' where email = '$currentUser'";
	$query = mysqli_query($connection, $sql);
	
	if($query){
		echo "Done";
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
            	<select id= \"input\" name=\"university\">
                <option value=\"universityCode\">Which University would you like to Follow first?</option>
            </select><br/>
            <input id = \"submit\" type = \"submit\" id = \"submit\" name = \"submit\" value= \"Done\"/>
		</form>
	</div>
	</div>
	</center><br/><br/><br/><br/>


";
?>