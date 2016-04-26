<?php

	echo"

	<center>
	<div id = \"view\">
	<div id = \"signup\">
	<h2>Sign Up Below!</h2><br/>
		<form id = \"signup\" method = \"POST\"	action = \"uniSignup.php\">
			<input id = \"input\" type = \"text\" name = \"uniName\" placeholder = \"Institute Name\" id = \"input\"/><br/><br/>
			<select id = \"input\" name=\"prefix\">
                <option value=\"Mr\">Mr</option>
                <option value=\"Ms\">Ms</option>
                <option value=\"Mrs\">Mrs</option>
            </select><br/><br/>
            <input id = \"input\" type = \"text\" name = \"pContact\" placeholder = \"Person of Contact (Full Name)\" id = \"input\"/><br/><br/>
			<input id = \"input\" type = \"text\" name = \"email\" placeholder = \"E-Mail Address\" id = \"input\"/><br/><br/>
			<input id = \"input\" type = \"password\" name = \"pNumber\" placeholder = \"Contact Number\" id = \"input\"/><br/><br/>
			<input id = \"input\" type = \"password\" name = \"address\" placeholder = \"Physical Address\" id = \"input\"/><br/><br/>
			<input id = \"input\" type = \"password\" name = \"country\" placeholder = \"Country\" id = \"input\"/><br/><br/>
			<input id = \"submit\" type = \"submit\" id = \"submit\" name = \"submit\" value= \"Continue\"/>
		</form>
	</div>
	</div>
	</center>

	";

?>