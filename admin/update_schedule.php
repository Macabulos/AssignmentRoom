<?php 
include('connection/dbcon.php'); // Keeping only the database connection

if (isset($_POST['save'])) {
    // Get the hidden ID and input values
    $id_get = $_POST['id_get'];
    $time_start = $_POST['time_start'];
    $time_end = $_POST['time_end'];
    $subject = $_POST['subject'];
    $teacher = $_POST['teacher'];
    $room = $_POST['room'];

    // Handle Days selection
    $days = [];
    if (!empty($_POST['Monday'])) $days[] = "Monday";
    if (!empty($_POST['Tuesday'])) $days[] = "Tuesday";
    if (!empty($_POST['Wednesday'])) $days[] = "Wednesday";
    if (!empty($_POST['Thursday'])) $days[] = "Thursday";
    if (!empty($_POST['Friday'])) $days[] = "Friday";
    if (!empty($_POST['Saturday'])) $days[] = "Saturday";
    $day = implode(" ", $days);

    // Update query for schedule
    $update_query = "
        UPDATE schedule 
        SET 
            day = '$day',
            time = '$time_start',
            time_end = '$time_end',
            subject = '$subject',
            teacher = '$teacher',
            room = '$room'
        WHERE schedule_id = '$id_get'
    ";

    mysqli_query($conn, $update_query) or die(mysqli_error($conn));

    // Redirect after successful update
    header('Location: schedule.php');
    exit;
}
?>
