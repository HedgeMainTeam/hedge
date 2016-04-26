<?php
include("header.php");

	echo"
	<center>
	<div id = \"view\">
		<div id = \"form\">
			<div id = \"inputs\">
			<form id = \"load\" method = \"POST\"	action = \"loadStudents.php\">

            
            Pick The Course: <br/><select id = \"exInput\" name=\"course\">
                <option value=\"chemistry\">Chemistry</option>
                <option value=\"physics\">Physics</option>
                <option value=\"biology\">Biology</option>
            </select><br/><br/>

           Year:<br/> <select id = \"exInput\" name=\"nation\">
                <option value=\"1\">1st Year</option>
                <option value=\"2\">2nd Year</option>
                <option value=\"3\">3rd Year</option>
                </select><br/><br/>

			<input id = \"submit\" type = \"submit\" id = \"submit\" name = \"submit\" value= \"Load Students\"/><br/><br/>
		</form>
			</div><br/>

		</div>

	</div></center>
	";

include("footer.php");
?>