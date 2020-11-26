<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "publications";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
// echo "Connected successfully";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Entry Results</title>
</head>

<body>
    <h1>Book Entry Results</h1>
    <?php
    if (isset($_POST['submit'])) {
        $isbn   =   $_POST['isbn'];
        $author =   $_POST['author'];
        $title  =   $_POST['title'];
        $price  =   $_POST['price'];

        $sql = "INSERT INTO `catalogs`(`isbn`,`author`,`title`,`price`)
                 VALUE ('$isbn','$author','$title','$price')";

                 mysqli_query($conn,$sql);

                 echo"<script>aler('Book inserted');</script>";
                 echo"<script>window.location.assign('display_book.php');</script>";
        # code...
    }
    else {
        echo"<script>alert('Failed to insert Book')</script>";
    }
    mysqli_close($conn);
    // TODO 1: Create short variable names.


    // TODO 2: Check and filter data coming from the user.


    // TODO 3: Setup a connection to the appropriate database.


    // TODO 4: Query the database.


    // TODO 5: Display the feedback back to user.


    // TODO 6: Disconnecting from the database.


    ?>
</body>

</html>