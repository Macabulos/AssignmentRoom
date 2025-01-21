<?php 
include('./connection/session.php'); 
include('connection/dbcon.php');


$Name=$_POST['Name'];
$Academic_Rank=$_POST['Academic_Rank'];
$Designation=$_POST['Designation'];
$Department=$_POST['Department'];


$save = mysqli_query($conn,"insert into teacher (Name,Academic_Rank,Designation,Department)
VALUES('$Name','$Academic_Rank','$Designation','$Department')")or die(mysqli_error());

if($save){


$logout_query=mysqli_query($conn,"select * from users where User_id=$id_session");
$row=mysqli_fetch_array($logout_query);
$type=$row['User_Type'];


mysqli_query($conn,"insert into history (date,action,data,user)
VALUES (NOW(),'Add Entry Teacher','$Name','$type')") or die(mysqli_error());


header('location:record.php');
}else{
	echo "insert into teacher (Name,Academic_Rank,Designation,Department)
VALUES('Name','$Academic_Rank','$Designation','$Department')";
}
?>