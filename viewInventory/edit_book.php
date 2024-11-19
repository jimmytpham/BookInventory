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

// Fetch book current details
$query = "SELECT * FROM inventory WHERE entry_id = $book_id";
$result = mysqli_query($conn, $query);

if (!$result || mysqli_num_rows($result) == 0) {
    die("Book not found.");
}

$book = mysqli_fetch_assoc($result);
?>

<?php include '../view/header2.php'; ?>
<main>
    <h2>Edit Book Details</h2>
    <form action="update_book.php" method="POST">
        <input type="hidden" name="entry_id" value="<?php echo $book['entry_id']; ?>">
        <label for="title">Title:</label>
        <input type="text" name="title" id="title" value="<?php echo htmlspecialchars($book['title']); ?>"><br>

        <label for="author">Author:</label>
        <input type="text" name="author" id="author" value="<?php echo htmlspecialchars($book['author']); ?>"><br>

        <label for="genre">Genre:</label>
        <input type="text" name="genre" id="genre" value="<?php echo htmlspecialchars($book['genre']); ?>"><br>

        <label for="publication_date">Publication Date:</label>
        <input type="date" name="publication_date" id="publication_date" value="<?php echo htmlspecialchars($book['publication_date']); ?>"><br>

        <label for="isbn">ISBN:</label>
        <input type="text" name="isbn" id="isbn" value="<?php echo htmlspecialchars($book['isbn']); ?>"><br>

        <button type="submit">Update Book</button>
    </form>
    <div class="back-button">
        <a href="../index.php" class="button">Back to Home</a>
    </div>
</main>
<?php include '../view/footer.php'; ?>
