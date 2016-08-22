<?php
include("header.php");
include("connect.php");

$sql = "select * from univerisites";
$query = mysqli_query($connection_schools, $sql);

if(!$query){
    echo $connection_schools->error;
}



	echo"

		<center>
	<div id = \"view\">
		<div id = \"form\">
			<div id = \"inputs\">
			<form id = \"exlore\" method = \"POST\"	action = \"results.php\">

            Field Of Study: <br/><input type = 'text' name = 'type' id = 'input' placeholder = 'Program of Study'/><br/><br/><br/><br/>

            University:<br/><select id = \"exInput\" name=\"uniName\">";
            
            while($info = mysqli_fetch_assoc($query)){
                $id = $info['id'];
                $name = $info['name'];
                echo"<option value=\"$id\">$name</option>"
            }

            echo"
            </select><br/><br/><br/><br/>

            <br/><br/>

			<br/><br/><br/><br/><input id = \"submit\" type = \"submit\" id = \"submit\" name = \"submit\" value= \"Search\"/><br/><br/>
		</form>
			</div><br/>

		</div>

	</div></center><br/><br/><br/><br/><br/><br/>

	";

include("footer.php");
?>