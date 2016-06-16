<?php

echo "

	<center>
	<div id = \"view\">
	<div id = \"signup\">
	<h2>Sign Up Below!</h2><br/>
		<form id = \"signup\" method = \"POST\"	action = \"studentsignup1.php\">
			<input id = \"input\" type = \"text\" name = \"uniCode\" placeholder = \"University Code\" id = \"input\"/><br/><br/>
			<input id = \"input\" type = \"text\" name = \"email\" placeholder = \"Email Address\" id = \"input\"/><br/><br/>
			<input id = \"input\" type = \"text\" name = \"fName\" placeholder = \"Full Name\" id = \"input\"/><br/><br/>
			<input id = \"input\" type = \"password\" name = \"password\" placeholder = \"Password\" id = \"input\"/><br/><br/>
			<input id = \"input\" type = \"password\" name = \"password2\" placeholder = \"Verify Password\" id = \"input\"/><br/>
			<input id = \"submit\" type = \"submit\" id = \"submit\" name = \"submit\" value= \"Continue\"/>
		</form>
	</div>
	</div>
	</center>

";
$submitted = $_POST['submit'];

if (!$submitted) {
	print("Not submitted");
}
else
{
	print("Submitted");
	$connection = mysqli_connect("localhost", "root", "", "unitest" ) or die ("Failed to connect to server : " . mysqli_connect_error());

	$UniversityCode = $_POST['uniCode'];
	$EmailAccount 	= $_POST['email'];
	$FullName 		= $_POST['fName'];
	$Password1 		= hash("sha512", $_POST['password']);
	$Password2 		= hash("sha512", $_POST['password2']);

	if($UniversityCode && $EmailAccount && $FullName && $Password1 && $Password2)
	{
		//TODO - Impliment university code
		//$universityCode = 

		if($Password1 == $Password2)
		{
			print("Passworrd Matched\n");

			$DatabaseRequest = "INSERT INTO students (FullName, Password, Email) VALUES ('$FullName', '$Password1', '$EmailAccount')";
			mysqli_query($connection, $DatabaseRequest);

			setcookie("current_user", $EmailAccount, time() + 24 * 60 * 60, "/");

			header("Location: studentsignup2.php");

		}
		else
		{
			print("Password not matched!");
		}
	}
}


?>