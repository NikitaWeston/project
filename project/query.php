<?php
$dsn = 'mysql:host=localhost;dbname=bookrepository';
$username = 'root';
$password = '';

try {
    $db = new PDO($dsn, $username, $password);
} catch (PDOException $e) {
    echo "Database connection error: " . $e->getMessage();
    exit();
}

// Prepare a query to select all data from the "Users" table
$sql = "SELECT * FROM Users";
$stmt = $db->query($sql);

if ($stmt) {
    echo "<table border='1'>";
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        echo "<tr>";
        foreach ($row as $key => $value) {
            echo "<td><strong>$key:</strong> $value</td>";
        }
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "Error executing the query: " . implode(", ", $db->errorInfo());
}
?>
