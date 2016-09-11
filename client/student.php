<?php
include("connect.php");
include("header.php");

    $student = $_COOKIE['student'];
    $currentUser = $_COOKIE['current_user'];
    if(!$currentUser){
    header("Location:../index.php");
    }

    $business_sql = "select * from clients where email = '$currentUser'";
    $business_query = mysqli_query($connection, $business_sql);
    if($business_query){
        $businessData = mysqli_fetch_array($business_query);
        $business_name = $businessData['name'];
    }
    else{
        echo $connection->error;
    }

    $sql = "select * from students where Email = '$student'";
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


        $new_sql = "select * from universities where id = '$code'";
        $new_query = mysqli_query($connection_schools, $new_sql);
        if(!$new_query){
            echo $connection_schools->error;
    }

        else{
            $school_data = mysqli_fetch_array($new_query);
            $school_name = $school_data['name'];
}


    $connnection_sql = "select * from business_connections where student = '$student' and business = '$currentUser'";
     $connection_query = mysqli_query($connections, $connnection_sql);
     if($connection_query){
     $found = mysqli_num_rows($connection_query);
     }

if(isset($_POST['follow/unfollow'])){
     $connnection_sql = "select * from business_connections where student = '$student' and business = '$currentUser'";
     $connection_query = mysqli_query($connections, $connnection_sql);
     if($connection_query){
     $found = mysqli_num_rows($connection_query);
     if($found == 1){
        $del_sql = "delete from business_connections where student = '$student' and business = '$currentUser'";
        $del_sql = mysqli_query($connections,$del_sql);
        header("Location:student.php");
     }

     else{
        $relation = "Yes";
        $text = $business_name." is interested in you.";
        $type = "business";
        $flw_sql = "insert into business_connections (student, business, following) values ('$student', '$currentUser','$relation')";
        $flw_query = mysqli_query($connections, $flw_sql);
        if(!$flw_query){
            echo $connections->error;
        }
        $notification_sql = "insert into notifications (source, student, text, type)values('$currentUser', '$student','$text','$type')";
        $notification_query = mysqli_query($connection_scout, $notification_sql);
        header("Location:student.php");

    }
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
			<form method = 'POST' action = 'studentgrades.php'><input id = 'button' type = 'submit' name = 'view_grades' value = 'View Performance'/></form></div>	
            <form method = 'POST' action = 'student.php'>";
                    if($found == 1){
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


?>