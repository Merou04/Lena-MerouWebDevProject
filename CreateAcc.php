<?php
session_start();

$host = "localhost";
$dbuser = "root";
$dbpass = "Raouf120304";
$dbname = "cartrack_db";
$conn = mysqli_connect($host, $dbuser, $dbpass, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Check if the form is submitted
if (isset($_POST['submit'])) {
    $name = $_POST["name"];
    $birthdate = $_POST["birth_date"];
    $licenseNumber = $_POST["license_type"];
    $status = $_POST["status"];
    $userId = $_POST["user_id"];

    // Handle file upload
    if (isset($_FILES['driver_pic']) && $_FILES['driver_pic']['error'] == 0) {
        $pic = addslashes(file_get_contents($_FILES['driver_pic']['tmp_name']));
    } else {
        $pic = null; // or handle the error as you prefer
    }

    // Prepare the SQL statement to prevent SQL injection
    $stmt = $conn->prepare("INSERT INTO Drivers (user_id, name, license_type, status, birth_date, Pic_Driver) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("isssss", $userId, $name, $licenseNumber, $status, $birthdate, $pic);
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
            position: relative;
            min-height: 100vh;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .block {
            max-width: 400px;
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
        .logout-button {
            position: absolute;
            top: 10px;
            right: 10px;
            background-color: #FF0000;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
        }
        .logout-button:hover {
            background-color: #cc0000;
        }
        .back-button {
            position: absolute;
            bottom: 10px;
            left: 10px;
            background-color: #87CEEB;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
        }
        .back-button:hover {
            background-color: #00BFFF;
        }
    </style>
</head>
<body>
    <a href="Index.php" class="logout-button">Se déconnecter</a>
    <div class="block">
        <h2>Create a Driver's Account</h2>
        <form action="#" method="post" enctype="multipart/form-data">
            <label for="user_id">User ID:</label>
            <input type="number" id="user_id" name="user_id" required>
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required>
            <label for="birthdate">Birth Date:</label>
            <input type="date" id="birthdate" name="birth_date" max="2003-12-31" required>
            <label for="license_number">License Number:</label>
            <input type="text" id="license_number" name="license_type" required>
            <label for="status">Status:</label>
            <input type="text" id="status" name="status" required>
            <label for="driver_pic">Driver's Pic:</label>
            <input type="file" id="driver_pic" name="driver_pic" accept="image/*" required>
            <button type="submit" name="submit">Create Account</button>
        </form>
    </div>
    <a href="Manage drivers.php" class="back-button">Back</a>
</body>
</html>
