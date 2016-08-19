<?php
include("connect.php");
$submitted = $_POST['submit'];

if(!$submitted){
	echo "Nothing";
}

else{
	$id = $_POST['uniCode'];
	$pass = hash("sha512", $_POST['password']);
	$pass2 = hash("sha512", $_POST['password2']);

	if($id && $pass && $pass2){
		if($pass == $pass2){
			$sql = "update universities set password = '$pass' where id = '$id'";

			$query = mysqli_query($connection, $sql);
			if($query){
				echo "Done";
				header("Location:done.php");
			}

			else{
				print("Update failed : error " . $connection->error);
			}
		}
		else{
			echo "Passwords dont match";
		}
	}


}


echo"
<center>
	<div id = \"view\">
	<div id = \"signup\">
	<h2>Create Your Account</h2><br/>
		<form id = \"signup\" method = \"POST\"	action = \"form2.php\">
			<input id = \"input\" type = \"text\" name = \"uniCode\" placeholder = \"University Code\" id = \"input\"/><br/><br/>
			<input id = \"input\" type = \"password\" name = \"password\" placeholder = \"Password\" id = \"input\"/><br/><br/>
			<input id = \"input\" type = \"password\" name = \"password2\" placeholder = \"Verify Password\" id = \"input\"/><br/><br/>
			<input id = \"submit\" type = \"submit\" name = \"submit\" value= \"Done\"/>
		</form>
	</div>
	</div>
	</center><br/>";

	?>