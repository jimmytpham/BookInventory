<!-- 
Jimmy Pham
-->

<?php
session_start();
include '../config/database.php';

// Check the requested format
if (!isset($_GET['format']) || !in_array($_GET['format'], ['csv', 'json'])) {
    die("Invalid export format.");
}

$format = $_GET['format'];

// Fetch all inventory data from the database
$query = "SELECT * FROM Inventory";
$result = mysqli_query($conn, $query);

if (!$result) {
    die("Error fetching data: " . mysqli_error($conn));
}

// Prepare data for export
$data = [];
while ($row = mysqli_fetch_assoc($result)) {
    $data[] = $row;
}

// Export in the requested format
if ($format === 'csv') {
    header('Content-Type: text/csv');
    header('Content-Disposition: attachment; filename="book_inventory.csv"');

    // Open output stream
    $output = fopen('php://output', 'w');

    // Write the header row
    if (!empty($data)) {
        fputcsv($output, array_keys($data[0]));
    }

    // Write the data rows
    foreach ($data as $row) {
        fputcsv($output, $row);
    }

    fclose($output);
    exit;
} elseif ($format === 'json') {
    header('Content-Type: application/json');
    header('Content-Disposition: attachment; filename="book_inventory.json"');

    echo json_encode($data, JSON_PRETTY_PRINT);
    exit;
}
?>
