<?php 
include('./connection/session.php'); 
include('./components/header.php'); 
include('./connection/dbcon.php');  
include('./components/nav-top1.php');
include('./components/main.php');
?>

<div class="wrapper ">
    <div id="element" class="hero-body-schedule">
        <h2><font color="white">Add Schedule List</font></h2>
        <a class="btn btn-primary" href="schedule.php"><i class="icon-arrow-left icon-large"></i>&nbsp;Back</a>
        <hr>
        <form id="save_voter" class="form-horizontal" method="POST" action="save_schedule.php" onsubmit="return validateForm()">    
            <fieldset>
                </br>
                <div class="hai_naku">
                    <ul class="thumbnails_new_voter">
                        <li class="span3">
                            <div class="thumbnail_new_voter">
                                <div class="control-group">
                                    <label class="control-label" for="input01">Day:</label>
                                    <div class="controls">
                                        <br>
                                        <div class="day_margin">
                                            Monday:<br>
                                            Tuesday:<br>
                                            Wednesday:<br>
                                            Thursday:<br>
                                            Friday:<br>
                                            Saturday:<br>
                                            Sunday:
                                        </div>

                                        <div class="radio_day">
                                            <input type="checkbox" value="Monday" name="Monday" id="Monday"><br>
                                            <input type="checkbox" value="Tuesday" name="Tuesday" id="Tuesday"><br>
                                            <input type="checkbox" value="Wednesday" name="Wednesday" id="Wednesday"><br>
                                            <input type="checkbox" value="Thursday" name="Thursday" id="Thursday"><br>
                                            <input type="checkbox" value="Friday" name="Friday" id="Friday"><br>
                                            <input type="checkbox" value="Saturday" name="Saturday" id="Saturday"><br>
                                            <input type="checkbox" value="Sunday" name="Sunday" id="Sunday">
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="control-group">
                                    <label class="control-label" for="input01">Time Start:</label>
                                    <div class="controls">
                                        <select name="time_start" class="span3333" id="time_start" required>
                                            <option value="">--Select--</option>
                                            <?php 
                                            $time_query = mysqli_query($conn, "select * from time_start") or die(mysqli_error($conn));
                                            while ($time_row = mysqli_fetch_array($time_query)) {
                                                echo '<option>' . $time_row['time'] . '</option>';
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                
                                <div class="control-group">
                                    <label class="control-label" for="input01">Time End:</label>
                                    <div class="controls">
                                        <select name="time_end" id="time_end" class="span3333" required>
                                            <option value="">--Select--</option>
                                            <?php 
                                            $time_end_query = mysqli_query($conn, "select * from time_end order by time_end_id ASC") or die(mysqli_error($conn));
                                            while ($time_end_row = mysqli_fetch_array($time_end_query)) {
                                                echo '<option>' . $time_end_row['time_end'] . '</option>';
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                
                                <!-- <div class="control-group">
                                    <label class="control-label" for="input01">Semester:</label>
                                    <div class="controls">
                                        <select name="semester" class="span3333" id="semester">
                                            <option>--Select--</option>
                                            <option>1st</option>
                                            <option>2nd</option>
                                            <option>Summer</option>
                                        </select>
                                    </div>
                                </div> -->
                                
                                <!-- <div class="control-group">
                                    <label class="control-label" for="input01">School Year:</label>
                                    <div class="controls">
                                        <select name="sy" class="span3333" id="sy">
                                            <option>--Select--</option>
                                            <?php 
                                            $sy_query = mysqli_query($conn, "select * from sy") or die(mysqli_error($conn));
                                            while ($sy_row = mysqli_fetch_array($sy_query)) {
                                                echo '<option>' . $sy_row['sy'] . '</option>';
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div> -->
                                
                                <div class="control-group">
                                    <label class="control-label" for="input01">Subject:</label>
                                    <div class="controls">
                                        <select name="subject" class="span333" id="subject" required>
                                            <option value="">--Select--</option>
                                            <?php 
                                            $subject_query = mysqli_query($conn, "select * from subject") or die(mysqli_error($conn));
                                            while ($subject_row = mysqli_fetch_array($subject_query)) {
                                                echo '<option>' . $subject_row['subject_code'] . '</option>';
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                
                                <div class="control-group">
                                    <label class="control-label" for="input01">Teacher:</label>
                                    <div class="controls">
                                        <select name="teacher" class="span333" id="teacher" required>
                                            <option value="">--Select--</option>
                                            <?php 
                                            $teacher_query = mysqli_query($conn, "select * from teacher") or die(mysqli_error($conn));
                                            while ($teacher_row = mysqli_fetch_array($teacher_query)) {
                                                echo '<option>' . $teacher_row['Name'] . '</option>';
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label" for="input01">Room:</label>
                                    <div class="controls">
                                        <select name="room" class="span3333" id="room" required>
                                            <option value="">--Select--</option>
                                            <?php 
                                            $room_query = mysqli_query($conn, "select * from room") or die(mysqli_error($conn));
                                            while ($room_row = mysqli_fetch_array($room_query)) {
                                                echo '<option>' . $room_row['room_name'] . '</option>';
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                
                                <div class="control-group">
                                    <div class="controls">
                                        <button id="save_voter" class="btn btn-primary" name="save"><i class="icon-save icon-large"></i>Save</button>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </fieldset>
        </form>
    </div>
</div>

<script>
function validateForm() {
    var dayChecked = false;
    var dayElements = document.getElementsByClassName('radio_day')[0].getElementsByTagName('input');

    for (var i = 0; i < dayElements.length; i++) {
        if (dayElements[i].checked) {
            dayChecked = true;
            break;
        }
    }

    if (!dayChecked) {
        alert("Please select at least one day.");
        return false;
    }
    return true;
}
</script>

<?php include('footer.php'); ?>
<div class="modal hide fade" id="myModal">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">×</button>
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
</html>
