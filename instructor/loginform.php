
<?php

include("connect.php");


echo "

<br/><br/><br/><center>
	<div id = \"view\">
		<div id = \"select1\">
		<div id = \"select2\">
		<form id = \"login\" method = \"POST\"	action = \"index.php\">
			<input id = \"input\" type = \"text\" name = \"address\" placeholder = \"Email Address\" id = \"input\"/><br/><br/>
			<input id = \"input\" type = \"password\" name = \"password\" placeholder = \"Password\" id = \"input\"/><br/>";
            if(isset($_POST['submit'])) {
                $email = $_POST['address'];
                $sql = "select * from instructors where email = '$email'";
                $query = mysqli_query($connection, $sql);

                if(!$query) {
                    echo "Email not found";
                } 
                else {
                    $found = mysqli_num_rows($query);
                    $data = mysqli_fetch_array($query);
                    $pass = $data['password'];
                    $password = hash("sha512", $_POST['password']);

                    if($pass == $password) {
                        setcookie("current_user", $email, time() + 24 * 60 * 60, "/");
                        header("Location:pre_insert.php");
                    } 
                    else {
                        echo "Sorry, Password is wrong";
                    }
                }
            }
            echo"  
			<input id = \"submit\" type = \"submit\" id = \"submit\" name =\"submit\" value= \"Submit\"/><br/><br/>
			<a href = \"lectSignup.php\">Click here to Sign Up</a>
		</form>
		</div>
		</div>
	</div>
</center><br/><br/><br/>

";
?>