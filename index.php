<!-- 
Jimmy Pham
-->

<?php include 'view/header.php';?>
<main>
    <nav>
        <a href="/BookInfo/addBook/add_book_form.php">Add a New Book</a>
        <a href="/BookInfo/viewInventory/view_inventory.php">View Inventory</a>
    </nav>

    <div class="export-options">
        <p>Export Inventory Data:</p>
        <a href="/BookInfo/exportData/export_data.php?format=csv" class="export-button">Export as CSV</a>
        <a href="/BookInfo/exportData/export_data.php?format=json" class="export-button">Export as JSON</a>
    </div>
<?php include 'view/footer.php';?>
