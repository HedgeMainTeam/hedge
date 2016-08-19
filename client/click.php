<?php
include("connect.php");
$opening = $_COOKIE['jandl'];
$id = $_COOKIE['id'];

if($_POST['delete']){

$sql = "select * from openings where id = '$id' and name = '$opening'";
$query = mysqli_query($connection,$sql);
if(!$query){
    print("Update failed : error " . $connection->error);
}

else{
    $new_sql = "delete from openings where id = '$id' and name = '$opening';";
    $new_query = mysqli_query($connection, $new_sql);
    if(!$new_query){
    print("Update failed : error " . $connection->error);
}
    else{
        header("Location:loadJnI.php");
        }
}

}

else if($_POST['view']){
$sql = "select * from openings where id = '$id' and name = '$opening'";
$query = mysqli_query($connection, $sql);
if(!$query){
    echo "Something went wrong";
}

else{
    $data = mysqli_fetch_array($query);
    $name = $data['name'];
    $deadline = $data['deadline'];
    $description = $data['description'];
    $type = $data['type'];
}

include("header.php");
echo"
    <center>
	<div id = \"view\">
		<div id = \"profile\">
			<div id = \"student\">
			<div id = \"info\">
			<h2>Airtel Zambia</h2><br/>
			<h3>Students: 10 / 20 </h3>
			<h3>Address: Building 43 Great East Road, Zambia.</h3>
			</div>
			<div id = \"stdRight\"><h2>$type: $name</h2>
				<h3 id = \"type\"></h3><p>Deadline: $deadline
				<h3>Description:</h3><br/>
				<p>$description</p><br/>
			<form method='POST' action = 'click.php'><input type = 'submit' id = 'button' name = 'delete' value = 'Delete'/><br/>
			<a href = \"loadJnl.php\"><button id = \"button\" >Go Back</button></a></p><br/>
			</div><br/>
		</div>

	</div></center>
";
include("footer.php");
}

?>
