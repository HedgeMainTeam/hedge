<?php
include("header.php");

    $student = $_COOKIE['student'];
    $currentUser = $_COOKIE['current_user'];
    $sql = "select * from student where Email = '$student'";
    $query = mysqli_query($connection_scout, $sql);
    if(!$query){
        echo $connection_scout->error;
}
    else{
        $data = mysqli_fetch_array($query);
        $name = $data['FullName'];
        $age = date("Y") - $data['YearOfBirth'];
        $program = $data['ProgramOfStudy'];
        $sex = $data['sex'];
        $code = $data['uniCode'];
        $biography = $data['Biography'];


        $new_sql = "select * from universities where id = '$uniCode'";
        $new_query = mysqli_query($connection_schools, $new_query);
        if(!$new_query){
            echo $connection_schools->error;
    }

        else{
            $school_data = mysqli_fetch_array($new_query);
            $school_name = $school_data['name'];
}

if(isset($_POST['follow/unfollow'])){
     $connnection_sql = "select * from business_connections where student = '$student' and business = '$currentUser'";
     $connection_query = mysqli_query($connections, $connnection_sql);
     if($connection_query){
     $found = mysqli_num_rows($connection_query);
     if($found == 1){
        $del_sql = "delete from business_connections where student = '$student' and business = '$currentUser'";
        $del_sql = mysqli_query($connections,$del_query);
     }

     else{
        $relation = "Yes";
        $text = $currentUser." is interested in you.";
        $type = "interest";
        $flw_sql = "insert into business_connections (student, business, following) values ('$student', '$currentUser','$relation')";
        $flw_query = mysqli_query($connections, $$flw_sql);
        $notification_sql = "insert into notifications (source, student, text, type)values('$currentUser', '$student','$text','$type')";
        $notification_query = mysqli_query($connection_schools, $notification_query);
    }
       
}

else{
}

echo "
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
			<div id = \"stdBio\"><h2>Biography:</h2><p>$biography</p>
			<h2>Email Address:</h2><p> $student</p>
			<form method = 'POST' action = 'grades.php'><input id = 'button type = 'submit' name = 'view_grades' value = 'View Performance'/></form></div>	
            <form method = 'POST' action = 'student.php'>";
                    if($found == 1){
                        /*$connection_data = mysqli_fetch_array($connection_query);
                        $relation = $connection_data['following'];*/
                        echo "<input id = 'button' type = 'submit' name = 'follow/unfollow' value = 'Following'/>";
                    }

                    else{
                       echo"<input id = 'button' type = 'submit' name = 'follow/unfollow' value = 'Follow'/>";
                    }
                }
                 
                echo"
                </form>
			</div><br/>
		</div>

	</div></center>
";

    include("footer.php");
}

?>