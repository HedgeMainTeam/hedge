<?php
include("header.php");

	echo"
	<center>
	<div id = \"view\">
		<div id = \"loaded\">
		<form id = \"load\" method = \"POST\"	action = \"loadStudents.php\">
			<h3>Charles Mvula:</h3><input id = \"input\" type = \"text\" name = \"grade\" placeholder = \"Insert Grade\" id = \"input\"/><br/><br/>

			<input id = \"submit\" type = \"submit\" id = \"insert\" name = \"submit\" value= \"next\"/>
		</form>


		</div>

	</div></center>
	";

include("footer.php");
?>