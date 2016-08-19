<?php
include("connect.php");
include("header.php");
$studentemail = $_COOKIE['student'];
$sql = "select * from students where Email = '$studentemail'";
$query = mysqli_query($connection_schools, $sql);
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
    $new_sql = "select * from universities where id = '$uniCode'";
        $new_query = mysqli_query($connection_schools, $new_query);
        if(!$new_query){
            echo $connection_schools->error();
    }

        else{
            $school_data = mysqli_fetch_array($new_query);
            $school_name = $school_data['name'];
}



    $grade_sql = "select * from studentgrades where student = '$student'";
    $grade_query = mysqli_query($connection_schools, $grade_sql);
   
if(!$grade_query){
    echo "Something went wrong";
}
    

else{
        $years = array();
        $years[0] = date("Y");
        $i = 0;
        $total = mysqli_num_rows($grade_query);
        while($info = mysqli_fetch_assoc($grade_query)){
            $year = $info['year'];
            foreach($years as $it){
                if($it == $year){
                    break;
                    }
                else{
                    $i = $i + 1;
                    $years[$i] = $year;
                }
            }
            
            
}

    echo"
<center>
	<div id = \"view\">
		<div id = \"profile\">
			<div id = \"student\">
			<div id = \"info\">
			<h2>Student Name: $name</h2><br/>
			<h3>Age: $age</h3>
			<h3>Sex: $sex</h3>
			<h3>Attends: $school_name</h3>
			<h3>Program of Study: $program</h3></div>
			<div id = \"stdRight\">
			<form method = 'POST' action = 'grades.php'>";
            foreach ($years as $button){
                echo"<input type = 'submit' id = 'button' value = '$button' name = 'year'";
            }
            echo"</form>
            </div><br/>
				
			</div>
		</div>

	</div></center>
";
}

}


if($_POST['year']){
    $year_sql = "select * from studentgrades where student = '$student'";
    $year_query = mysqli_query($connection_schools, $year_sql);
    if(!$year_query){
        echo $connection_schools->error();
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
			<h3>Attends: $school_name</h3>
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




include("footer.php");
?>