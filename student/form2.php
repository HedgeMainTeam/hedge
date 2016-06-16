<?php
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

			<input id = \"input\" type = \"text\" name = \"nCourses\" placeholder = \"Number of Courses\" id = \"input\"/><br/><br/>
			<input id = \"submit\" type = \"submit\" id = \"submit\" name = \"submit\" value= \"Continue\"/>
		</form>
	</div>
	</div>
	</center>
";

$submitted = $_POST['submit'];

if (!$submitted) {
	print("Not submitted<br/>");
}
else
{
	print("Submitted<br/>");
	$connection = mysqli_connect("localhost", "root", "", "unitest" ) or die ("Failed to connect to server : " . mysqli_connect_error());

	$YearOfBirth 		= $_POST['birth'];
	$ProgramOfStudy 	= $_POST['program'];
	$Certification 		= $_POST['degree'];
	$YearOfAdmission 	= $_POST['yAdmission'];
	$YearOfGraduation 	= $_POST['yGraduation'];
	$NumberOfCourses 	= $_POST['nCourses'];

	print("YearOfBirth ".$YearOfBirth."<br/>");
	print("ProgramOfStudy ".$ProgramOfStudy."<br/>");
	print("Certification ".$Certification."<br/>");
	print("YearOfAdmission ".$YearOfAdmission."<br/>");
	print("YearOfGraduation ".$YearOfGraduation."<br/>");
	print("NumberOfCourses ".$NumberOfCourses."<br/>");

	if($YearOfBirth && $ProgramOfStudy && $Certification && $YearOfAdmission && $YearOfGraduation && $NumberOfCourses)
	{		
		print("Data submitted<br/>");

		//TODO - add WHERE to determine where the values are put
		$currentUser = $_COOKIE['current_user'];
		print($currentUser . "<br/>");
		$DatabaseRequest = "UPDATE students SET YearOfBirth = '$YearOfBirth', ProgramOfStudy = '$ProgramOfStudy', Certification = '$Certification', YearOfAdmission = '$YearOfAdmission', YearOfGraduation = '$YearOfGraduation', NumberOfCourses = '$NumberOfCourses' WHERE Email = '$currentUser'";
		print($DatabaseRequest."<br/>");
		$updated = mysqli_query($connection, $DatabaseRequest);
		if($updated)
		{
			print("Updated database<br/>");
		}
		else
		{
			print("Update failed : error " . $connection->error);
		}
		header("Location: studentsignup3.php");
	}
	else
	{
		print("Fill in all field<br/>");
	}
}

?>