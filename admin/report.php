<?php
require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Style\Alignment;

// Database connection details
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "adfc_db";

// Connect to the database
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Updated query based on the actual database structure
$query = "
    SELECT 
        s.schedule_id,
        s.subject,
        s.teacher,
        s.room,
        s.day,
        s.time,
        s.time_end,
        subj.subject_title,
        t.Name as teacher_name
    FROM schedule s
    LEFT JOIN subject subj ON s.subject = subj.subject_code
    LEFT JOIN teacher t ON s.teacher = t.Name
    ORDER BY s.schedule_id DESC";

$result = $conn->query($query);
if (!$result) {
    die("Query failed: " . $conn->error);
}

// Create a new spreadsheet
$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();

// Set up headers with more detailed information
$sheet->setCellValue('A1', 'Schedule ID');
$sheet->setCellValue('B1', 'Subject Code');
$sheet->setCellValue('C1', 'Description');
$sheet->setCellValue('D1', 'Teacher');
$sheet->setCellValue('E1', 'Room');
$sheet->setCellValue('F1', 'Day');
$sheet->setCellValue('G1', 'Start Time');
$sheet->setCellValue('H1', 'End Time');

// Style headers
$headerRange = 'A1:K1';
$sheet->getStyle($headerRange)->applyFromArray([
    'font' => [
        'bold' => true
    ],
    'alignment' => [
        'horizontal' => Alignment::HORIZONTAL_CENTER,
        'vertical' => Alignment::VERTICAL_CENTER
    ]
]);

// Auto-size columns for better readability
foreach (range('A', 'K') as $col) {
    $sheet->getColumnDimension($col)->setAutoSize(true);
}

// Populate data
$currentRow = 2;
while ($data = $result->fetch_assoc()) {
    $sheet->setCellValue('A' . $currentRow, $data['schedule_id']);
    $sheet->setCellValue('B' . $currentRow, $data['subject']);
    $sheet->setCellValue('C' . $currentRow, $data['subject_title']);
    $sheet->setCellValue('D' . $currentRow, $data['teacher_name'] ?? $data['teacher']);
    $sheet->setCellValue('E' . $currentRow, $data['room']);
    $sheet->setCellValue('F' . $currentRow, $data['day']);
    $sheet->setCellValue('G' . $currentRow, $data['time']);
    $sheet->setCellValue('H' . $currentRow, $data['time_end']);
    // Center-align the data cells
    $sheet->getStyle('A' . $currentRow . ':K' . $currentRow)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);

    $currentRow++;
}

// Ensure output directory exists and is writable
$outputDir = 'output/';
if (!is_dir($outputDir)) {
    mkdir($outputDir, 0777, true);
}

if (!is_writable($outputDir)) {
    die("Error: The output directory is not writable.");
}

// Generate unique filename with timestamp
$timestamp = date('Y-m-d_H-i-s');
$outputPath = $outputDir . 'schedule_report_' . $timestamp . '.xlsx';

try {
    $writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
    $writer->save($outputPath);

    echo "<script>
            alert('Schedule report has been generated successfully!');
            window.location.href = 'output/schedule_report_" . $timestamp . ".xlsx';
             
          </script>";
} catch (Exception $e) {
    die("Error saving the Excel file: " . $e->getMessage());
    
}

// Close the database connection
$conn->close();
?>