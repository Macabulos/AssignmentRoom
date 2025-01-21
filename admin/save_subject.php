<?php 
include('./connection/dbcon.php');
include('./connection/session.php'); 


$Subject_Code=$_POST['Subject_Code'];
$Subject_Title=$_POST['Subject_Title'];
$Category=$_POST['Category'];
$Semester=$_POST['Semester'];



mysqli_query($conn,"insert into subject (subject_code,subject_title,subject_category,semester)
VALUES('$Subject_Code','$Subject_Title','$Category','$Semester')")or die(mysqli_error());




$logout_query=mysqli_query($conn,"select * from users where User_id=$id_session");
$row=mysqli_fetch_array($logout_query);
$type=$row['User_Type'];


mysqli_query($conn,"insert into history (date,action,data,user)
VALUES (NOW(),'Add Entry subject','$Subject_Code','$type')") or die(mysqli_error());



header('location:subject.php');
?>