<?php
echo"
<center>
	<div id = \"view\">
	<div id = \"signup\">
	<h2>Sign Up Below!</h2><br/>
		<form id = \"signup\" method = \"POST\"	action = \"clientSignup.php\">
			<input id = \"input\" type = \"text\" name = \"cName\" placeholder = \"Client Name\" id = \"input\"/><br/><br/>
			<select id = \"input\" name=\"prefix\">
                <option value=\"Mr\">Mr</option>
                <option value=\"Ms\">Ms</option>
                <option value=\"Mrs\">Mrs</option>
            </select><br/><br/>
            <input id = \"input\" type = \"text\" name = "pContact\" placeholder = \"Person of Contact\" id = \"input\"/><br/><br/>
			<input id = \"input\" type = \"text\" name = \"eAddress\" placeholder = \"E-Mail Address\" id = \"input\"/><br/><br/>
			<input id = \"input\" type = \"password\" name = \"cNumber\" placeholder = \"Phone Number\" id = \"input\"/><br/><br/>
			<input id = \"input\" type = \"password\" name = \"cAddress\" placeholder = \"Physical Address\" id = "input"/><br/><br/>
			<input id = \"input\" type = \"password\" name = \"country\" placeholder = \"Country\" id = \"input\"/><br/><br/>
			<input id = \"submit\" type = \"submit\" id = \"submit\" name = \"submit\" value= \"Continue\"/>
		</form>
	</div>
	</div>
	</center>

";

?>