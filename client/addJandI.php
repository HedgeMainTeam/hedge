<?php
include("connect.php");
include("header.php");
$currentUser = $_COOKIE['current_user'];
if(!$currentUser){
    header("Location:../index.php");
}

if(isset($_POST['submit'])){
    $sql = "select * from clients where email = '$currentUser'";
    $query = mysqli_query($connection,$sql);
    if(!$query){
        echo"Didn't work";
    }

else{
        $openingSql= "select * from openings where id = '$id'";
        $openingQuery = mysqli_query($connection,$openingSql);
        $total = mysqli_num_rows($openingQuery);                

        if(!$openingQuery){
            echo "Something else went wrong";
        }                   
   if($total == 10){
    echo"<br/><br/><br/><br/><center>
            <div id = \"nCard\">
				<h2>Sorry you have reached the mazimum number of Job/Internship openings.<br/>Delete any of your previous ones if you wish to continue</h2>
			    </div><br/>
            </center><br/><br/><br/><br/>";
    }     

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
        header("Location:loadJnI.php");
}
else{
    print("Update failed : error " . $connection->error);
}
}
}




else{
echo
        
        "<center>
        <form id = 'form' name = 'addJnI' method = 'POST' action = 'addJandI.php'>
            <select name = 'type' id = 'input'>
                <option value = 'Job'>Job Opening</option>
                <option value = 'Internship'>Internship</option>
            </select><br/></br/>
            <input type = 'text' id = 'input' name = 'nOffering' placeholder = 'Title'/><br/><br/>
            <input type = 'text' id = 'input' name = 'deadline' placeholder = 'Deadline (dd/mm/yy)'/><br/><br/>
            <textarea id = \"bio\" name=\"description\" rows=\"20\" cols=\"70\" placeholder = 'Give a short description of the Job/Intership you're offering'></textarea><br/>
            <input id = \"submit\" type = \"submit\" id = \"submit\" name =\"submit\" value= \"Upload\"/><br/><br/>
        </form>
    </center>";
}


include("footer.php");
?>
