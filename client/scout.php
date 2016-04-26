<?php
include("header.php");

	echo"

		<center>
	<div id = \"view\">
		<div id = \"form\">
			<div id = \"inputs\">
			<form id = \"exlore\" method = \"POST\"	action = \"results.php\">

            <input id = \"exInput\" type = \"text\" name = \"name\" placeholder = \"Student Name\" /><br/><br/>
            <input id = \"exInput\" type = \"text\" name = \"uniName\" placeholder = \"University Name\"/><br/><br/>

            Field Of Study: <br/><select id = \"exInput\" name=\"type\">
                <option value=\"engineering\">Engineering</option>
                <option value=\"medicine\">Medicine</option>
                <option value=\"pharmacy\">Pharmacy</option>
            </select><br/><br/>

            Country of Location:<br/> <select id = \"exInput\" name=\"nation\">
                <option value=\"zambia\">Zambia</option>
                <option value=\"namibia\">Namibia</option>
                <option value=\"south_africa\">South Africa</option>
                </select><br/><br/>

			<input id = \"submit\" type = \"submit\" id = \"submit\" name = \"submit\" value= \"Search\"/><br/><br/>
		</form>
			</div><br/>

		</div>

	</div></center>

	";

include("footer.php");
?>