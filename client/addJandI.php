<?php
include("connect.php");
include("header.php");
$currentUser = $_COOKIE['current_user'];

if(isset($_POST['submit'])){
    $sql = "select * from clients where email = '$currentUser'";
    $query = mysqli_query($connection,$sql);
    if(!$query){
        echo"Didn't work";
    }

else{
    $data = mysqli_fetch_array($query);
    $id = $data['id'];
    $type = $_POST['type'];
    $name = $_POST['nOffering'];
    $deadline = $_POST['deadline'];
    $desc = $_POST['description'];

    $new_sql = "insert into openings(id, name, type, description, deadline) values ('$id', '$name', '$type','$desc', '$deadline')";
    $new_query = mysqli_query($connection, $new_sql);
    if($new_query){
        $connections_sql = "select * from student_connections where business = '$currentUser'";
        $connections_query = mysqli_query($connections, $connections_sql);
        if(mysqli_num_rows($connections_query) >= 1){
               while($connectionData = mysqli_fetch_assoc($connections_query)){
                $student = $connectionData['student'];
                $text = $name;
                $not_type = "opening";
                $notification_sql = "insert into notifications (source, student, text, type)values('$currentUser', '$student','$text','$not_type')";
                $notification_query = mysqli_query($connection_scout, $notification_sql);
                if(!$notification_query){
                        echo $connection_scout->error;
                    }
                }
        }
}
else{
    print("Update failed : error " . $connection->error);
}
}
}



echo"<center>
        <form id = 'form' name = 'addJnI' method = 'POST' action = 'addJandI.php'>
            <select name = 'type' id = 'input'>
                <option value = 'job'>Job Opening</option>
                <option value = 'internship'>Internship</option>
            </select><br/></br/>
            <input type = 'text' id = 'input' name = 'nOffering' placeholder = 'Name'/><br/><br/>
            <input type = 'text' id = 'input' name = 'deadline' placeholder = 'Deadline (dd/mm/yy)'/><br/><br/>
            <textarea id = \"bio\" name=\"description\" rows=\"20\" cols=\"70\" placeholder = 'Give a short description of the Job/Intership you're offering'></textarea><br/>
            <input id = \"submit\" type = \"submit\" id = \"submit\" name =\"submit\" value= \"Upload\"/><br/><br/>
        </form>
    </center>";


include("footer.php");
?>
