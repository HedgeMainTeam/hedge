<?php
include("header.php");

if(isset($_COOKIE['total']) && isset ($_COOKIE['number'])){
    setcookie("total", "", time() - 3600, "/");
    setcookie("number", "", time() - 3600, "/");
}

if(isset($_POST['submit'])){
    $total = $_POST['num'];
    $number = $_POST['cNumber'];
    setcookie("total", $total, time() + 24 * 60 * 60, "/");
    setcookie("number", $number, time() + 24 * 60 * 60, "/");
    header("Location:insert.php");
}

echo"<br/><br/><br/><br/><br/><br/><center><h2>Number of Students</h2>
    <form name = 'form' method = 'POST' action = 'pre_insert.php'>
    <input id = \"input\" type = \"text\" name = \"cNumber\" placeholder = \"Course Number\" id = \"input\"/><br/><br/>
        <select id = 'input' name = 'num'>
            <option value = '10'>10</option>
            <option value = '20'>20</option>
            <option value = '30'>30</option>
            <option value = '40'>40</option>
        </select><br/>

    <input type = 'submit' name = 'submit' value = 'Start' id = 'submit'/>
    </form>
    </center><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
";


include("footer.php");

?>