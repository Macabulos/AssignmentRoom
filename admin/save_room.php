<?php 
include('./connection/dbcon.php');
include('./connection/session.php'); 



if (isset($_POST['save'])){

$room_name=$_POST['room_name'];
$Description=$_POST['Description'];


$query=mysqli_query($conn,"select * from room where room_name='$room_name' and description='$Description' ") or die(mysqli_error());
$count=mysqli_num_rows($query);

if ($count==1){
?>
<script type="text/javascript">
alert('Entry Already Exist');
window.location="add_room.php";
</script>
<?php 
}else{

mysqli_query($conn,"insert into room (room_name,description)
VALUES('$room_name','$Description')")or die(mysqli_error());




$logout_query=mysqli_query($conn,"select * from users where User_id=$id_session");
$row=mysqli_fetch_array($logout_query);
$type=$row['User_Type'];


mysqli_query($conn,"insert into history (date,action,data,user)
VALUES (NOW(),'Add Entry Room','$room_name','$type')") or die(mysqli_error());

header('location:room.php');
}
}
?>