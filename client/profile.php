<?php

	include("header.php");
	include("connect.php");
    $currentUser = $_COOKIE['current_user'];
	$sql = "select name, cstudents,maxstudents,address, email from clients where email = '$currentUser'";
	$query = mysqli_query($connection, $sql);
	$data = mysqli_fetch_array($query);
	$name = $data['name'];
	$cstudents = $data['cstudents'];
	$maxstudents = $data['maxstudents'];
	$address = $data['address'];
	$email = $data['email'];
    $requirements = $data['requirements'];

	echo"

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
			<h2>Email Address:</h2><p>$email</p>
			<button id = \"button\" onclick = \"parent.location = 'loadJnI.php'\">Job/Internship Applications</button><br/><br/>
			</div>

				
			</div><br/>
		</div>

	</div>
	</center>

	";
	include("footer.php");
?>