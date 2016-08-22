<?php

include("connect.php");
$business = $_COOKIE['business'];
$currentUser = $_COOKIE['current_user'];
if(isset($_POST['follow/unfollow'])){
     $connnection_sql = "select * from student_connections where student = '$currentUser' and business = '$business'"; 
     $connection_query = mysqli_query($connections, $connnection_sql);

     if($connection_query){
     $found = mysqli_num_rows($connection_query);
     if($found == 1){
        $del_sql = "delete from student_connections where student = '$currentUser' and business = '$business'";
        $del_query = mysqli_query($connections,$del_sql);
        if($del_query){
            header("Location:loadbusiness.php");
        }
     }

     else{
        $relation = "Yes";
        $text = $currentUser." is interested in you.";
        $type = "interest";
        $flw_sql = "insert into student_connections (student, business, following) values ('$currentUser', '$business','$relation')";
        $flw_query = mysqli_query($connections, $flw_sql);
        if($flw_query){
            echo"Done";
        }
        else{
            echo $connections->error;
        }
        $notification_sql = "insert into notifications (business, student, text, type)values('$business', '$currentUser','$text','$type')";
        $notification_query = mysqli_query($connection_business, $notification_sql);
        if($notification_query){
            header("Location:loadbusiness.php")
;        }
    }
       
}
}

?>