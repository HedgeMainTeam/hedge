<?php
include("connect.php");
if(isset($_POST['submit'])) {

	$name = $_POST['cName'];
	$pref = $_POST['prefix'];
	$contact = $_POST['pContact'];
	$email = $_POST['eAddress'];
	$number = $_POST['cNumber'];
	$address = $_POST['cAddress'];
	$pcontact = $pref.". " .$contact;

	if($name && $pref && $contact && $email && $number && $address){

		$sql = "insert into clients (name , pcontact, number, email, address) values ('$name', '$pcontact','$number', '$email', '$address')";
		$query = mysqli_query($connection,$sql);
        setcookie("user_signup", $email, time() + 24 * 60 * 60, "/");

		if($query) {
			echo "Done";
			header("Location:clientSignup1.php");
		} else {
		    print("Update failed : error " . $connection->error);
		}
	}
}


echo"
<center>
	<div id = \"view\">
	<div id = \"signup\">
	<h2>Sign Up Below!</h2><br/>
		<form id = \"signup\" method = \"POST\"	action = \"form1.php\">
			<input id = \"input\" type = \"text\" name = \"cName\" placeholder = \"Client Name\" id = \"input\"/><br/><br/>
			<select id = \"input\" name=\"prefix\">
                <option value=\"Mr\">Mr</option>
                <option value=\"Ms\">Ms</option>
                <option value=\"Mrs\">Mrs</option>
            </select><br/><br/>
            <input id = \"input\" type = \"text\" name = \"pContact\" placeholder = \"Person of Contact\" id = \"input\"/><br/><br/>
			<input id = \"input\" type = \"text\" name = \"eAddress\" placeholder = \"E-Mail Address\" id = \"input\"/><br/><br/>
			<input id = \"input\" type = \"text\" name = \"cNumber\" placeholder = \"Phone Number\" id = \"input\"/><br/><br/>
			<input id = \"input\" type = \"text\" name = \"cAddress\" placeholder = \"Physical Address\" id = \"input\"/><br/><br/>
			<input id = \"submit\" type = \"submit\" id = \"submit\" name = \"submit\" value= \"Continue\"/>
		</form>
	</div>
	</div>
	</center>

";


?>