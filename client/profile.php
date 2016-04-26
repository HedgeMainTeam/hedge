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
			<div id = \"stdBio\"><h2>Prerequisites:</h2><p> We are looking for students with an average overall grade of C, we would like to hire engineers, networking specialists and business administrators</p>
			<h2>Email Address:</h2><p> airteladmin@gmail.com</p>
			<button id = "button" onclick = \"parent.location = 'loadJnI'\">Job/Internship Applications</button><br/><br/>
			<button id = "button" onclick = "parent.location = 'follow.php'">Follow</button>
			</div>

				
			</div><br/>
		</div>

	</div>
	</center>

	";
	include("footer.php");
?>