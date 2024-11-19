<!-- 
Jimmy Pham
-->

<?php
session_start();
include '../config/database.php';

// Get the book ID 
if (!isset($_GET['id'])) {
    die("Invalid request.");
}

$book_id = intval($_GET['id']);

// Delete the book from the database
$query = "DELETE FROM Inventory WHERE entry_id = $book_id";

if (mysqli_query($conn, $query)) {
    $_SESSION['message'] = "Book deleted successfully.";
} else {
    $_SESSION['message'] = "Error: " . mysqli_error($conn);
}

// Redirect to the inventory page
header("Location: view_inventory.php");
exit;
?>
