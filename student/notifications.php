<?php
include("connect.php");

if(isset($_COOKIE['business'])){
        setcookie("business", "", time() - 3600, "/");
}

$currentUser = $_COOKIE['current_user'];
$sql = "select * from notifications where student = '$currentUser'";
$query = mysqli_query($connection,$sql);
if(!$query){
    echo "Something went wrong";
}
else{
    $total = mysqli_num_rows($query);
    $val = 0;
}

include("header.php");


echo"
<center>
	<div id = \"view\">
		<div id = \"notification\">
			<center>";
            while($info = mysqli_fetch_assoc($query)){
            $source = $info['source'];
            $text = $info['text'];
            $type = $info['type'];
            //$id = $info['id'];
            
            if($type == "business"){

                $new_sql = "select * from clients where email = '$source'";
                $new_query = mysqli_query($connection_business, $new_sql);

                if(mysqli_num_rows($new_query) == 0){
                      echo "
                        <div id = \"nCard\">
				            <p>Nothing to Show Yet.</p>
                        </div><br/>
                        ";
                }
                else if(!$new_query){
                    echo $connection_business->error;
                }

                else if ($new_query){          
                    echo"
                        <div id = \"nCard\">
				            <p>$text <form method = 'POST' action = 'notifications.php'><input name = '$val' type = 'submit' id = 'button' value = 'View'/><form></p>
                        </div><br/>";
                        if(isset($_POST[$val])){
	                        setcookie("business", $source, time() + 24 * 60 * 60, "/");
                            header("Location:loadbusiness.php");
                        }
                        
                        $val= $val + 1;
                }
            }
            

            else{

            echo"
            <div id = \"nCard\">
				<p>$text <form method = 'POST' action = 'grades.php'><input type = 'submit' id = 'button' value = 'View'/><form></p>
            </div><br/>";
            }
        
}
/*
for($i = 0; $i <= $total; $i++){

}
*/

echo"
		</div>

	</div></center><br/><br/><br/><br/><br/><br/>";

include("footer.php");
?>