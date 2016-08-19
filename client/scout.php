<?php
include("header.php");

	echo"

		<center>
	<div id = \"view\">
		<div id = \"form\">
			<div id = \"inputs\">
			<form id = \"exlore\" method = \"POST\"	action = \"results.php\">

            Field Of Study: <br/><select id = \"exInput\" name=\"type\">
                <option value=\"engineering\">Engineering</option>
                <option value=\"medicine\">Medicine</option>
                <option value=\"pharmacy\">Pharmacy</option>
            </select><br/><br/><br/><br/>

            Choose University:<br/><select id = \"exInput\" name=\"uniName\">
                <option value=\"univeristyID\">University Name</option>
                <option value=\"univeristyID1\">University Name1</option>
                <option value=\"univeristyID2\">University Name2</option>
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