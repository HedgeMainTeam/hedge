<?php
echo"
<center>
	<div id = \"view\">
	<div id = \"signup\">
	<h2>Sign Up</h2><br/>
		<form id = \"signup\" method = \"POST\"	action = \"stdSignup2.php\">
			<input id = \"input\" type = \"text\" name = \"birth\" placeholder = \"Year of Birth\" id = \"input\"/><br/><br/>
			<input id = \"input\" type = \"text\" name = \"program\" placeholder = \"Program of Study (e.g Law)\" id = \"input\"/><br/><br/>
			<select id = \"input\" name=\"degree\">
                <option value=\"Bachelor's Degree\">BS Degree</option>
                <option value=\"Master's Degree\">Masters Degree</option>
                <option value=\"Doctorate\">PhD</option>
            </select><br/><br/>
			<input id = \"input\" type = \"text\" name = \"yAdmission\" placeholder = \"Year of Admission\" id = \"input\"/><br/><br/>
			<input id = "input" type = \"text\" name = \"yGraduation\" placeholder = \"Year of Graduation\" id = \"input\"/><br/><br/>

			<input id = \"input\" type = \"text\" name = \"nCourses\" placeholder = \"Number of Courses\" id = \"input\"/><br/><br/>
			<input id = \"submit\" type = \"submit\" id = \"submit\" name = \"submit\" value= \"Continue\"/>
		</form>
	</div>
	</div>
	</center>

";
	?>