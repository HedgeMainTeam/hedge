<?php
include("header.php");
include("connect.php");

$currentUser = $_COOKIE['current_user'];
$sql = "select * from students where Email = '$currentUser'";
$query = mysqli_query($connection, $sql);
if(!$query){
    echo "Something's wrong";
}

else{
    $studentData = mysqli_fetch_array($query);
    $uniCode = $studentData['uniCode'];
    $student = $studentData['stdNumber'];
    $name = $studentData['FullName'];
    $age = date("Y") - $studentData['YearOfBirth'];
    $program = $studentData['ProgramOfStudy'];
    $sex = $studentData['sex'];
    $uni_sql = "select * from universities where id = '$uniCode'";
    $uni_query = mysqli_query($connection_schools, $uni_sql);
    if(!$uni_query){
        echo $connection_schools->error();
    }

    else{
        $uni_data = mysqli_fetch_array($uni_query);
        $uniName = $uni_data['name'];
    }



    $grade_sql = "select * from studentgrades where student = '$student'";
    $grade_query = mysqli_query($connection_schools, $grade_sql);
   
if(!$grade_query){
    echo "Something went wrong";
}


if(isset($_POST['year'])){
    $year_sql = "select * from studentgrades where student = '$student'";
    $year_query = mysqli_query($connection_schools, $year_sql);
    if(!$year_query){
        echo $connection_schools->error;
}
    else{
    echo"
<center>
	<div id = \"view\">
		<div id = \"profile\">
			<div id = \"student\">
			<div id = \"info\">
			<h2>Student Name: $name</h2><br/>
			<h3>Age: $age</h3>
			<h3>Sex: $sex</h3>
			<h3>Attends: $uniName</h3>
			<h3>Program of Study: $program</h3></div>
			<div id = \"stdRight\">
			<h2>Performance</h2>
                <table id = \"grades\" border = \"1\">
				<tr><th>Course</th><th>Grade</th></tr>";
            while($info = mysqli_fetch_assoc($year_query)){
                    $course = $info['subjectName'];
                    $grade = $info['subjectMark'];
                    echo"<tr><td>$course</td><td>$grade</td></tr>";
            }
			
            echo"
					</table>
			</div><br/>
				
			</div>
		</div>

	</div></center>

";
        
}
}
}

include("footer.php");
?>