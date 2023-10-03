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
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $title = $_POST['title']; // Corrected variable name
        $reviews = $_POST['reviews'];

        // Database credentials
        $servername = "localhost";
        $username = "root";
        $password = "Shiv@123";
        $database = "table"; 

        // Create a database connection
        $db = new mysqli($servername, $username, $password, $database);

        // Check the database connection
        if ($db->connect_error) {
            die("Connection failed: " . $db->connect_error);
        }

        $title = $db->real_escape_string($title); // Corrected variable name
        $reviews = $db->real_escape_string($reviews);

        // Insert data into the database
        $sql = "INSERT INTO `information` (`title`, `reviews`) VALUES ('$title', '$reviews')"; // Use backticks for table and column names

        if ($db->query($sql) === TRUE) {
            echo "Content added successfully.";
        } else {
            echo "Error: " . $sql . "<br>" . $db->error;
        }

        // Close the database connection
        $db->close();
    }
    ?>

    <footer>
        &copy; 2023 Your Company
    </footer>
</body>
</html>
