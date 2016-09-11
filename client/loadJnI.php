<?php
    include("connect.php");
	include("header.php");

    $currentUser = $_COOKIE['current_user'];
    if(!$currentUser){
        header("Location:../index.php");
    }
    $sql = "select * from clients where email = '$currentUser'";
    $query = mysqli_query($connection,$sql);
    if(!$query){
    echo "Something went wrong";

}

    else if(mysqli_num_rows($query) == 0){
    echo "No Jobs / Internships have been added.";
}



    else{
        $data = mysqli_fetch_array($query);
        $id = $data['id'];
        $openingSql= "select * from openings where id = '$id'";
        $openingQuery = mysqli_query($connection,$openingSql);
        if(!$openingQuery){
        echo "Something else went wrong";
}   
   else{
        $total = mysqli_num_rows($openingQuery);
        setcookie("id", $id, time() + 24 * 60 * 60, "/");
        $current = 0;
}

}

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
			<div id = \"stdRight\">
			<h2>Jobs and Internships</h2>
            <form method = 'POST' action = 'click.php'>
				<table id = \"grades\" border = \"1\">
					<tr><th>Jobs and Interships</th><th>Deadline</th><th>Information</th></tr>";
                    
                    while($info = mysqli_fetch_assoc($openingQuery)){
                    $id = $info['id'];
                    $name = $info['name'];
                    $type = $info['type'];
                    $description = $info['description'];
                    $deadline = $info['deadline'];
                    setcookie("jandl", $name, time() + 24 * 60 * 60, "/");

                    echo"<tr><td>$name</td><td>$deadline</td><td> <input type = 'submit' id = 'button' name = 'view' value = 'View'/>
                    <input type = 'submit' name = 'delete' id = 'button' value = 'Delete'/></td></tr>";
                        

}

echo"
					</table></form>
			</div><br/><br/>
            <button id = \"button\" onclick = \"parent.location = 'addJandI.php'\">Add Job/Internship</button><br/>
		</div>

	</div>
	</center>

	";
	include("footer.php");
?>