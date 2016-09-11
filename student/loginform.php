
<?php
include("connect.php");

echo "

<center>
	<div id = \"view\">
		<div id = \"select1\">
		<div id = \"select2\">
		<form id = \"login\" method = \"POST\"	action = \"index.php\" name - \"myForm\" >
			<input id = \"input\" type = \"text\" name = \"address\" placeholder = \"Email Address\" id = \"input\"/><br/><br/>
			<input id = \"input\" type = \"password\" name = \"password\" placeholder = \"Password\" id = \"input\"/><br/>";
            if(isset($_POST['submit'])){
                $address = $_POST['address'];
                $password = hash("sha512", $_POST['password']);

                $sql = "select * from students where Email = '$address'";
                $query = mysqli_query($connection, $sql);
                if($query){
                    $data = mysqli_fetch_array($query);
                    $stdPass = $data['Password'];
                    if($password == $stdPass){
                        setcookie("current_user", $address, time() + 24 * 60 * 60, "/");
                        header("Location:feed.php");
                    }

                else{
                    echo "<br/><br/>Passwords Mismatch.";
                }
            }

            else if(mysqli_num_rows($query) == 0){
                 echo "A User with the email wasn't found.";
            }

        else{
            echo $connection->error;
        }

        }
			echo"<input id = \"submit\" type = \"submit\" id = \"submit\" name =\"submit\" value= \"Submit\"/><br/><br/>
			<a href = \"studentsignup1.php\">Click here to Sign Up</a>
		</form>
		</div>
		</div>
	</div>
</center>

";
?>