<?php
include("connect.php");
$currentUser = $_COOKIE['current_user'];
$select = "select nCourses from instructors where email = '$currentUser'";
$query = mysqli_query($connection, $select);
$data = mysqli_fetch_array($query);
$number = $data['nCourses'];

$submit = $_POST['submit'];




echo"

<center>
	<div id = \"view\">
	<div id = \"signup\">
	<h2>Insert course numbers for the courses you teach</h2><br/>
			<form id = \"signup\" method = \"POST\"	action = \"lectSignup1.php\">";

            for ($i = 0; $i < $number; $i++){
            echo "<input id = \"input\" type = \"text\" name = \"$i\" placeholder = \"Course Number\" id = \"input\"/><br/><br/>";
}

			echo"
			<input id = \"submit\" type = \"submit\" id = \"submit\" name = \"submit\" value= \"Finish\"/>
		</form>
	</div>
	</div>
	</center>

";

if(!$submit){
echo"Nothing Submitted";
}

else{

for($x = 0; $x < $number; $x++){
    $course = $_POST['$i'];
    $new_sql = "update courses set instructor = '$currentUser'";
    $new_query = mysqli_query($connection,$new_sql);
    if(!$new_query){
    print("Update failed : error " . $connection->error);
    break;
}
}
header("Location:index.php");
}
?>

