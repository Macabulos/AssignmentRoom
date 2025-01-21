<?php 
include('./connection/session.php'); 
include('connection/dbcon.php');



$get_id=$_POST['get_id'];
$Name=$_POST['name'];
$Academic_Rank=$_POST['Academic_Rank'];
$Designation=$_POST['Designation'];
$Department=$_POST['Department'];


mysqli_query($conn,"update teacher set Name='$Name',Academic_Rank='$Academic_Rank',Designation='$Designation',Department='$Department'
 where teacher_id='$get_id'")or die (mysqli_error());


$logout_query=mysqli_query($conn,"select * from users where User_id=$id_session");
$row=mysqli_fetch_array($logout_query);
$type=$row['User_Type'];


mysqli_query($conn,"insert into history (date,action,data,user)
VALUES (NOW(),'Update Entry Teacher','$Name','$type')") or die(mysqli_error());


header('location:record.php');
?>