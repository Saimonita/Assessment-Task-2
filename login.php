<?php
$servername = "localhost";
$username = "root"; 
$password = "";     
$dbname = "web_project_db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $input_user = $_POST['username'];
    $input_pass = $_POST['password'];

    // Check the database for a matching user
    $stmt = $conn->prepare("SELECT * FROM users WHERE username = ? AND password = ?");
    $stmt->bind_param("ss", $input_user, $input_pass);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        echo "Login Successful! Welcome.";
    } else {
        echo "Invalid username or password.";
    }
    $stmt->close();
}
$conn->close();
?>