<?php
echo"

<center>
	<div id = \"view\">
	<div id = \"signup\">
	<h2>Almost Done</h2><br/>
		<form id = \"signup\" method = \"POST\"	action = \"clientSignup2.php\">
			<p>Maximum Number of Students You would like to follow<br/><br/>
			<select id = \"input\" name=\"stdNum\">
                <option value=\"5\">5</option>
                <option value=\"10\">10</option>
                <option value=\"15\">15</option>
                <option value=\"20\">20</option>
            </select><br/><br/>
            	<select id= \"input\" name=\"university\">
                <option value=\"universityCode\">Which University would you like to Follow first?</option>
            </select><br/>
            <input id = \"submit\" type = \"submit\" id = \"submit\" name = \"submit\" value= \"Done\"/>
		</form>
	</div>
	</div>
	</center>


";
?>