<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vehicle Manager Reports</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background: linear-gradient(45deg, #172b4d, #2c3e50);
            color: #fff;
        }

        .report-container {
            background-color: rgba(255, 255, 255, 0.9);
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.2);
            text-align: center;
            width: 90%;
            max-width: 960px;
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            text-align: left;
            padding: 12px;
            border-bottom: 1px solid #ddd;
            color: #333;
        }

        th {
            background-color: #172b4d;
            color: white;
        }

        .button-container {
            display: flex;
            justify-content: center;
        }

        .button {
            padding: 6px 12px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 14px;
            margin-right: 5px;
        }

        .accept {
            background-color: #4caf50;
            color: #fff;
        }

        .decline {
            background-color: #f44336;
            color: #fff;
        }

        .button:hover {
            opacity: 0.8;
        }

        h2 {
            color: #333;
        }
    </style>
</head>
<body>
    <div class="report-container">
        <h2>Vehicle Manager Reports</h2>
        <table>
            <thead>
                <tr>
                    <th>Car Name</th>
                    <th>Car Number</th>
                    <th>Report</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $servername = "localhost";
                $username = "root";
                $password = "Raouf120304";
                $dbname = "cartrack_db";

                
                $conn = new mysqli($servername, $username, $password, $dbname);

                
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                
                $sql = "SELECT r.*, v.name AS vehicle_name, v.license_plate AS vehicle_number
                        FROM reports r
                        JOIN users u ON r.user_id = u.user_id
                        JOIN vehicles v ON r.vehicle_id = v.vehicle_id
                        WHERE u.role = 'Car Manager'";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . htmlspecialchars($row['vehicle_name']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['vehicle_number']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['content']) . "</td>";
                        echo "<td class='button-container'>
                                <form action='' method='post'>
                                    <button class='button accept' type='submit' name='accept_" . htmlspecialchars($row['report_id']) . "'>Accept</button>
                                </form>
                                <form action='' method='post'>
                                    <button class='button decline' type='submit' name='decline_" . htmlspecialchars($row['report_id']) . "'>Decline</button>
                                </form>
                              </td>";
                        echo "</tr>";

                        
                        if (isset($POST['accept' . $row['report_id']])) {
                            echo "<script>alert('Report accepted, you have the admin permission');</script>";
                        } elseif (isset($POST['decline' . $row['report_id']])) {
                            echo "<script>alert('Cost declined');</script>";
                        }
                    }
                } else {
                    echo "<tr><td colspan='4'>No reports found for Car Managers.</td></tr>";
                }

                
                $conn->close();
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>
