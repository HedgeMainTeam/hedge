<?php

$connection = mysqli_connect("localhost", "root", "", "unitest" ) or die ("Failed to connect to server : " . mysqli_connect_error());

$CurrentUserEmail = $_COOKIE['current_user'];
print($CurrentUserEmail."<br/>");

$Query = mysqli_query($connection, "SELECT NumberOfCourses FROM students WHERE Email = '$CurrentUserEmail'");
//print("Query".$Query."<br/>");

$DatabaseData = mysqli_fetch_array($Query);
//print($DatabaseData."<br/>");

$NumberOfCouses = $DatabaseData['NumberOfCourses'];
print("Number of Courses" . $NumberOfCouses . "<br/>");

echo "
	<center>
		<div id = \"view\">
		<div id = \"signup\">
			<h2>Enter Courses by Number</h2><br/>
			<form id = \"signup\" method = \"POST\"	action = \"studentsignup3.php\">	";
				for($i = 0; $i < $NumberOfCouses; $i++)
				{
					echo "
					<input id = 'input' type = 'text' name = '$i' placeholder = 'Course' id = 'input'/><br/><br/>
					";
				}

				echo "
				<input id = 'submit' type = 'submit' id ='submit' name = 'submit' value= 'Continue'/>
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
	$AllCoursesEntererd = false;
	$CourseString = "";
	for($i = 0; $i < $NumberOfCouses; $i++)
	{
		$courseEntered = $_POST[$i];
		//print("Course : " . $courseEntered . "<br/>");
		if(!$courseEntered)
		{
			$AllCoursesEntererd = false;
			break;
		}

		$CourseString = $CourseString . $courseEntered;
		print("Cousrse String : " . $CourseString . "<br/>");

		if($i != $NumberOfCouses - 1)
		{
			$CourseString = $CourseString . "%";
		}

		$AllCoursesEntererd = true;
	}

	print("Cousrse String : " . $CourseString . "<br/>");

	if($AllCoursesEntererd)
	{
		$Query = "INSERT INTO courses(Email, Courses) VALUE ('$CurrentUserEmail', '$CourseString')";

		$updated = mysqli_query($connection, $Query);
		if($updated)
		{
			print("Updated database<br/>");
		}
		else
		{
			print("Update failed : error " . $connection->error);
		}

		header("Location: studentsignup4.php");

	}
	else
	{
		print("Please fill in all fields<br/>");
	}

	print("Submitted<br/>");
}
	//To add  a column ALTER TABLE tablename ADD column_name datatype
	//To add  a column ALTER TABLE tablename DROP column_name datatype	
?>