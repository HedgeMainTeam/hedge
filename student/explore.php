<?php
include("header.php");

echo"
<center>
	<div id = \"view\">
		<div id = \"form\">
			<div id = \"inputs\">
			<form id = \"exlore\" method = \"POST\"	action = \"explore.php\">
			
			What Type of Business: <select id = \"exInput\" name=\"type\">
                <option value=\"manufacturing\">Manufacturing</option>
                <option value=\"engineering\">Engineering</option>
                <option value=\"fashion\">Fashion</option>
            </select><br/><br/>

            Country of Location: <select id = \"exInput\" name=\"nation\">
                <option value=\"zambia\">Zambia</option>
                <option value=\"namibia\">Namibia</option>
                <option value=\"south_africa\">South Africa</option>
            </select><br/><br/><br/><br/><br/>

			<input id = \"submit\" type = \"submit\" id = \"submit\" name = \"submit\" value= \"Explore\"/><br/><br/>
		</form>
			</div><br/>

		</div>

	</div></center>

";
include("footer.php");
?>