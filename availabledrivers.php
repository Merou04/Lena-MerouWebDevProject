<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Available Drivers</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background: linear-gradient(45deg, #172b4d, #2c3e50);
            color: #fff;
            display: flex;
            flex-direction: column;  
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        table {
            width: 80%;
            border-collapse: collapse;
            background-color: #fff;
            color: #172b4d;
        }

        th, td {
            border: 1px solid #ccc;
            padding: 12px;
            text-align: left;
        }

        th {
            background-color: #172b4d;
            color: #fff;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        .button-container {
            margin-top: 20px;
        }

        .choose-button {
            background-color: #ffdb58;
            color: #fff;
            border: none;
            padding: 15px 30px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 18px;
        }

        .choose-button:hover {
            background-color: #ccab42;
        }
    </style>
</head>
<body>
    <form action="CreateMission.php" method="POST">
        <table>
            <thead>
                <tr>
                    <th>Select</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Availability</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $servername = "127.0.0.1";
                    $username = "root";
                    $password = "Raouf120304";
                    $dbname = "cartrack_db";

                    
                    $conn = new mysqli($servername, $username, $password, $dbname);

                    
                    if ($conn->connect_error) {
                        die("Connection failed: " . $conn->connect_error);
                    }

                    
                    $sql = "SELECT driver_id, name, status FROM drivers WHERE status = 'Disponible'";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                            $nameParts = explode(' ', $row['name']);
                            $firstName = $nameParts[0];
                            $lastName = isset($nameParts[1]) ? $nameParts[1] : '';
                            echo "<tr>";
                            echo "<td><input type='radio' name='selected_driver' value='" . htmlspecialchars($row['driver_id']) . "'></td>";
                            echo "<td>" . htmlspecialchars($firstName) . "</td>";
                            echo "<td>" . htmlspecialchars($lastName) . "</td>";
                            echo "<td>" . htmlspecialchars($row['status']) . "</td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='4'>No available drivers found.</td></tr>";
                    }

                    
                    $conn->close();
                ?>
            </tbody>
        </table>

        <div class="button-container">
            <button class="choose-button" type="submit">Choose Driver</button>
        </div>
    </form>
</body>
</html>
