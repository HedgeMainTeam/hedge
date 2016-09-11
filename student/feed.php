<?php
include("connect.php");
include("header.php");

$currentUser = $_COOKIE['current_user'];
if(!$currentUser){
    header("Location:../index.php");
}


if(isset($_COOKIE['business'])){
    setcookie("business", "", time() - 3600, "/");
}

$type = "opening";
$sql = "select * from notifications where student = '$currentUser' and type = '$type'";
$query = mysqli_query($connection,$sql);

if(!$query){
    echo $connection->error; 
}

	echo "
	<center>
	<div id = \"view\">
		<div id = \"notification\">
			";
            if(mysqli_num_rows($query) >= 1){
                   $val = 0;
                   while($info = mysqli_fetch_assoc($query)){
                    $client = $info['source'];
                    $text = $info['text'];
                    $client_sql = "select * from clients where email = '$client'";
                    $client_query = mysqli_query($connection_business, $client_sql);
                    if(!$client_query){
                            echo $connection_business->error;
                    }

                    else{
                            $client_data = mysqli_fetch_array($client_query);
                            $client_name = $client_data['name'];
                            echo"
                                <div id = \"nCard\">
                                <br/><h3 id = \"type\">Opening: $text</h3><p id = \"content\"><form method = 'POST' action = 'feed.php'><input type = 'submit' id = 'button' name = '$val' value = 'View'/></form> 
				                </p><br/>
			                    </div><br/>
                            ";
                            if(isset($_POST[$val])){
	                            setcookie("business", $client, time() + 24 * 60 * 60, "/");
                                header("Location:loadJandI.php");
                            }   
                            $val= $val + 1;
                    }

                 }
            }
            
            else{
            echo"
            <div id = \"fCard\">
				<h3 id = \"type\">Nothing to show yet. Try to follow some businesses if you haven't already.</h3><br/>
			</div><br/>
                ";
            }
            
            echo"
		</div>

	</div></center>";

	include("footer.php");
?>