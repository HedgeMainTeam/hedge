<?php
include("header.php");
include("connect.php");

$currentUser = $_COOKIE['current_user'];
if(!$currentUser){
    header("Location:../index.php");
}

$sql = "select * from students where email = '$currentUser'";
$query = mysqli_query($connection, $sql);
if(!$query){
    echo  $connection->error();
}

else{
    $data = mysqli_fetch_array($query);
    $name = $data['FullName'];
    $uniCode = $data['uniCode'];
    $age = date("Y") - $data['YearOfBirth'];
    $program = $data['ProgramOfStudy'];
    $bio = $data['Biography'];
    $sex = $data['sex'];

    $uni_sql = "select * from universities where id = '$uniCode'";
    $uni_query = mysqli_query($connection_schools, $uni_sql);
    if(!$uni_query){
        echo $connection_schools->error();
    }

    else{
        $uni_data = mysqli_fetch_array($uni_query);
        $uniName = $uni_data['name'];
    }
    
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
			<h3>Attends: $uniName</h3>
			<h3>Program of Study: $program</h3></div>
			<div id = \"stdBio\"><h2>Biography:</h2><p>$bio</p>
			<h2>Contact:</h2><p>$currentUser</p>
			<button id = \"button\" onclick = \"parent.location = 'grades.php'\">View Performance </button></div>

				
			</div><br/>
		</div>

	</div></center>
";

include("footer.php");
?>