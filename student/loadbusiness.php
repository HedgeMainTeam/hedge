<?php
include("connect.php");
include("header.php");


$currentUser = $_COOKIE['current_user'];
if(!$currentUser){
    header("Location:../index.php");
}
$business = $_COOKIE['business'];
$sql = "select * from clients where email = '$business'";
$query = mysqli_query($connection_business, $sql);
if(!$query){
    echo $connection_business->error();
}



else{
    $connnection_sql = "select * from student_connections where student = '$currentUser' and business = '$business'";
    $connection_query = mysqli_query($connections, $connnection_sql);
    if($connection_query){
        $found = mysqli_num_rows($connection_query);
     }
    $data = mysqli_fetch_array($query);
    $name = $data['name'];
    $cstudents = $data['cstudents'];
    $maxstudents = $data['maxstudents'];
    $address = $data['address'];
    $email = $business;
    $requirements = $data['requirements'];
    



    echo "

    <center>
	<div id = \"view\">
		<div id = \"profile\">
			<div id = \"student\">
			<div id = \"info\">
			<h2>$name</h2><br/>
			<h3>Students: $cstudents / $maxstudents </h3>
			<h3>Address: $address</h3>
			</div>
			<div id = \"stdBio\"><h2>Prerequisites:</h2><p>$requirements</p>
			<h2>Email Address:</h2><p> $email</p>
            <form method = 'POST' action = 'follow.php'>
            ";
                    if($found == 1){
                        /*$connection_data = mysqli_fetch_array($connection_query);
                        $relation = $connection_data['following'];*/
                        echo "<input id = 'button' type = 'submit' name = 'follow/unfollow' value = 'Following'/><br/><br/>";
                    }

                    else{
                       echo"<input id = 'button' type = 'submit' name = 'follow/unfollow' value = 'Follow'/><br/><br/>";
                    }
                 
                echo"
			</form>
            <br/>
            <button id = \"button\" onclick = \"parent.location = 'loadJandI.php'\">Job/Internship Applications</button><br/><br/>
			</div>

				
			</div><br/>
		</div>

	</div>
	</center>

    ";
    }
    
    include("footer.php");


?>