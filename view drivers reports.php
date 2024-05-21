<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Driver Reports Management</title>
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
        <h2>Driver Reports Management</h2>
        <table>
            <thead>
                <tr>
                    <th>Driver Name</th>
                    <th>Mission Number</th>
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

                
                $sql = "SELECT r.*, u.username AS driver_name, m.mission_id AS mission_number
                        FROM reports r
                        JOIN users u ON r.user_id = u.user_id
                        JOIN missions m ON r.mission_id = m.mission_id
                        WHERE u.role = 'Driver'";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . htmlspecialchars($row['driver_name']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['mission_number']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['content']) . "</td>";
                        echo "<td class='button-container'>
                                <form action='' method='post'>
                                    <input type='hidden' name='report_id' value='" . htmlspecialchars($row['report_id']) . "'>
                                    <button class='button accept' type='submit' name='action' value='accept'>Accept</button>
                                </form>
                                <form action='' method='post'>
                                    <input type='hidden' name='report_id' value='" . htmlspecialchars($row['report_id']) . "'>
                                    <button class='button decline' type='submit' name='action' value='decline'>Decline</button>
                                </form>
                              </td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='4'>No reports found for Drivers.</td></tr>";
                }

                
                $conn->close();
                ?>
            </tbody>
        </table>
    </div>

    <?php
    if (isset($_POST['action'])) {
        $action = $_POST['action'];
        $report_id = $_POST['report_id'];
        if ($action === "accept") {
            echo "<script>alert('Report $report_id accepted, stop mission, return back');</script>";
        } elseif ($action === "decline") {
            echo "<script>alert('Report $report_id declined, carry on mission');</script>";
        }
    }
    ?>
</body>
</html>
