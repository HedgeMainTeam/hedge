<?php
include("connect.php");

if(isset($_POST['submit'])){
    $email = $_COOKIE['user_signup'];
	$id = $_POST['cCode'];
	$pass = hash("sha512", $_POST['password']);
	$pass2 = hash("sha512", $_POST['password2']);

	if($id && $pass && $pass2){
		if($pass == $pass2){
			$sql = "update clients set password = '$pass' where email = '$email'";

			$query = mysqli_query($connection, $sql);
			if($query){
				echo "Done";
				header("Location:clientSignup2.php");
			}

			else{
				print("Update failed : error " . $connection->error);
			}
		}
	}


}

echo"

	<center>
	<div id = \"view\">
	<div id = \"signup\">
	<br/><br/><br/><h2>Create Your Account</h2><br/>
		<form id = \"signup\" method = \"POST\"	action = \"form2.php\">
			<input id = \"input\" type = \"text\" name = \"cCode\" placeholder = \"Client Code\" id = \"input\"/><br/><br/>
			<input id = \"input\" type = \"password\" name = \"password\" placeholder = \"Password\" id = \"input\"/><br/><br/>
			<input id = \"input\" type = \"password\" name = \"password2\" placeholder = \"Verify Password\" id = \"input\"/><br/><br/>
			<input id = \"submit\" type = \"submit\" id = \"submit\" name = \"submit\" value=\"Continue\"/>
		</form>
	</div>
	</div>
	</center><br/><br/><br/>
";

?>