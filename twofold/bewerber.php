<?php
include("db/db_connection.php");

// Execute the query
$sql = "SELECT * FROM products";
$result = $conn->query($sql);

if (!$result) {
    die("Query failed: " . $conn->error);
}

$rows = []; // Initialize an array to store the rows

// Fetch all rows and add them to the array
while ($row = $result->fetch_assoc()) {
    // Sanitize data to ensure it contains only valid UTF-8 characters
    $sanitized_row = array_map('utf8_encode', $row);
    $rows[] = $sanitized_row;
}

// Encode the array of rows in JSON format
$json = json_encode($rows);

// Check for JSON encoding errors
if (json_last_error() !== JSON_ERROR_NONE) {
    die("JSON encoding failed: " . json_last_error_msg());
}

// Output the JSON
echo $json;

// Close the database connection
$conn->close();
?>
