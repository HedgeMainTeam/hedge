<?php
echo "

	<html>
	<head>
		<title>Instructor</title>
		<link rel=\"stylesheet\" type=\"text/css\" href = \"style.css\"/>
	</head>

<body>
	<div id = \"header\">
		<ul>
			<a href = 'index.php'><li id = \"logo\"><img src = 'hedge_logo.png'/></li></a>";

            if(isset($_COOKIE['current_user'])){
                echo"<li><a href=\"logout.php\">Logout</a></li>";
            }
        echo"    
		</ul> 
	</div><br/><br/><br/><br/>

";

?>