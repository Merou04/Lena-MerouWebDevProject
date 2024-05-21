<?php
session_start();

$host = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "CarTrack_db";
$conn = mysqli_connect($host, $dbuser, $dbpass, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Check if the form is submitted
if (isset($_POST['submit'])) {
    $name = $_POST["name"];
    $birthdate = $_POST["birthdate"];
    $licenseNumber = $_POST["license_number"];
    $status = $_POST["status"];
    $userId = $_POST["user_id"];  // Ensure that user_id is being passed correctly and securely

    // Prepare the SQL statement to prevent SQL injection
    $stmt = $conn->prepare("INSERT INTO Drivers (user_id, name, license_number, status, birthday) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("issss", $userId, $name, $licenseNumber, $status, $birthdate);
    if ($stmt->execute()) {
        // Redirect to the manage drivers page on success
        echo "<script>alert('New driver added successfully'); window.location.href='Manage Drivers.php';</script>";
    } else {
        echo "<script>alert('Error adding driver: " . $stmt->error . "');</script>";
    }
    $stmt->close();
    exit; // Prevent further script execution after redirection
}

// Close the database connection
mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account Creation</title>
    <style>
        body {
            font-family: Arial;
            background-color: #172b4d;
        }
        .block {
            max-width: 400px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h2 {
            text-align: center;
            margin-bottom: 20px;
        }
        label {
            display: block;
            margin-bottom: 5px;
        }
        input, select, textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }
        button {
            background-color: #ffdb58;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            width: 100%;
        }
    </style>
</head>
<body>
    <div class="block">
        <h2>Create a Driver's Account</h2>
        <form action="#" method="post">
            <label for="user_id">User ID:</label>
            <input type="number" id="user_id" name="user_id" required>
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required>
            <label for="birthdate">Birth Date:</label>
            <input type="date" id="birthdate" name="birthdate" required>
            <label for="license_number">License Number:</label>
            <input type="text" id="license_number" name="license_number" required>
            <label for="status">Status:</label>
            <input type="text" id="status" name="status" required>
            <button type="submit" name="submit">Create Account</button>
            <button type="button" onclick="window.history.back();">Cancel</button>
        </form>
    </div>
</body>
</html>
