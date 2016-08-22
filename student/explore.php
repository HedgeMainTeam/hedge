<?php
include("header.php");
include("connect.php");
if(isset($_COOKIE['business'])){
    setcookie("business", "", time() - 3600, "/");
}

$sql = "select * from clients";
$query = mysqli_query($connection_business, $sql);
if(!$query){
    echo $connection_business->error();
}
else{

echo"
<center>
	<div id = \"view\">
		<div id = \"notification\">
			<center>";
            while($info = mysqli_fetch_assoc($query)){
            $name = $info['name'];
            $email = $info['email'];
   			setcookie("business", $email, time() + 24 * 60 * 60, "/");
            echo"
                <div id = \"nCard\">
			       <p>$name <form method = 'POST' action = 'loadbusiness.php'><input type = 'submit' id = 'button' value = 'View Profile'/><form></p>
                </div><br/>";
            }
echo"
	</div></center>

";
}


include("footer.php");
?>