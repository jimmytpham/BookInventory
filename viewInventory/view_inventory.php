<!-- 
Jimmy Pham
-->

<?php
session_start();

// Include the filter logic
include 'filter.php';
?>

<?php include '../view/header2.php';?>
<main>

    <?php
    // Display message 
    if (isset($_SESSION['message'])) {
        echo "<p>" . $_SESSION['message'] . "</p>";
        unset($_SESSION['message']);  // Clear the message after displaying
    }
    ?>
     <h2>Book Inventory</h2>

     <form method="GET" action="view_inventory.php">
        <label for="title">Title:</label>
        <input type="text" name="title" id="title" value="<?php echo isset($_GET['title']) ? $_GET['title'] : ''; ?>" placeholder="Search by Title"><br>

        <label for="author">Author:</label>
        <input type="text" name="author" id="author" value="<?php echo isset($_GET['author']) ? $_GET['author'] : ''; ?>" placeholder="Search by Author"> <br>

        <label for="genre">Genre:</label>
        <input type="text" name="genre" id="genre" value="<?php echo isset($_GET['genre']) ? $_GET['genre'] : ''; ?>" placeholder="Search by Genre"> <br>

        <label for="publication_date">Publication Date:</label>
        <input type="date" name="publication_date" id="publication_date" value="<?php echo isset($_GET['publication_date']) ? $_GET['publication_date'] : ''; ?>"> <br>

        <button type="submit">Filter</button>
    </form>
    <table>
        <thead>
            <tr>
                <th>Title</th>
                <th>Author</th>
                <th>Genre</th>
                <th>Publication Date</th>
                <th>ISBN</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>" . htmlspecialchars($row['title']) . "</td>";
                echo "<td>" . htmlspecialchars($row['author']) . "</td>";
                echo "<td>" . htmlspecialchars($row['genre']) . "</td>";
                echo "<td>" . htmlspecialchars($row['publication_date']) . "</td>";
                echo "<td>" . htmlspecialchars($row['isbn']) . "</td>";
                echo "<td><a href='edit_book.php?id=" . $row['entry_id'] . "'>Edit</a> | 
                        <a href='delete_book.php?id=" . $row['entry_id'] . "' onclick=\"return confirm('Are you sure you want to delete this book?');\">Delete</a></td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>

    <div class="back-button">
        <a href="../index.php" class="button">Back to Home</a>
    </div>


</main>
<?php include '../view/footer.php'?>
