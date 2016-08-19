<?php
include("connect.php");
$CurrentUserEmail = $_COOKIE['current_user'];

$Query = "SELECT FullName, YearOfBirth, Email, ProgramOfStudy, YearOfAdmission, YearOfGraduation, Biography  FROM students WHERE Email = '$CurrentUserEmail'";
$QueryData = mysqli_query($connection, $Query);
$DataArray = mysqli_fetch_array($QueryData);
print($connection->error);

$FullName = $DataArray['FullName'];
$YearOfBirth = $DataArray['YearOfBirth'];
$Email = $DataArray['Email'];
$ProgramOfStudy = $DataArray['ProgramOfStudy'];
$YearOfGraduation = $DataArray['YearOfGraduation'];
$YearOfStudy = $DataArray['YearOfStudy'];
$YearOfAdmission = $DataArray['YearOfAdmission'];
$Biography = $DataArray['Biography'];

echo"

<center>
	<div id = \"view\">
	<div id = \"signup\">
	<h2>Profile Summary</h2><br/>
		<h3>Full Name : $FullName
		<p>Year of birth : $YearOfBirth</p></h3>
		<p>Email : $Email</p>
		<p>Program Of Study : $ProgramOfStudy - Year Of Admission : $YearOfAdmission - Year Of Graduation : $YearOfGraduation</p>
		<p>Biography : $Biography</p>
	</div>
	</div>
	</center>

";
?>