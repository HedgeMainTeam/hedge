<?php
    include("connect.php");
	include("header.php");

    $business = $_COOKIE['business'];
    $sql = "select * from clients where email = '$business'";
    $query = mysqli_query($connection_business,$sql);
    if(!$query){
    echo "Something went wrong";
    }

    else{
        $data = mysqli_fetch_array($query);
        $id = $data['id'];
        $name = $data['name'];
        $cstudents = $data['cstudents'];
        $maxstudents = $data['maxstudents'];
        $address = $data['address'];
        $openingSql= "select * from openings where id = '$id'";
        $openingQuery = mysqli_query($connection_business,$openingSql);
        if(!$openingQuery){
        echo "Something else went wrong";
}
   else{
        $total = mysqli_num_rows($openingQuery);
        setcookie("id", $id, time() + 24 * 60 * 60, "/");
}

}

	echo"

	<center>
	<div id = \"view\">
		<div id = \"profile\">
			<div id = \"student\">
			<div id = \"info\">
			<h2>$name</h2><br/>
			<h3>$cstudents - Students </h3>
			<h3>Address: $address</h3>
			</div>
			<div id = \"stdRight\">
			<h2>Performance</h2>
				<table id = \"grades\" border = \"1\">
					<tr><th>Jobs and Interships</th><th>Deadline</th><th>Contact</th></tr>";
                    
                    while($info = mysqli_fetch_assoc($openingQuery)){
                    $id = $info['id'];
                    $name = $info['name'];
                    $type = $info['type'];
                    $description = $info['description'];
                    $deadline = $info['deadline'];

                    echo"<tr><td><center>$name</center></td><td><center>$deadline</center></td><td><p><center>$business</center></td></tr>";
                        

}

echo"
					</table>
			</div><br/><br/>
		</div>
	</div>
	</center>

	";
	include("footer.php");



?>    