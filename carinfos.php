<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vehicle Information</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #172b4d; 
        }
        .container {
            max-width: 800px;
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
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #dddddd;
            padding: 12px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        tr:hover {
            background-color: #e6e6e6;
        }
        .btn-container {
            text-align: center;
            margin-top: 20px;
        }
        button, input[type="button"], input[type="submit"] {
            padding: 8px 16px;
            border: none;
            cursor: pointer;
            border-radius: 4px;
            font-size: 16px;
            margin-right: 10px;
        }
        input[type="text"], input[type="number"] {
            width: 100%;
            padding: 8px;
            box-sizing: border-box;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Vehicle Information</h1>
        <?php
        $vehicle_id = $_GET['id'] ?? null;
        $host = "localhost";
        $dbuser = "root";
        $dbpass = "";
        $dbname = "cartrack_db";
        $conn = new mysqli($host, $dbuser, $dbpass, $dbname);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
            $name = $_POST['name'];
            $model = $_POST['model'];
            $year = $_POST['year'];
            $license_plate = $_POST['license_plate'];
            $status = $_POST['status'];
            $stmt = $conn->prepare("UPDATE vehicles SET name=?, model=?, year=?, license_plate=?, status=? WHERE vehicle_id=?");
            $stmt->bind_param("ssissi", $name, $model, $year, $license_plate, $status, $vehicle_id);
            $stmt->execute();
            $stmt->close();
            header('Location: carmanager.php'); // Redirect to the vehicle management page
            exit();
        } else {
            if ($vehicle_id) {
                $query = $conn->prepare("SELECT * FROM vehicles WHERE vehicle_id = ?");
                $query->bind_param("i", $vehicle_id);
                $query->execute();
                $result = $query->get_result();
                if ($result->num_rows == 1) {
                    $vehicle = $result->fetch_assoc();
                    echo '<form method="post">';
                    echo '<table>';
                    echo '<tr><th>Name</th><td><input type="text" name="name" value="' . htmlspecialchars($vehicle['name']) . '"></td></tr>';
                    echo '<tr><th>Model</th><td><input type="text" name="model" value="' . htmlspecialchars($vehicle['model']) . '"></td></tr>';
                    echo '<tr><th>Year</th><td><input type="number" name="year" value="' . htmlspecialchars($vehicle['year']) . '"></td></tr>';
                    echo '<tr><th>License Plate</th><td><input type="text" name="license_plate" value="' . htmlspecialchars($vehicle['license_plate']) . '"></td></tr>';
                    echo '<tr><th>Status</th><td><input type="text" name="status" value="' . htmlspecialchars($vehicle['status']) . '"></td></tr>';
                    echo '</table>';
                    echo '<div class="btn-container"><input type="submit" name="submit" value="Save Changes"></div>';
                    echo '</form>';
                } else {
                    echo "<p>Vehicle not found.</p>";
                }
                $query->close();
            } else {
                echo "<p>Invalid vehicle ID.</p>";
            }
        }
        $conn->close();
        ?>
    </div>
</body>
</html>
