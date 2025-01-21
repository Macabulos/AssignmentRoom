<?php 
include('./connection/dbcon.php');
include('./connection/session.php'); 


$get_id=$_POST['get_id'];
$room_name=$_POST['room_name'];
$Description=$_POST['Description'];


mysqli_query($conn,"update room set room_name='$room_name',description='$Description' where room_id='$get_id'")or die(mysqli_error());


$logout_query=mysqli_query($conn,"select * from users where User_id=$id_session");
$row=mysqli_fetch_array($logout_query);
$type=$row['User_Type'];


mysqli_query($conn,"insert into history (date,action,data,user)
VALUES (NOW(),'Update Entry Room','$room_name','$type')") or die(mysqli_error());

header('location:room.php');
?>