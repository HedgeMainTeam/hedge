<?php
include("connect.php");

echo"
<center>
	<div id = \"view\">
	<div id = \"signup\">
	<h2>Sign Up</h2><br/>
		<form id = \"signup\" method = \"POST\"	action = \"studentsignup2.php\">
			<input id = \"input\" type = \"text\" name = \"birth\" placeholder = \"Year of Birth\" id = \"input\"/><br/><br/>
			<input id = \"input\" type = \"text\" name = \"program\" placeholder = \"Program of Study (e.g Law)\" id = \"input\"/><br/><br/>
			<select id = \"input\" name=\"degree\">
                <option value=\"Bachelors Degree\">BS Degree</option>
                <option value=\"Masters Degree\">Masters Degree</option>
                <option value=\"Doctorate\">PhD</option>
            </select><br/><br/>
			<input id = \"input\" type = \"text\" name = \"yAdmission\" placeholder = \"Year of Admission\" id = \"input\"/><br/><br/>
			<input id = \"input\" type = \"text\" name = \"yGraduation\" placeholder = \"Year of Graduation\" id = \"input\"/><br/><br/>
			<input id = \"submit\" type = \"submit\" id = \"submit\" name = \"submit\" value= \"Continue\"/>
		</form>
	</div>
	</div>
	</center>
";

$currentUser = $_COOKIE['user_signup'];
if(isset($_POST['submit'])){

    $yearBirth = $_POST['birth'];
    $program = $_POST['program'];
    $cert = $_POST['degree'];
    $admission = $_POST['yAdmission'];
    $graduation = $_POST['yGraduation'];

    if($yearBirth && $program && $cert && $admission && $graduation){
        $sql = "update students set YearOfBirth = '$yearBirth', ProgramOfStudy = '$program', Certification = '$cert', YearOfAdmission = '$admission', YearOfGraduation = '$graduation' where Email = '$currentUser'";
        $query = mysqli_query($connection,$sql);
        if($query){
            header("Location:studentsignup3.php");
        }

        else{
            $connection->error;
        }
    }

}
 


// <input id = \"input\" type = \"text\" name = \"nCourses\" placeholder = \"Number of Courses\" id = \"input\"/><br/><br/>
// The input form for the number of courses that has been removed.

?>