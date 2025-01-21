<?php 
include('./connection/session.php'); 
include('./components/header.php'); 
include('./connection/dbcon.php'); 
include('./components/nav-top1.php');
include('./components/main.php');
$id_get = $_GET['id']; 

// Fetch the current schedule data
$result = mysqli_query($conn, "SELECT * FROM schedule WHERE schedule_id = '$id_get'") or die(mysqli_error($conn));
$row = mysqli_fetch_array($result);

if (isset($_POST['save'])) {
    // Gather form data
    $Monday = isset($_POST['Monday']) ? $_POST['Monday'] : '';
    $Tuesday = isset($_POST['Tuesday']) ? $_POST['Tuesday'] : '';
    $Wednesday = isset($_POST['Wednesday']) ? $_POST['Wednesday'] : '';
    $Thursday = isset($_POST['Thursday']) ? $_POST['Thursday'] : '';
    $Friday = isset($_POST['Friday']) ? $_POST['Friday'] : '';
    $Saturday = isset($_POST['Saturday']) ? $_POST['Saturday'] : '';
    $Sunday = isset($_POST['Sunday']) ? $_POST['Sunday'] : '';
    $day = trim($Monday . " " . $Tuesday . " " . $Wednesday . " " . $Thursday . " " . $Friday . " " . $Saturday . " "  .$Sunday);
    $subject = $_POST['subject'] ?? '';
    $teacher = $_POST['teacher'] ?? '';
    $room = $_POST['room'] ?? '';
    $time_start = $_POST['time_start'] ?? '';
    $time_end = $_POST['time_end'] ?? '';

    // Convert start and end times to timestamps for comparison
    $time_start_timestamp = strtotime($time_start);
    $time_end_timestamp = strtotime($time_end);
    
    // Check if the time difference is more than 3 hours
    if (($time_end_timestamp - $time_start_timestamp) > 3 * 60 * 60) {
        echo "<script>
                alert('The time duration cannot exceed 3 hours.');
                window.location = 'add_schedule.php';
              </script>";
        exit;
    }
    // Input validation: check if required fields are filled
    if (empty($subject) || empty($teacher) || empty($room) || empty($time_start) || empty($time_end) || empty($day)) {
        echo "<script>
                alert('All fields are required. Please fill out the form completely.');
                window.location = 'edit_schedule.php?id=$id_get';
              </script>";
        exit;
    }


    // Split the selected days into an array
    $selected_days = array_filter([
        'Monday' => $Monday,
        'Tuesday' => $Tuesday,
        'Wednesday' => $Wednesday,
        'Thursday' => $Thursday,
        'Friday' => $Friday,
        'Saturday' => $Saturday,
        'Sunday' => $Sunday,
    ]);

    // Check for room and teacher conflicts
    foreach ($selected_days as $day_name => $value) {
        // Check room conflict for this day
        $room_query = mysqli_query($conn, "
            SELECT * FROM schedule 
            WHERE room = '$room' 
            AND day LIKE '%$day_name%'
            AND schedule_id != '$id_get'  -- Exclude the current schedule from the conflict check
            AND (
                ('$time_start' < time_end AND '$time_end' > time) -- Time overlap check
            )
        ") or die(mysqli_error($conn));

        if (mysqli_num_rows($room_query) > 0) {
            echo "<script>
                    alert('$day_name for that time is occupied.');
                    window.location = 'edit_schedule.php?id=$id_get';
                  </script>";
            exit;
        }

        // Check teacher conflict for this day
        $teacher_query = mysqli_query($conn, "
            SELECT * FROM schedule 
            WHERE teacher = '$teacher' 
            AND day LIKE '%$day_name%'
            AND schedule_id != '$id_get'  -- Exclude the current schedule from the conflict check
            AND (
                ('$time_start' < time_end AND '$time_end' > time) -- Time overlap check
            )
        ") or die(mysqli_error($conn));

        if (mysqli_num_rows($teacher_query) > 0) {
            echo "<script>
                    alert('The selected teacher already has a schedule on $day_name for this time.');
                    window.location = 'edit_schedule.php?id=$id_get';
                  </script>";
            exit;
        }
    }

    // If no conflicts, proceed with updating the schedule
    $update_query = mysqli_query($conn, "
        UPDATE schedule 
        SET subject = '$subject', teacher = '$teacher', room = '$room', day = '$day', time = '$time_start', time_end = '$time_end' 
        WHERE schedule_id = '$id_get'
    ") or die(mysqli_error($conn));

    // Redirect back to schedule page
    echo "<script>
            alert('Schedule successfully updated!');
            window.location = 'schedule.php';
          </script>";
    exit;
}

?>

<div class="wrapper">
    <div id="element" class="hero-body">
        <h2><font color="white">Edit Schedule</font></h2>
        <a class="btn btn-primary" href="schedule.php">
            <i class="icon-arrow-left icon-large"></i>&nbsp;Back
        </a>
        <hr>
        <div class="edit_margin">
            <form id="save_voter" class="form-horizontal" method="POST" action="edit_schedule.php?id=<?php echo $id_get; ?>">
                <fieldset>
                <br>
                <div class="add_subject">
                    <ul class="thumbnails_new_voter">
                        <li class="span3">
                            <div class="thumbnail_new_voter">

                            <input type="hidden" name="id_get" class="id_get" value="<?php echo $id_get; ?>">

                            <!-- Day Selection -->
                            <div class="control-group">
                                <label class="control-label" for="input01">Day:</label> <br>
                                <div class="controls">
                                    <div class="day_margin">
                                        Monday:<br>
                                        Tuesday:<br>
                                        Wednesday:<br>
                                        Thursday:<br>
                                        Friday:<br>
                                        Saturday: <br>
                                        Sunday:
                                    </div>
                                    <div class="radio_day">
                                        <input type="checkbox" value="Monday" name="Monday" <?php if (strpos($row['day'], 'Monday') !== false) echo 'checked'; ?>><br>
                                        <input type="checkbox" value="Tuesday" name="Tuesday" <?php if (strpos($row['day'], 'Tuesday') !== false) echo 'checked'; ?>><br>
                                        <input type="checkbox" value="Wednesday" name="Wednesday" <?php if (strpos($row['day'], 'Wednesday') !== false) echo 'checked'; ?>><br>
                                        <input type="checkbox" value="Thursday" name="Thursday" <?php if (strpos($row['day'], 'Thursday') !== false) echo 'checked'; ?>><br>
                                        <input type="checkbox" value="Friday" name="Friday" <?php if (strpos($row['day'], 'Friday') !== false) echo 'checked'; ?>><br>
                                        <input type="checkbox" value="Saturday" name="Saturday" <?php if (strpos($row['day'], 'Saturday') !== false) echo 'checked'; ?>><br>
                                        <input type="checkbox" value="Sunday" name="Sunday" <?php if (strpos($row['day'], 'Sunday') !== false) echo 'checked'; ?>>
                                    </div>
                                </div>
                            </div>

                            <!-- Time Start -->
                            <div class="control-group">
                                <label class="control-label" for="time_start">Time Start:</label>
                                <div class="controls">
                                    <select name="time_start" id="time_start" class="span3333">
                                        <option><?php echo $row['time']; ?></option>
                                        <?php 
                                        $time_query = mysqli_query($conn, "SELECT * FROM time_start") or die(mysqli_error($conn));
                                        while($time_row = mysqli_fetch_array($time_query)) {
                                            echo "<option>{$time_row['time']}</option>";
                                        } ?>
                                    </select>
                                </div>
                            </div>

                            <!-- Time End -->
                            <div class="control-group">
                                <label class="control-label" for="time_end">Time End:</label>
                                <div class="controls">
                                    <select name="time_end" id="time_end" class="span3333">
                                        <option><?php echo $row['time_end']; ?></option>
                                        <?php 
                                        $time_end_query = mysqli_query($conn, "SELECT * FROM time_end") or die(mysqli_error($conn));
                                        while($time_end_row = mysqli_fetch_array($time_end_query)) {
                                            echo "<option>{$time_end_row['time_end']}</option>";
                                        } ?>
                                    </select>
                                </div>
                            </div>

                            <!-- Subject -->
                            <div class="control-group">
                                <label class="control-label" for="subject">Subject:</label>
                                <div class="controls">
                                    <select name="subject" class="span333" id="subject">
                                        <option><?php echo $row['subject']; ?></option>
                                        <?php 
                                        $subject_query = mysqli_query($conn, "SELECT * FROM subject") or die(mysqli_error($conn));
                                        while($subject_row = mysqli_fetch_array($subject_query)) {
                                            echo "<option>{$subject_row['subject_code']}</option>";
                                        } ?>
                                    </select>
                                </div>
                            </div>

                            <!-- Teacher -->
                            <div class="control-group">
                                <label class="control-label" for="teacher">Teacher:</label>
                                <div class="controls">
                                    <select name="teacher" class="span333" id="teacher">
                                        <option><?php echo $row['teacher']; ?></option>
                                        <?php 
                                        $teacher_query = mysqli_query($conn, "SELECT * FROM teacher") or die(mysqli_error($conn));
                                        while($teacher_row = mysqli_fetch_array($teacher_query)) {
                                            echo "<option>{$teacher_row['Name']}</option>";
                                        } ?>
                                    </select>
                                </div>
                            </div>

                            <!-- Room -->
                            <div class="control-group">
                                <label class="control-label" for="room">Room:</label>
                                <div class="controls">
                                    <select name="room" class="span333" id="room">
                                        <option><?php echo $row['room']; ?></option>
                                        <?php 
                                        $room_query = mysqli_query($conn, "SELECT * FROM room") or die(mysqli_error($conn));
                                        while($room_row = mysqli_fetch_array($room_query)) {
                                            echo "<option>{$room_row['room_name']}</option>";
                                        } ?>
                                    </select>
                                </div>
                            </div>

                            <!-- Save Button -->
                            <div class="control-group">
                                <div class="controls">
                                    <button id="save_voter" class="btn btn-primary" name="save">
                                        <i class="icon-save icon-large"></i> Save
                                    </button>
                                </div>
                            </div>

                        </li>
                    </ul>
                </div>
                </fieldset>
            </form>
        </div>
    </div>
</div>
<?php include('footer.php'); ?>
</div>
</body>
