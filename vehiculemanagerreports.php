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
            position: relative;
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
    <div class="report-container">
        <h2>Vehicle Manager Reports</h2>
        <table>
            <thead>
                <tr>
                    <th>Car Name</th>
                    <th>Car Number</th>
                    <th>Report</th>
                    <th>Decision</th>
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

                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                    $report_id = key($_POST);
                    $decision = $_POST[$report_id] == 'accept' ? 'accepté' : 'décliné';

                    $stmt = $conn->prepare("UPDATE reports SET decision = ? WHERE report_id = ?");
                    $stmt->bind_param("si", $decision, $report_id);
                    $stmt->execute();
                    $stmt->close();

                    // Refresh the page to show updated data
                    header('Location: ' . $_SERVER['PHP_SELF']);
                    exit();
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
                        echo "<td>" . htmlspecialchars($row['decision']) . "</td>";
                        echo "<td class='button-container'>
                                <form action='' method='post'>
                                    <input type='hidden' name='" . htmlspecialchars($row['report_id']) . "' value='accept'>
                                    <button class='button accept' type='submit'>Accept</button>
                                </form>
                                <form action='' method='post'>
                                    <input type='hidden' name='" . htmlspecialchars($row['report_id']) . "' value='decline'>
                                    <button class='button decline' type='submit'>Decline</button>
                                </form>
                              </td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='5'>No reports found for Car Managers.</td></tr>";
                }

                $conn->close();
                ?>
            </tbody>
        </table>
    </div>
    <a href="viewreports.php" class="back-button">Back</a>
</body>
</html>
