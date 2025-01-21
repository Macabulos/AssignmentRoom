<?php 
include('./connection/session.php'); 
include('./components/header.php'); 
include('./connection/dbcon.php'); 
include('./components/nav-top1.php');
include('./components/main.php');
?>
   
<div class="wrapper">
<div id="element" class="hero-body-subject-add">
<div class="nav-content">
<h2><font color="white">Add Teachers</font></h2>
	<a class="btn btn-primary"  href="record.php">  <i class=" icon-arrow-left icon-large"></i>&nbsp;Back</a>
	<hr>
	<div class="teacher">
	   <form id="save_voter" class="form-horizontal" method="POST" action="save_teacher.php">	
    <fieldset>
	</br>
	<div class="new_voter_margin">
	<ul class="thumbnails_new_voter">
    <li class="span3">
    <div class="thumbnail_new_voter">
    
	<div class="control-group">
    <label class="control-label" for="input01">Name:</label>
    <div class="controls">
    <input type="text" name="Name" class="Name" id="span900">
    </div>
    </div>
	
	
	<div class="control-group">
    <label class="control-label" for="input01">Academic Rank:</label>
    <div class="controls">
    <input type="text" name="Academic_Rank" class="Academic_Rank"  id="span900">
    </div>
    </div>
	
		
	<div class="control-group">
    <label class="control-label" for="input01">Designation:</label>
    <div class="controls">
    <input type="text" name="Designation" class="Designation"  id="span900">
    </div>
    </div>
	
	<div class="control-group">
    <label class="control-label" for="input01">Department:</label>
    <div class="controls">
   <select name="Department" class="Department"  id="span9009">
	<option>--Select Department--</option>
<?php $query=mysqli_query($conn,"select * from departmet")or die(mysqli_error);
while($dep=mysqli_fetch_array($query)){
 ?>
 <option><?php echo $dep['department'];?></option>
 <?php }?>
	</select>
    </div>
    </div>
	
	<div class="control-group">

	<div class="control-group">
    <div class="controls">
	<button id="save_voter" class="btn btn-primary" name="save"><i class="icon-save icon-large"></i>Save</button>
	
    </div>
    </div>
	
    </fieldset>
    </form>
	   
	  </div>
	
		</div>
		

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
	    <a href="index.php" class="btn btn-primary">Yes</a>
		</div>
		</div>
		
