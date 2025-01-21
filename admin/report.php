<?php
require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Style\Alignment;

// Database connection details
$servername = "localhost";
$username = "root"; // Default username for XAMPP
$password = "";     // Default password for XAMPP
$dbname = "adfc_db";

// Connect to the database
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Database query
$query = "
SELECT schedule.*, subject.subject_title, teacher.Name
FROM schedule
LEFT JOIN subject ON schedule.subject = subject.subject_code
LEFT JOIN teacher ON teacher.teacher_id = teacher.teacher_id
GROUP BY schedule.schedule_id
ORDER BY schedule.schedule_id DESC";

// Execute query and check for errors
$result = $conn->query($query);
if (!$result) {
    die("Query failed: " . $conn->error);
}

// Create a new spreadsheet
$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();

// Add headers for the spreadsheet
$sheet->setCellValue('A1', 'Subject');
$sheet->setCellValue('B1', 'Teacher');
$sheet->setCellValue('C1', 'Start Time');
$sheet->setCellValue('D1', 'End Time');

// Style headers (make them bold and center them)
$sheet->getStyle('A1:D1')->getFont()->setBold(true);
$sheet->getStyle('A1:D1')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
$sheet->getStyle('A1:D1')->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);

// Start populating the rows with data
$currentRow = 2; // Start from the second row, because the first row has headers

while ($data = $result->fetch_assoc()) {
    $sheet->setCellValue('A' . $currentRow, $data['subject_title']);
    $sheet->setCellValue('B' . $currentRow, $data['Name']);
    $sheet->setCellValue('C' . $currentRow, $data['start_time']);
    $sheet->setCellValue('D' . $currentRow, $data['end_time']);
    
    $currentRow++;
}

// Ensure output directory exists and is writable
$outputDir = 'C:/xampp/htdocs/Ass/admin/output/';
if (!is_dir($outputDir)) {
    mkdir($outputDir, 0777, true);
}
if (!is_writable($outputDir)) {
    die("Error: The output directory is not writable.");
}

// Path to save the generated Excel file
$outputPath = $outputDir . 'schedule_report.xlsx';

try {
    $writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
    $writer->save($outputPath);
    
    echo "<script>
            alert('Excel report created successfully!');
            window.location.href = 'schedule.php';  // Redirect to desired page
          </script>";
} catch (Exception $e) {
    die("Error saving the Excel file: " . $e->getMessage());
}

// Close the database connection
$conn->close();
?>
