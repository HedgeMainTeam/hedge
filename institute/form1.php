<?php
include("connect.php");
$submitted = $_POST['submit'];

if(!$submitted){
	//echo"Nothing has been submitted";
}

else{


	$name = $_POST['uniName'];
	$pref = $_POST['prefix'];
	$contact = $_POST['pContact'];
	$email = $_POST['email'];
	$number = $_POST['pNumber'];
	$address = $_POST['address'];
	$pcontact = $pref. ". " .$contact;

	if($name && $pref && $contact && $email && $number && $address){
		$sql = "insert into universities (name , pcontact, number, email, address) values ('$name', '$pcontact','$number', '$email', '$address')";
		$query = mysqli_query($connection,$sql);
		if($query){
			echo "Done";
			header("Location:signup2.php");
		}

		else{
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
			<input id = \"input\" type = \"text\" name = \"uniName\" placeholder = \"Institute Name\" id = \"input\"/><br/><br/>
			<select id = \"input\" name=\"prefix\">
                <option value=\"Mr\">Mr</option>
                <option value=\"Ms\">Ms</option>
                <option value=\"Mrs\">Mrs</option>
            </select><br/><br/>
            <input id = \"input\" type = \"text\" name = \"pContact\" placeholder = \"Person of Contact (Full Name)\" id = \"input\"/><br/><br/>
			<input id = \"input\" type = \"text\" name = \"email\" placeholder = \"E-Mail Address\" id = \"input\"/><br/><br/>
			<input id = \"input\" type = \"text\" name = \"pNumber\" placeholder = \"Contact Number\" id = \"input\"/><br/><br/>
			<input id = \"input\" type = \"text\" name = \"address\" placeholder = \"Physical Address\" id = \"input\"/><br/><br/>
			<input id = \"submit\" type = \"submit\" id = \"submit\" name = \"submit\" value= \"Continue\"/>
		</form>
	</div>
	</div>
	</center>

		";

?>