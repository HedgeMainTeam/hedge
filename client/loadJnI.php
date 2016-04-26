<?php

	include("header.php");
	echo"

	<center>
	<div id = \"view\">
		<div id = \"profile\">
			<div id = \"student\">
			<div id = \"info\">
			<h2>Airtel Zambia</h2><br/>
			<h3>Students: 10 / 20 </h3>
			<h3>Address: Building 43 Great East Road, Zambia.</h3>
			</div>
			<div id = \"stdRight\">
			<h2>Performance</h2>
				<table id = \"grades\" border = \"1\">
					<tr><th>Jobs and Interships</th><th>Deadline</th><th>Information</th></tr>
					<tr><td>Software Engineer</td><td>10/09/2017</td><td><button id = "button" onclick = \"parent.location = 'loadDescription.php'\">More Info</button></td></tr>
					<tr><td>Networking Specialist</td><td>13/05/2017</td><td><button id = \"button\" onclick = \"parent.location = 'loadDescription.php'\">More Info</button></td></tr>
					<tr><td>Floor Designer</td><td>12/08/2017</td><td><button id = \"button\" onclick = \"parent.location = 'loadDescription.php'\">More Info</button></td></tr>
					</table>
			</div><br/>
		</div>

	</div>
	</center>

	";
	include("footer.php");
?>