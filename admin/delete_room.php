<?php 
include('./connection/dbcon.php');
include('./connection/session.php'); 


$id=$_GET['id'];

$logout_query=mysqli_query($conn,"select * from users where User_id=$id_session")or die(mysqli_error());
$user_row=mysqli_fetch_array($logout_query);
$user_name=$user_row['User_Type'];


$result=mysqli_query($conn,"select * from room where room_id='$id'")or die(mysqli_error);
$row=mysqli_fetch_array($result);
$f=$row['room_name'];



mysqli_query($conn,"delete from room where room_id='$id'")or die(mysqli_error());
mysqli_query($conn,"INSERT INTO history (data,action,date,user)VALUES('$f', 'Delete Room', NOW(),'$user_name')")or die(mysqli_error());


header('location:room.php');
?>