<?php
include("connect.php");
include("header.php");

if(isset($_COOKIE['student'])){
    setcookie("student", "", time() - 3600, "/");
}


if(isset($_POST['submit'])){
    $id = $_POST['uniName'];
    $field = $_POST['type'];

    $sql = "select * from students where uniCode = '$id' and ProgramOfStudy = '$field'";
    $query = mysqli_query($connection_scout, $sql);
    if(!$query){
    echo "Something went wrong";
    print("Update failed : error " . $connection->error);
}

else{
    $total = mysqli_num_rows($query);
    $val = 0;
}
}
echo"

<center>
	<div id = \"view\">
		<div id = \"notification\">
			<center>";
               if($total == 0){
               echo"
               <div id = \"nCard\">
				<h2>Sorry, no students yet</h2>
			</div><br/>";

            }

            else{
            while($info = mysqli_fetch_assoc($query)){
            $name = $info['FullName'];
            $email = $info['Email'];
            setcookie("student", $email, time() + 24 * 60 * 60, "/");
            echo"
            <div id = \"nCard\">
				<p>$name<form method = 'POST' action= 'results.php'> <input type = 'submit' id = 'button' name = '$val' value = 'View Profile'/> 
                <input type = 'submit' id = 'button' name = 'follow' value = 'Follow'/></p>
			</div><br/>
        ";

            if(isset($_POST[$val])){
	                 setcookie("student", $stdEmail, time() + 24 * 60 * 60, "/");
                     header("Location:student.php");
                }   
                $val= $val + 1;
    }
}
echo"

			<br/><a href = \"scout.php\"><button id = \"button\" >Go Back</button></a><br/><br/><br/></center>



		</div>

	</div></center>

";
include("footer.php");
?>