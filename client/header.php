<?php
echo "

	<html>
	<head>
		<title>Hedge - Business</title>
		<link rel=\"stylesheet\" type=\"text/css\" href = \"style.css\"/>
	</head>

<body>
	<div id = \"header\">
		<ul>
			<a href = 'index.php'><li id = \"logo\"><img src = 'hedge_logo.png'/></li></a>";
            if(isset($_COOKIE['current_user'])){
            echo"
            <li><a href=\"logout.php\">Logout</a></li>
   			<li><a href=\"loadJnI.php\">Jobs and Internships</a></li>
            <li><a href=\"scout.php\">Scout</a></li>
   			<li><a href=\"feed.php\">News</a></li>
   			<li><a href=\"profile.php\">Profile</a></li>";
            }
        echo"    
		</ul> 
	</div><br/><br/><br/><br/>

";

?>