<?php
$connection = mysqli_connect("localhost", "root", "", "businesses" ) or die ("Failed to connect to server : " . mysqli_connect_error());
$connection_scout = mysqli_connect("localhost", "root", "", "students" ) or die ("Failed to connect to server : " . mysqli_connect_error());
$connection_schools = mysqli_connect("localhost", "root", "", "schools" ) or die ("Failed to connect to server : " . mysqli_connect_error());
$connections = mysqli_connect("localhost", "root", "", "connections" ) or die ("Failed to connect to server : " . mysqli_connect_error());
?>