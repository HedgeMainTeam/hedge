
<?php

include("connect.php");
$submit = $_POST['submit'];
if(!$submit){
echo "Nothing";
}

else{
    $email = $_POST['address'];

    $sql = "select * from instructors where email = '$email'";
    $query = mysqli_query($connection, $sql);
    if(!$query){
    echo "Email not found";
}

    else{
       $data = mysqli_fetch_array($query);
       $pass = $data['password'];
       $password = hash("sha512", $_POST['password']);
       if($pass == $password){
       setcookie("current_user", $email, time() + 24 * 60 * 60, "/");
       header("Location:insert.php");
}

else{
    echo "Sorry, Password is wrong";
}
       
}
}
echo "

<center>
	<div id = \"view\">
		<div id = \"select1\">
		<div id = \"select2\">
		<form id = \"login\" method = \"POST\"	action = \"loginform.php\">
			<input id = \"input\" type = \"text\" name = \"address\" placeholder = \"Email Address\" id = \"input\"/><br/><br/>
			<input id = \"input\" type = \"password\" name = \"password\" placeholder = \"Password\" id = \"input\"/><br/>
			<input id = \"submit\" type = \"submit\" id = \"submit\" name =\"submit\" value= \"Submit\"/><br/><br/>
			<a href = \"lectSignup.php\">Click here to Sign Up</a>
		</form>
		</div>
		</div>
	</div>
</center><br/><br/><br/>

";
?>