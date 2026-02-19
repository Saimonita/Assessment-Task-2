<?php
// 1. Database Connection Credentials
$servername = "localhost";
$username = "root"; // Default XAMPP username
$password = "";     // Default XAMPP password is empty
$dbname = "web_project_db";

// 2. Create Connection
$conn = new mysqli($servername, $username, $password, $dbname);

// 3. Check Connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// 4. Handle Form Submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // Sanitize and Collect Data
    $email = htmlspecialchars($_POST['email']);
    $subject = htmlspecialchars($_POST['subject']);
    $message = htmlspecialchars($_POST['message']);

    // Prepare SQL Statement (Security: Prevents SQL Injection)
    $stmt = $conn->prepare("INSERT INTO contact_messages (user_email, subject_line, message_text) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $email, $subject, $message);

    // Execute and Redirect
    if ($stmt->execute()) {
        header("Location: success.html");
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}
$conn->close();
?>