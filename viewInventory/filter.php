<!-- 
Jimmy Pham
-->

<?php
include '../config/database.php';

// Initialize filter variables
$title = isset($_GET['title']) ? $_GET['title'] : '';
$author = isset($_GET['author']) ? $_GET['author'] : '';
$genre = isset($_GET['genre']) ? $_GET['genre'] : '';
$publication_date = isset($_GET['publication_date']) ? $_GET['publication_date'] : '';

// Start the query
$query = "SELECT * FROM Inventory WHERE 1";

// Add conditions to the query based on the filters
if (!empty($title)) {
    $query .= " AND title LIKE '%" . mysqli_real_escape_string($conn, $title) . "%'";
}
if (!empty($author)) {
    $query .= " AND author LIKE '%" . mysqli_real_escape_string($conn, $author) . "%'";
}
if (!empty($genre)) {
    $query .= " AND genre LIKE '%" . mysqli_real_escape_string($conn, $genre) . "%'";
}
if (!empty($publication_date)) {
    $query .= " AND publication_date = '" . mysqli_real_escape_string($conn, $publication_date) . "'";
}

// Execute the query
$result = mysqli_query($conn, $query);

// Check if query execution was successful
if (!$result) {
    die("Error: " . mysqli_error($conn));
}
?>
