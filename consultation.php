<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Missions Table</title>
    <style>
        body {
            text-align: center;
            background-color: #172b4d;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #AAB7B8;
        }
        .scrollable {
            max-height: 420px;
            overflow-y: auto;
        }
        .block {
            max-width: 1000px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
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
            background-color: #0000FF;
            color: #fff;
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

    <div class="block">
        <h2>Missions</h2>
        <div class="scrollable">
            <table width="100%">
                <tr>
                    <th>Mission's number</th>
                    <th>Location</th>
                    <th>Driver</th>
                    <th>Vehicle</th>
                    <th>State</th>
                </tr>
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

                // Function to display mission details
                function displayMissionDetails($mission_id, $db_connection) {
                    $query = "SELECT Missions.mission_id, Missions.title, Missions.DeliveryLocation, Drivers.name AS driver_name, Vehicles.name, Vehicles.model, Vehicles.license_plate
                              FROM Missions
                              INNER JOIN `mission-assignment` ON Missions.mission_id = `mission-assignment`.mission_id
                              INNER JOIN Drivers ON `mission-assignment`.driver_id = Drivers.driver_id
                              INNER JOIN Vehicles ON `mission-assignment`.vehicle_id = Vehicles.vehicle_id
                              WHERE Missions.mission_id = ?
                              LIMIT 1";

                    $statement = $db_connection->prepare($query);
                    $statement->bind_param("i", $mission_id);
                    $statement->execute();
                    $result = $statement->get_result();

                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        $mission_number = $row['mission_id'];
                        $mission_title = $row['title'];
                        $location = $row['DeliveryLocation'];
                        $driver_name = $row['driver_name'];
                        $vehicle_make = $row['name'];
                        $vehicle_model = $row['model'];
                        $license_plate = $row['license_plate'];

                        echo "<tr>";
                        echo "<td>$mission_number</td>";
                        echo "<td>$location</td>";
                        echo "<td>$driver_name</td>";
                        echo "<td>$vehicle_make $vehicle_model (License Plate: $license_plate)</td>";
                        echo "<td>State</td>";
                        echo "</tr>";
                    } else {
                        echo "<tr><td colspan='5'>Mission not found.</td></tr>";
                    }
                    $statement->close();
                }

                $query = "SELECT mission_id FROM Missions";
                if ($result = mysqli_query($conn, $query)) {
                    while ($row = mysqli_fetch_row($result)) {
                        displayMissionDetails($row[0], $conn);
                    }
                    mysqli_free_result($result);
                }

                mysqli_close($conn);
                ?>
            </table>
        </div>
    </div>
    <a href="acceuilSA.php" class="back-button">Back</a>
</body>
</html>
