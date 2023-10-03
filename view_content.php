<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Content</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
    <header>
        <div class="logo"><img height="60px" width="60px" src="eagle-design-for-logo-icon-vector-removebg-preview.png" alt="logo"></div>
        <nav>
            <ul>
                <li><a href="add_content.html">Add Content</a></li>
                <li><a href="view_content.php">View Content</a></li>
            </ul>
        </nav>
    </header>
<?php
// PHP code to fetch and display content from the database
$db = new mysqli('localhost', 'root', 'Shiv@123', 'table'); 

if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}

$sql = "SELECT * FROM `information`";  

$result = $db->query($sql);

if ($result) {
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<h2>" . $row['title'] . "</h2>";
            echo "<p>" . $row['Reviews'] . "</p>";
        }
    } else {
        echo "No content found.";
    }
    $result->free(); // Free the result set
} else {
    echo "Error in SQL query: " . $db->error;
}

$db->close();
?>
<footer>
        &copy; 2023 Your Company
    </footer>
</body>
</html>