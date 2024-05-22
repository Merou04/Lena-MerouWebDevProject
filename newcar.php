<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Vehicle</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #172b4d;
            position: relative;
            min-height: 100vh;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            text-align: center;
            margin-bottom: 20px;
        }
        .form-group {
            margin-bottom: 20px;
        }
        label {
            display: block;
            font-weight: bold;
        }
        input, select {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        button {
            padding: 12px 24px;
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
            border-radius: 4px;
            margin-right: 10px;
        }
        button:hover {
            background-color: #45a049;
        }
        .logout-button {
            position: absolute;
            top: 20px;
            right: 20px;
            background-color: #FF0000;
            color: white;
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
            bottom: 20px;
            left: 20px;
            background-color: #0000FF;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
        }
        .back-button:hover {
            background-color: #0000cc;
        }
    </style>
</head>
<body>
    <a href="Index.php" class="logout-button">Se déconnecter</a>
    <div class="container">
        <h1>Add Vehicle</h1>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label for="model">Model:</label>
                <input type="text" id="model" name="model" required>
            </div>
            <div class="form-group">
                <label for="year">Year:</label>
                <input type="number" id="year" name="year" min="1900" max="9999" required>
            </div>
            <div class="form-group">
                <label for="license_plate">License Plate:</label>
                <input type="text" id="license_plate" name="license_plate" required>
            </div>
            <div class="form-group">
                <label for="status">Status:</label>
                <input type="text" id="status" name="status" required>
            </div>
            <button type="submit" name="submit">Confirm</button>
        </form>

        <?php
        if (isset($_POST['submit'])) {
            $host = "localhost";
            $dbuser = "root";
            $dbpass = "Raouf120304";
            $dbname = "cartrack_db";
            $conn = new mysqli($host, $dbuser, $dbpass, $dbname);

            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            $name = $_POST["name"];
            $model = $_POST["model"];
            $year = $_POST["year"];
            $license_plate = $_POST["license_plate"];
            $status = $_POST["status"];

            $stmt = $conn->prepare("INSERT INTO vehicles (name, model, year, license_plate, status) VALUES (?, ?, ?, ?, ?)");
            $stmt->bind_param("ssiss", $name, $model, $year, $license_plate, $status);

            if ($stmt->execute()) {
                echo "<script>alert('Vehicle added successfully'); window.location.href='car manager.php';</script>";
            } else {
                echo "<script>alert('Error: " . $stmt->error . "');</script>";
            }

            $stmt->close();
            $conn->close();
        }
        ?>
    </div>
    <a href="car manager.php" class="back-button">Back</a>
</body>
</html>
