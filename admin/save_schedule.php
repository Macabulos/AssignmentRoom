<?php 
include('./connection/session.php'); 
include('./connection/dbcon.php'); 

// Get selected days
$days = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'];
$selected_days = array_filter(array_map(function($day) {
    return isset($_POST[$day]) ? $day : '';
}, $days));

// Validate form inputs
$subject = trim($_POST['subject'] ?? '');
$teacher = trim($_POST['teacher'] ?? '');
$room = trim($_POST['room'] ?? '');
$time_start = $_POST['time_start'] ?? '';
$time_end = $_POST['time_end'] ?? '';

// Convert time to timestamps for validation
$time_start_timestamp = strtotime($time_start);
$time_end_timestamp = strtotime($time_end);

// Check if required fields are filled
if (!$subject || !$teacher || !$room || !$time_start || !$time_end || empty($selected_days)) {
    echo "<script>
            alert('All fields are required.');
            window.location = 'add_schedule.php';
          </script>";
    exit;
}

// Validate time duration
if (($time_end_timestamp - $time_start_timestamp) > 3 * 60 * 60) {
    echo "<script>
            alert('The time duration cannot exceed 3 hours.');
            window.location = 'add_schedule.php';
          </script>";
    exit;
}

// Prevent exact duplicate entries by checking if schedule exists for any day
$duplicate_found = false;
foreach ($selected_days as $day_name) {
    $duplicate_check_query = "
        SELECT * FROM schedule 
        WHERE subject = ? 
            AND teacher = ? 
            AND room = ? 
            AND day = ? 
            AND time = ? 
            AND time_end = ?";
    
    $stmt = $conn->prepare($duplicate_check_query);
    $stmt->bind_param('ssssss', $subject, $teacher, $room, $day_name, $time_start, $time_end);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $duplicate_found = true;
        break; // Exit loop once a duplicate is found
    }
    $stmt->close();
}

if ($duplicate_found) {
    echo "<script>
            alert('This schedule already exists!');
            window.location = 'add_schedule.php';
          </script>";
    exit;
}

// Check for conflicts in teacher's or room's schedule
foreach ($selected_days as $day_name) {
    $conflict_check_query = "
        SELECT * FROM schedule
        WHERE (room = ? OR teacher = ?) 
        AND day = ? 
        AND ((? < time_end AND ? > time) OR (? < time_end AND ? > time))";

    $stmt = $conn->prepare($conflict_check_query);
    $stmt->bind_param('sssssss', $room, $teacher, $day_name, $time_start, $time_end, $time_start, $time_end);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        echo "<script>
                alert('Conflict detected for $day_name.');
                window.location = 'add_schedule.php';
              </script>";
        exit;
    }
    $stmt->close();
}

// Insert new schedule
$day_string = implode(' ', $selected_days);
$insert_query = $conn->prepare("
    INSERT INTO schedule (subject, teacher, room, day, time, time_end) 
    VALUES (?, ?, ?, ?, ?, ?)");
$insert_query->bind_param('ssssss', $subject, $teacher, $room, $day_string, $time_start, $time_end);

if ($insert_query->execute()) {
    // Log history
    $logout_query = $conn->prepare("SELECT User_Type FROM users WHERE User_id = ?");
    $logout_query->bind_param('i', $id_session);
    $logout_query->execute();
    $user_data = $logout_query->get_result()->fetch_assoc();
    $type = $user_data['User_Type'];

    $history_query = $conn->prepare("
        INSERT INTO history (date, action, data, user) 
        VALUES (NOW(), 'Add Schedule', ?, ?)");
    $history_data = "$time_start to $time_end";
    $history_query->bind_param('ss', $history_data, $type);
    $history_query->execute();

    echo "<script>
            alert('Schedule successfully added!');
            window.location = 'schedule.php';
          </script>";
} else {
    echo "<script>
            alert('Error adding schedule. Please try again.');
            window.location = 'add_schedule.php';
          </script>";
}
?>
