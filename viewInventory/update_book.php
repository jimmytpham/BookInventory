<!-- 
Jimmy Pham
-->

<?php
session_start();
include '../config/database.php';

// Check if the form was submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $entry_id = intval($_POST['entry_id']);
    $title = mysqli_real_escape_string($conn, $_POST['title']);
    $author = mysqli_real_escape_string($conn, $_POST['author']);
    $genre = mysqli_real_escape_string($conn, $_POST['genre']);
    $publication_date = mysqli_real_escape_string($conn, $_POST['publication_date']);
    $isbn = mysqli_real_escape_string($conn, $_POST['isbn']);

    // Update the book details
    $query = "UPDATE Inventory 
              SET title = '$title', author = '$author', genre = '$genre', publication_date = '$publication_date', isbn = '$isbn' 
              WHERE entry_id = $entry_id";

    if (mysqli_query($conn, $query)) {
        $_SESSION['message'] = "Book updated successfully.";
    } else {
        $_SESSION['message'] = "Error: " . mysqli_error($conn);
    }

    // Redirect to the inventory page
    header("Location: view_inventory.php");
    exit;
}
?>
