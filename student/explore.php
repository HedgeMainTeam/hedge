<?php
include("header.php");
include("connect.php");

//header("Location:../index.php");

if(isset($_COOKIE['business'])){
    setcookie("business", "", time() - 3600, "/");
}

$sql = "select * from clients";
$query = mysqli_query($connection_business, $sql);
if(!$query){
    echo $connection_business->error;
}
else{
$val = 0;

echo"
<center>
	<div id = \"view\">
		<div id = \"notification\">
			<center>";
            while($info = mysqli_fetch_assoc($query)){
            $name = $info['name'];
            $email = $info['email'];
   			//
            echo"
                <div id = \"nCard\">
			       <p>$name <form method = 'POST' action = 'explore.php'><input name = '$val' type = 'submit' id = 'button' value = 'View Profile'/><form></p>
                </div><br/>";

                if(isset($_POST[$val])){
	                 setcookie("business", $email, time() + 24 * 60 * 60, "/");
                     header("Location:loadbusiness.php");
                }   
                $val= $val + 1;
            }
echo"
	</div></center>

";
}


include("footer.php");
?>