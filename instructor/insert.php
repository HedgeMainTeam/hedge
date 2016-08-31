<?php
include("connect.php");
include("header.php");

$total= $_COOKIE['total'];
$number = $_COOKIE['number'];
$date = getdate();
$currentUser = $_COOKIE['current_user'];
$sql = "select * from instructors where email = '$currentUser'";
$query = mysqli_query($connection,$sql);

if(!$query) {
    echo"Something went wrong". $connection->error;
} else {
    $data = mysqli_fetch_array($query);
    $code = $data['code'];
}

if (isset($_POST['submit'])) {
    
    $new_sql = "select * from courses where number = '$number'";
    $new_query = mysqli_query($connection, $new_sql);

    if(!$new_query) {
        echo "Sorry, Course Not found";
    } 
    
    else {
        
        $cData = mysqli_fetch_array($new_query);
        $cName = $cData['name'];

        for($i = 0; $i <= $total; $i++){
            $i_num = $i."a";
            $i_mark = $i."b";

            $student_number = $_POST[$i_num];
            $student_sql = "select * from students where stdNumber = '$student_number'";
            $student_query = mysqli_query($connection_students, $student_sql);

            if($student_query) {
                $studentData = mysqli_fetch_array($student_query);
                $student = $studentData['Email'];
                $stdName = $studentData['FullName'];
            }

            $grade = $_POST[$i_mark];

            if($student_number == "" && $grade == ""){
                   break;
            }

            $year = date("Y");
            $grade_sql = "insert into studentgrades(uniCode, student, subjectCode, subjectName, studentMark, year) values ('$code', '$student', '$number', '$cName', '$grade', '$year')";
            $grade_query = mysqli_query($connection, $grade_sql);

            if($grade_query) {
                 echo "Inserted";
            } 
            else {
                echo $connection->error;
            }

            $text = "Your Marks in ".$cName." were added"; 
            $type = "grades";
            $notification_sql = "insert into notifications (source, student, text, type) values ('$currentUser', '$student', '$text', '$type')";
            $notification_query = mysqli_query($connection_students, $notification_sql);
        
            if($notification_query){
                echo "Students Have Been Notified.";
            } 
            else {
                echo $connection_students->error; 
            }

            $connections_sql = "select * from business_connections where student = '$student'";
            $connections_query = mysqli_query($connections, $connections_sql);

            if(!$connections_query){
                echo $connections_query->error;
            }

            if(mysqli_num_rows($connections_query) >= 1) {
                while($connectionData = mysqli_fetch_assoc($connections_query)) {
                    $business =  $connectionData['business'];
                    $text = $stdName . "'s Grades have been updated";
                    $not_sql = "insert into notifications(business, student, text, type)values('$business', '$student', '$text', '$type')";
                    $not_query = mysqli_query($connection_business, $not_sql);

                if($not_query){
                      echo "Businesses Have Been Notified!";
                     }
                }   
            }

        }
        
    }

}





	echo"
	<center><br/><br/><h3>Insert Student Grades from here:</h3><br/><br/>
	<div id = \"view\">
		<div id = \"loaded\">
		<form id = \"load\" method = \"POST\"	action = \"insert.php\">";
            for($x = 0; $x <= $total; $x++){
            $num = $x."a";
            $mark = $x."b";
            echo"                         
                <input id = \"input\" type = \"text\" name = \"$num\" placeholder = \"Student Number\" id = \"input\"/>
			    <input id = \"input\" type = \"text\" name = \"$mark\" placeholder = \"Student Mark\" id = \"input\"/><br/><br/>";
                
            }
            
            echo"
			<input id = \"submit\" type = \"submit\" id = \"insert\" name = \"submit\" value= \"Insert\"/>
		</form>
        <button id = 'submit' onclick = \"parent.location = 'pre_insert.php'\">Done</button> 


		</div>

	</div>
    </center><br/><br/><br/><br/><br/><br/>   
	";
    

include("footer.php");
?>