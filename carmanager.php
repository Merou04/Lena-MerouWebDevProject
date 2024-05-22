<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Car Manager</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #172b4d; 
        }
        .container {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            position: relative;
        }
        h1 {
            text-align: center;
            margin-bottom: 20px;
            color: #000000; 
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
        button, a {
            padding: 8px 16px;
            border: none;
            cursor: pointer;
            border-radius: 4px;
            font-size: 16px;
            text-decoration: none; 
            display: inline-block; 
            margin-right: 20px; 
        }
        button.add-vehicle, a.add-vehicle, a.view-reports {
            background-color: #4CAF50; 
            color: white; 
        }
        .big-button {
            padding: 12px 24px;
            font-size: 18px;
        }
        .logout-link {
            position: absolute;
            top: 20px;
            right: 20px;
            background-color: #FF0000;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
        }
        .logout-link:hover {
            background-color: #cc0000;
        }
        .back-link {
            display: inline-block;
            margin-top: 20px;
            background-color: #0000FF;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
            position: absolute;
            bottom: 20px;
            left: 20px;
        }
        .back-link:hover {
            background-color: #0000cc;
        }
    </style>
</head>
<body>
    <a href="Index.php" class="logout-link">Se déconnecter</a>
    <div class="container">
        <h1>Car Manager</h1>
        <table>
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Model</th>
                    <th>Year</th>
                    <th>License Plate</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $host = "localhost";
                $dbuser = "root";
                $dbpass = "Raouf120304";
                $dbname = "cartrack_db";
                $conn = new mysqli($host, $dbuser, $dbpass, $dbname);

                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                $sql = "SELECT vehicle_id, name, model, year, license_plate, status FROM vehicles";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . htmlspecialchars($row["name"]) . "</td>";
                        echo "<td>" . htmlspecialchars($row["model"]) . "</td>";
                        echo "<td>" . htmlspecialchars($row["year"]) . "</td>";
                        echo "<td>" . htmlspecialchars($row["license_plate"]) . "</td>";
                        $currentStatus = htmlspecialchars($row["status"]);
                        echo "<td>" . $currentStatus . "</td>";
                        echo '<td class="btn-container">
                                <a href="car infos.php?id=' . $row['vehicle_id'] . '" class="show-info">Show Info</a>
                              </td>';
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='6'>No vehicles found</td></tr>";
                }
                $conn->close();
                ?>
            </tbody>
        </table>
        <div class="btn-container">
            <a href="new car.php" class="big-button add-vehicle">Add Vehicle</a>
            <a href="InterfaceSig.php" class="big-button view-reports">Send Reports</a>
        </div>
    </div>
    <a href="login.php" class="back-link">Back</a>
</body>
</html>
