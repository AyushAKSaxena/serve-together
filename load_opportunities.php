<?php
include 'db_connect.php';

$query = "SELECT * FROM opportunities";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<div class='opportunity'>";
        echo "<h3>" . $row['title'] . "</h3>";
        echo "<p>" . $row['description'] . "</p>";
        echo "<button class='apply-button' data-id='" . $row['id'] . "'>Apply</button>";
        echo "</div>";
    }
} else {
    echo "<p>No opportunities available at the moment.</p>";
}

mysqli_close($conn);
?>
