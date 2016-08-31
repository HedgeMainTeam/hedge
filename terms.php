<?php
//location of the pdf file on the server

$filename = "Hedge terms and conditions.pdf";

//let the browser know that a pdf file is coming
header("Content-type: application.pdf");
header("Content-Length: ".
filesize($filename));

//send the file to the browser
readfile($filename);
exit;

?>