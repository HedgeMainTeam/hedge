<?php
$connection = mysqli_connect("localhost", "root", "", "schools" ) or die ("Failed to connect to server : " . mysqli_connect_error());
$connection_students = mysqli_connect("localhost", "root", "", "students" ) or die ("Failed to connect to server : " . mysqli_connect_error());
$connections = mysqli_connect("localhost", "root", "", "students" ) or die ("Failed to connect to server : " . mysqli_connect_error());
$connection_business = mysqli_connect("localhost", "root", "", "students" ) or die ("Failed to connect to server : " . mysqli_connect_error());

?>