<?php 
include('./connection/session.php'); 
include('./components/header.php'); 
include('./connection/dbcon.php'); 
include('./components/nav-top1.php');
include('./components/main.php');
include('./components/side.php');
$id_get=$_GET['id'];
?>


<div class="wrapper">


<div id="element" class="hero-body-subject-add">
<div class="nav-content">
<h2><font color="white">Edit Subject</font></h2>
	<a class="btn btn-primary"  href="subject.php"><i class=" icon-arrow-left icon-large"></i>&nbsp;Back</a>
	<hr>
	 <form id="save_voter" class="form-horizontal" method="POST" action="update_subject.php">	
    <fieldset>
	</br>
	<?php $result=mysqli_query($conn,"select * from subject where Subject_id='$id_get'")or die(mysqli_error());
$row=mysqli_fetch_array($result);
	?>
	
	<input type="hidden" name="id_get" class="id_get" value="<?php echo $id_get; ?>">
	<div class="add_subject">
	<ul class="thumbnails_new_voter">
    <li class="span3">
    <div class="thumbnail_new_voter">
    <div class="control-group">
    <label class="control-label" for="input01">Subject Code:</label>
    <div class="controls">
    <input type="text" id="span900" name="Subject_Code" class="Subject_Code" value="<?php echo $row['subject_code']; ?>">
    </div>
    </div>
	
	<div class="control-group">
    <label class="control-label" for="input01">Subject Title:</label>
    <div class="controls">
    <input type="text" id="span900" name="Subject_Title" class="Subject_Title" value="<?php echo $row['subject_title']; ?>">
    </div>
    </div>
	
	
	
	<div class="control-group">
    <label class="control-label" for="input01">Subject Category:</label>
    <div class="controls">
   <select name="Category" id="span900" class="Category">
	<option><?php echo $row['subject_category']; ?></option>
	<option>Major</option>
	<option>Minor</option>
	</select>
    </div>
    </div>
	
	
	
	
	<div class="control-group">
    <label class="control-label" for="input01">Semester:</label>
    <div class="controls">
   <select name="Semester" class="Semester" id="span900">
	<option><?php echo $row['semester']; ?></option>
	<option>1st</option>
	<option>2nd</option>
	</select>
    </div>
    </div>
	

	
	


	<div class="control-group">
    <div class="controls">
	<button id="save_voter" class="btn btn-primary" name="save"><i class="icon-save icon-large"></i>Save</button>
    </div>
    </div>

	
    </fieldset>
    </form>
	 

</div>





	</div>	

<?php include('footer.php');?>
</div>
</body>
	<div class="modal hide fade" id="myModal">
	<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal">�</button>
	    <h3> </h3>
	  </div>
	  <div class="modal-body">
	    <p><font color="gray">Are You Sure you Want to LogOut?</font></p>
	  </div>
	  <div class="modal-footer">
	    <a href="#" class="btn" data-dismiss="modal">No</a>
	    <a href="logout.php" class="btn btn-primary">Yes</a>
		</div>
		</div>
		


	   
	  	