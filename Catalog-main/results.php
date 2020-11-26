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
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Book Search Results</title>
</head>

<body>
    <label>

        <h1>Book Search Results</h1>
        </br>
    </label>
    <div>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>NO</th>
                    <th>ISBN</th>
                    <th>Author</th>
                    <th>Title</th>
                    <th>Price</th>
                </tr>
            </thead>
            <?php
     // TODO 1: Create short variable names. 
    $i=1;
     // TODO 2: Check and filter data coming from the user.
    if (isset($_POST['submit'])) {
        $searchterm = $_POST['searchterm'];
        $searchtype = $_POST['searchtype'];
 
    
    // TODO 3: Setup a connection to the appropriate database.
    $sql = "SELECT * FROM `catalogs` WHERE $searchtype LIKE '%$searchterm'";
    // TODO 4: Query the database.
    $result = $conn->query($sql);

    // TODO 5: Retrieve the results.
    while ($row = $result->fetch_assoc()) {
        $isbn   = $row['isbn'];
        $author = $row['author'];
        $title  = $row['title'];
        $price  = $row['price'];
    // TODO 6: Display the results back to user.
        echo"
        <tr>
        <td>".$i++."</td>
        <td>".$isbn."</td>
        <td>".$author."</td>
        <td>".$title."</td>
        <td>".$price."</td>
        
        <tr>";
        echo "</table>";

        }     
    }
    // TODO 7: Disconnecting from the database.
    mysqli_close($conn); 

?>
    </div>
</body>

</html>