<?php
include("connect.php");
include("header.php");

$studentemail = $_COOKIE['student'];
$currentUser = $_COOKIE['current_user'];
if(!$currentUser){
    header("Location:../index.php");
}

if(isset($_COOKIE['year'])){
    $year = $_COOKIE['year'];
}

else{
    $year = date("Y");
}

$student_sql = "select * from students where Email = '$studentemail'";
$student_query = mysqli_query($connection_scout,$student_sql);
if($student_query){
    $studentData = mysqli_fetch_array($student_query);
    $name = $studentData['FullName'];
    $code = $studentData['uniCode'];
    $age = date("Y") - $studentData['YearOfBirth'];
    $sex = $studentData['sex'];
    $program = $studentData['ProgramOfStudy'];

    $new_sql = "select * from universities where id = '$code'";
        $new_query = mysqli_query($connection_schools, $new_sql);
        if(!$new_query){
            echo $connection_schools->error;
    }

        else{
            $school_data = mysqli_fetch_array($new_query);
            $uniName = $school_data['name'];
        }
}

$grade_sql = "select * from studentgrades where student = '$studentemail' and year = '$year'";
$grade_query = mysqli_query($connection_schools, $grade_sql);
if(!$grade_query){
    echo $connection_schools->error;
}

$prev_year = $year - 1;
$previous_sql = "select * from studentgrades where student = '$studentemail' and year = '$prev_year'";
$previous_query = mysqli_query($connection_schools,$previous_sql );
if(!$previous_sql){
    echo $connection_schools->error;
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
			<h3>Attends: $uniName</h3>
			<h3>Program of Study: $program</h3></div>
			<div id = \"stdRight\">
            <h2>Performance - $year</h2>
                <table id = \"grades\" border = \"1\">
				<tr><th>Course</th><th>Grade</th></tr>";
                if(mysqli_num_rows($grade_query) > 0){
                    while($grade_info = mysqli_fetch_assoc($grade_query)){
                        $course = $grade_info['subjectName'];
                        $grade = $grade_info['studentMark'];
                        echo"<tr><td>$course</td><td>$grade</td></tr>";
                    }
                }
                      
            
            echo"</table>
			    </div><br/>";
                if(mysqli_num_rows($previous_query) > 0){
                    echo "<form method = 'POST' action = 'grades.php'>
                               <input type = 'submit' id = 'button' name = 'next' value = 'Next'/>
                           </form>";
                    if(isset($_POST['next'])){ 
                        setcookie("year", $prev_year, time() + 24 * 60 * 60, "/");
                    }
                }
                    
				echo"
			</div>
		</div>

	</div></center>
";



include("footer.php");
?>?>