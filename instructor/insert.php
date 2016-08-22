<?php
include("connect.php");
include("header.php");
$date = getdate();
$currentUser = $_COOKIE['current_user'];
$sql = "select * from instructors where email = '$currentUser'";
$query = mysqli_query($connection,$sql);
if(!$query){
    echo"Something went wrong". $connection->error();
}

else{
    $data = mysqli_fetch_array($query);
    $code = $data['code'];
}

if($submit){
    $number = $_POST['cNumber'];
    $new_sql = "select * from courses where number = '$number'";
    $new_query = mysqli_query($connection, $sql);
    if(!$new_query){
    echo "Sorry, Course Not found";
}
else{
    $cData = mysqli_fetch_array($new_query);
    $cName = $cData['name'];
    $student_number = $_POST['stdNumber'];
    $student_sql = "select * from students where stdNumber = '$student_number'";
    $student_query = mysqli_query($connection_students, $student_sql);
    if($student_query){
        $studentData = mysqli_fetch_array($student_query);
        $student = $studentData['Email'];
    }
    $grade = $_POST['grade'];
    $year = date("Y");
    $grade_sql = "insert into studentgrades (uniCode, student, subjectCode, subjectName, studentMark, year) values ('$code', '$student', '$number', '$cName', '$grade', '$year')";
    $grade_query = mysqli_query($connection, $grade_sql);
     if($grade_query){
        echo "Inserted";
    }
    else{
        echo $connection->error();
    }

    $text = "Your Marks in ".$cName." were added"; 
    $type = "grades";
    $notification_sql = "insert into notifications (source, student, text, type) values ('$currentUser', '$student', '$text', '$type')";
    $notification_query($connection_students, $notification_sql);
     if($notification_query){
        echo "Students Have Been Notified.";
    }
    else{
        echo $connection_students->error(); 
    }

    $connections_sql = "select * from student_connections where student = '$student'";
    $connections_query = mysqli_query($connections, $connections_sql);
    if(mysqli_num_rows($connections_query) >= 1){
            while($connectionData = mysqli_fetch_assoc($connections_query)){
                  $business =  $connectionData['business'];
                  $text = "Grades have been updated";
                  $not_sql = "insert into notifications(business, student, text, type)values('$busines', '$student', '$text', '$type')";
                  $not_query = mysqli_query($connection_business, $not_query);
                  if($not_query){
                        echo "Businesses Have Been Notified!";
                    }
            }
    }

}
}





/*
if($_POST['picked']){
    $new_sql = "select * from students where uniCode= '$code'";
    $new_quuery = mysqli_query($connection_students, $new_sql);
    if(!$query){
        echo"Something went wrong".$connection_students->error();
}
    else{
        $total = mysqli_num_rows($query);
}
}
*/




	echo"
	<center><br/><br/><h3>Insert Student Grades from here:</h3><br/><br/>
	<div id = \"view\">
		<div id = \"loaded\">
		<form id = \"load\" method = \"POST\"	action = \"insert.php\">
            <input id = \"input\" type = \"text\" name = \"cNumber\" placeholder = \"Course Number\" id = \"input\"/><br/><br/>
            <input id = \"input\" type = \"text\" name = \"stdNumber\" placeholder = \"Student Number\" id = \"input\"/><br/><br/>
			<input id = \"input\" type = \"text\" name = \"grade\" placeholder = \"Student Mark\" id = \"input\"/><br/><br/>

			<input id = \"submit\" type = \"submit\" id = \"insert\" name = \"submit\" value= \"Insert\"/>
		</form>


		</div>

	</div>
    </center><br/><br/><br/><br/><br/><br/>   
	";

include("footer.php");
?>