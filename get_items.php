<?php
// 1. Set the header to tell the browser we are sending JSON data
header('Content-Type: application/json');

// 2. Database Connection Credentials (matching their local XAMPP setup)
$servername = "localhost";
$username = "root"; 
$password = "";     
$dbname = "web_project_db";

// 3. Create Connection
$conn = new mysqli($servername, $username, $password, $dbname);

// 4. Check Connection
if ($conn->connect_error) {
    die(json_encode(["error" => "Connection failed: " . $conn->connect_error]));
}

// 5. The Advanced SQL Query (Addressing outcome SE-12-08)
// We use a JOIN to link the canteen items to their human-readable department names
$sql = "SELECT canteen_items.id, canteen_items.item_name, canteen_items.price, departments.department_name 
        FROM canteen_items 
        JOIN departments ON canteen_items.department_id = departments.id";

$result = $conn->query($sql);

$items = array();

// 6. Fetch data and format as an associative array
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $items[] = $row;
    }
}

// 7. Output the data as a JSON string (The "Bridge")
echo json_encode($items);

$conn->close();
?>