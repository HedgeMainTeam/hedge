<?php
include("connect.php");
$submitted = $_POST['submit'];
if(!$submitted){
    echo "Nothing Yet";
}

else{
    $uniCode = $_POST['uniCode'];
    $sql = "select * from universities where id = '$uniCode'";
    $query = mysqli_query($connection,$sql);
    if($query){
    echo "Found";
    $email = $_POST['email'];
    $name = $_POST['fName'];
    $courses = $_POST['nCourses'];
    $Password1 = hash("sha512", $_POST['password']);
	$Password2 = hash("sha512", $_POST['password2']);
     setcookie("user_signup", $email, time() + 24 * 60 * 60, "/");

    if($uniCode && $email && $name && $courses && $Password1 && $Password2){
        if($Password1 == $Password2){
            $new_sql = "insert into instructors(code, email, fullname, nCourses, password ) values ('$uniCode', '$email', '$name', '$courses','$Password1')";
            $new_query = mysqli_query($connection,$new_sql);
            if($new_query){
               header("Location:lectSignup1.php");
}
else
		{
			print("Update failed : error " . $connection->error);
		}
}
} 
    
}
    else{
       echo "The University Code You Doesn't Exist";
}
}


echo"

	<center>
	<div id = \"view\">
	<div id = \"signup\">
	<h2>Sign Up Here</h2><br/>
		<form id = \"signup\" method = \"POST\"	action =\"form1.php\">
			<input id = \"input\" type = \"text\" name = \"uniCode\" placeholder = \"University Code\" id = \"input\"/><br/><br/>
			<input id = \"input\" type = \"text\" name = \"email\" placeholder = \"Email Address\" id = \"input\"/><br/><br/>
			<input id = \"input\" type = \"text\" name = \"fName\" placeholder = \"Full Name\" id = \"input\"/><br/><br/>
			<input id = \"input\" type = \"text\" name = \"nCourses\" placeholder = \"Number of Courses\" id = \"input\"/><br/><br/>
			<input id = \"input\" type = \"password\" name = \"password\" placeholder = \"Password\" id = \"input\"/><br/><br/>
			<input id = \"input\" type = \"password\" name = \"password2\" placeholder = \"Verify Password\" id = \"input\"/><br/>
			<input id = \"submit\" type = \"submit\" id = \"submit\" name = \"submit\" value= \"Continue\"/>
		</form>
	</div>
	</div>
	</center>

";
?>