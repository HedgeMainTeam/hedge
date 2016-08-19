<?php
include("connect.php");
echo "

	<center>
	<div id = \"view\">
	<div id = \"signup\">
	<h2>Sign Up Below!</h2><br/>
		<form id = \"signup\" method = \"POST\"	action = \"studentsignup1.php\">
			<input id = \"input\" type = \"text\" name = \"uniCode\" placeholder = \"University Code\" id = \"input\"/><br/><br/>
     		<input id = \"input\" type = \"text\" name = \"number\" placeholder = \"Student ID/No\" id = \"input\"/><br/><br/>
			<input id = \"input\" type = \"text\" name = \"email\" placeholder = \"Email Address\" id = \"input\"/><br/><br/>
			<input id = \"input\" type = \"text\" name = \"fName\" placeholder = \"Full Name\" id = \"input\"/><br/><br/>
            <select id = \"input\" name=\"sex\">
                <option value=\"Male\">Male</option>
                <option value=\"Female\">Female</option>
            </select><br/><br/>
			<input id = \"input\" type = \"password\" name = \"password\" placeholder = \"Password\" id = \"input\"/><br/><br/>
			<input id = \"input\" type = \"password\" name = \"password2\" placeholder = \"Verify Password\" id = \"input\"/><br/>
			<input id = \"submit\" type = \"submit\" id = \"submit\" name = \"submit\" value= \"Continue\"/>
		</form>
	</div>
	</div>
	</center>

";

if($_POST['submit']){
    $university = $_POST['uniCode'];
    $sql = "select * from universities where id = '$university'";
    $query = mysqli_query($connection_schools,$sql);
    if($query){
        $id = $_POST['number'];
        $email = $_POST['email'];
        $fullname = $_POST['fName'];
        $sex = $_POST['sex'];
        $password = hash("sha512", $_POST['password']);
	    $password2 = hash("sha512", $_POST['password2']);

        if($id && $email && $fullname && $sex && $password && $password2 ){
           if($password == $password2){
                setcookie("current_user", $email, time() + 24 * 60 * 60, "/");
                $student_sql = "insert into students(uniCode, stdNumber, FullName, sex, Email, Password) values ('$university', '$id', '$fullname', '$sex', '$email', '$password')";
                $student_query = mysqli_query($connection, $student_sql);
                if($student_query){
                    echo"Done";
                    header("Location:studentsignup2.php");
                }
                else{
                       echo $connection->error;
                }
           }
        }
    }

    else if(mysqli_num_rows($query) == 0){
          echo "Couldn't find any University Matching the Code you entered.";
    }

    else{
        echo $connection_schools->error;
    }
        
}


?>