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
                    <th>Additional Fees</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
             
                $conn = new mysqli("localhost", "root", "", "cartrack_db");
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                $loggedInUserId = 31998; // Example logged-in user ID
                $userRoleQuery = "SELECT role FROM users WHERE user_id = $loggedInUserId";
                $userRoleResult = $conn->query($userRoleQuery);
                $userRoleRow = $userRoleResult->fetch_assoc();
                $userRole = $userRoleRow['role'];

                if ($userRole === 'Car Manager') {
                    // Fetch the reports for the Car Manager
                    $reportsQuery = "SELECT v.make, v.model, r.report_id, r.content, r.report_date 
                                     FROM reports r 
                                     JOIN vehicles v ON r.vehicle_id = v.vehicle_id 
                                     WHERE r.user_id = $loggedInUserId";
                    $reportsResult = $conn->query($reportsQuery);

                    if ($reportsResult->num_rows > 0) {
                        while ($row = $reportsResult->fetch_assoc()) {
                            echo "<tr>
                                    <td>{$row['make']} {$row['model']}</td>
                                    <td>{$row['report_id']}</td>
                                    <td>{$row['content']}</td>
                                    <td>{$row['report_date']}</td>
                                    <td class='button-container'>
                                        <form method='post' action='" . htmlspecialchars($_SERVER["PHP_SELF"]) . "'>
                                            <input type='hidden' name='action' value='accept'>
                                            <input type='hidden' name='report_id' value='{$row['report_id']}'>
                                            <button type='submit' class='button accept'>Accept</button>
                                        </form>
                                        <form method='post' action='" . htmlspecialchars($_SERVER["PHP_SELF"]) . "'>
                                            <input type='hidden' name='action' value='decline'>
                                            <input type='hidden' name='report_id' value='{$row['report_id']}'>
                                            <button type='submit' class='button decline'>Decline</button>
                                        </form>
                                    </td>
                                  </tr>";
                        }
                    } else {
                        echo "<tr><td colspan='5'>No reports found.</td></tr>";
                    }
                } else {
                    echo "<tr><td colspan='5'>You do not have access to this section.</td></tr>";
                }

                $conn->close();
                ?>
            </tbody>
        </table>
    </div>

    <?php
   
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['action'])) {
        $action = $_POST['action'];
        $reportId = $_POST['report_id'];

        if ($action === "accept") {
            echo "<script>alert('Report ID $reportId accepted.');</script>";
        } elseif ($action === "decline") {
            echo "<script>alert('Report ID $reportId declined.');</script>";
        }
    }
    ?>
</body>
</html>
