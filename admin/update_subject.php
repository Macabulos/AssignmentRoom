<?php 
include('./connection/dbcon.php');
include('./connection/session.php'); 

if (isset($_POST['save'])){

$id_get=$_POST['id_get'];
$Subject_Code=$_POST['Subject_Code'];
$Subject_Title=$_POST['Subject_Title'];
$Category=$_POST['Category'];
$Semester=$_POST['Semester'];


mysqli_query($conn,"update subject set subject_code='$Subject_Code',subject_title='$Subject_Title',subject_category='$Category',semester='$Semester'

 where subject_id='$id_get'")or die(mysqli_error());



$logout_query=mysqli_query($conn,"select * from users where User_id=$id_session");
$row=mysqli_fetch_array($logout_query);
$type=$row['User_Type'];


mysqli_query($conn,"insert into history (date,action,data,user)
VALUES (NOW(),'Update Entry subject','$Subject_Code','$type')") or die(mysqli_error());


header('location:subject.php');

}
?>