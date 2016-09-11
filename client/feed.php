<?php
include("header.php");
include ("connect.php");

if(isset($_COOKIE['student'])){
    setcookie("student", "", time() - 3600, "/");
}


$currentUser = $_COOKIE['current_user'];
if(!$currentUser){
    header("Location:../index.php");
}

$sql = "select * from notifications where business = '$currentUser'";
$query = mysqli_query($connection, $sql);
if(!$query){
    echo $connection->error;
}

else if (mysqli_num_rows($query) == 0){
    echo"<br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><center><div id = \"fCard\">
				<h3 id = \"type\">Nothing to show yet, try following a few students if you haven't already.</h3></p><br/>
			</div><br/></center><br/><br/><br/><br/><br/><br/><br/>";
}

else{
$val = 0;
    while($info = mysqli_fetch_assoc($query)){
        $student = $info['student'];
        $text = $info ['text'];
        $type= $info['type'];

        $new_sql = "select * from students where email = '$student'";
        $new_query = mysqli_query($connection_scout, $new_sql);
        if(!$new_query){
            echo $connection_scout->error;
        }

        else{
            $data = mysqli_fetch_array($new_query);
            $stdName = $data['FullName'];
            $stdEmail = $data['Email'];
            
            echo"
            <center>
	            <div id = \"view\">
		        <div id = \"feed\">
			    <div id = \"fCard\">
				    <h3 id = \"type\">$stdName - $text</h3> 
				    <form method = 'POST' action = 'feed.php'><input type = 'submit' name = '$val' id = 'button' value ='View Profile' /></p>
			    </div>";
                if(isset($_POST[$val])){
	                 setcookie("student", $stdEmail, time() + 24 * 60 * 60, "/");
                     header("Location:student.php");
                }   
                $val= $val + 1;
        }
        
}

}

echo"
		</div>

	</div></center>
";
include("footer.php");
?>