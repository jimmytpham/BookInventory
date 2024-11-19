<!-- 
Jimmy Pham
-->

<?php
session_start();

include '../config/database.php';

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the form data
    $title = mysqli_real_escape_string($conn, $_POST['title']);
    $author = mysqli_real_escape_string($conn, $_POST['author']);
    $genre = mysqli_real_escape_string($conn, $_POST['genre']);
    $publication_date = mysqli_real_escape_string($conn, $_POST['publication_date']);
    $isbn = mysqli_real_escape_string($conn, $_POST['isbn']);
    
    // Validate fields
    if (empty($title) || empty($author) || empty($genre) || empty($publication_date) || empty($isbn)) {
        die("Please fill in all fields.");
    }

    // SQL Query to insert data into inventory table
    $query = "INSERT INTO inventory (title, author, genre, publication_date, isbn) 
              VALUES ('$title', '$author', '$genre', '$publication_date', '$isbn')";

    // Execute the query
    if (mysqli_query($conn, $query)) {
        $_SESSION['message'] = "New book added successfully.";
    } else {
        $_SESSION['message'] = "Error: " . mysqli_error($conn);
    }

    // Redirect or display a success message
    // For example, you could redirect back to the inventory page after successful insertion
    header("Location: ../viewInventory/view_inventory.php");
    exit();
}
?>
