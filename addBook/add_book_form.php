<!-- 
Jimmy Pham
-->

<?php include '../view/header2.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add a New Book</title>
</head>
<body>
    <main>
        <h1>Add a New Book</h1>
        <form action="process_add_book.php" method="POST">
            <label for="title">Book Title:</label>
            <input type="text" id="title" name="title" required><br><br>
            
            <label for="author">Author:</label>
            <input type="text" id="author" name="author" required><br><br>
            
            <label for="genre">Genre:</label>
            <input type="text" id="genre" name="genre" required><br><br>
            
            <label for="publication_date">Publication Date:</label>
            <input type="date" id="publication_date" name="publication_date" required><br><br>
            
            <label for="isbn">ISBN:</label>
            <input type="text" id="isbn" name="isbn" required><br><br>
            
            <button type="submit">Add Book</button>
        </form>
        <div class="back-button">
            <a href="../index.php" class="button">Back to Home</a>
        </div>
    </main>
</body>
<?php include '../view/footer.php'; ?>
</html>
