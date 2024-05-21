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
        .top-buttons {
            display: flex;
            justify-content: space-between;
            margin: 10px 20px;
        }
        .top-button {
            padding: 8px 16px;
            border-radius: 5px;
            text-decoration: none;
            color: white;
            background-color: #4CAF50;
        }
        button.show-info, a.show-info {
            background-color: #ffdb58; 
            color: black; 
        }
        button.add-vehicle, a.add-vehicle {
            background-color: #4CAF50; 
            color: white; 
        }
        button.make-available, button.put-out-of-service {
            background-color: #4CAF50; 
            color: white; 
            margin-right: 20px; 
        }
        .big-button {
            padding: 12px 24px;
            font-size: 18px;
        }
    </style>
</head>
<body>
    <div class="top-buttons">
        <a href="admin.php" class="top-button">Return to Admin</a>
        <a href="welcome.php" class="top-button">Disconnect</a>
    </div>
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
                $dbpass = "";
                $dbname = "cartrack_db";
                $conn = new mysqli($host, $dbuser, $dbpass, $dbname);

                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                $sql = "SELECT name, model, year, license_plate, status FROM vehicles";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    // output data of each row
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row["name"] . "</td>";
                        echo "<td>" . $row["model"] . "</td>";
                        echo "<td>" . $row["year"] . "</td>";
                        echo "<td>" . $row["license_plate"] . "</td>";
                        echo "<td>" . $row["status"] . "</td>";
                        echo '<td class="btn-container">
                                <button class="make-available">Make Available</button>
                                <button class="put-out-of-service">Put Out of Service</button>
                                <a href="carinfos.php" class="show-info">Show Info</a>
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
            <a href="newcar.php" class="big-button add-vehicle">Add Vehicle</a>
        </div>
    </div>
</body>
</html>
