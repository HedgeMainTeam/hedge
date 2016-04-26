<?php

echo "

	<center>
	<div id = \"view\">
	<div id = \"signup\">
	<h2>Sign Up Below!</h2><br/>
		<form id = \"signup\" method = \"POST\"	action = \"stdSignup1.php\">
			<input id = \"input\" type = \"text\" name = \"uniCode\" placeholder = \"University Code\" id = \"input\"/><br/><br/>
			<input id = \"input\" type = \"text\" name = \"email\" placeholder = \"Email Address\" id = \"input\"/><br/><br/>
			<input id = \"input\" type = \"text\" name = \"fName\" placeholder = \"Full Name\" id = \"input\"/><br/><br/>
			<input id = "input" type = \"password\" name = \"password\" placeholder = \"Password\" id = \"input\"/><br/><br/>
			<input id = \"input\" type = \"password\" name = \"password2\" placeholder = \"Verify Password\" id = \"input\"/><br/>
			<input id = \"submit\" type = \"submit\" id = \"submit\" name = \"submit\" value= \"Continue\"/>
		</form>
	</div>
	</div>
	</center>

";

?>