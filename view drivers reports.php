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

$message = ''; 

if (isset($_POST['action'])) {
    $action = $_POST['action'];
    $report_id = $_POST['report_id'];
    $decision = $action === 'accept' ? 'accepté' : 'decliné';


    $stmt = $conn->prepare("UPDATE reports SET decision = ? WHERE report_id = ?");
    $stmt->bind_param("si", $decision, $report_id);
    if ($stmt->execute()) {
        $message = "Report $report_id has been " . ($action === 'accept' ? 'accepted' : 'declined') . ".";
    } else {
        $message = "Error updating report $report_id.";
    }
    $stmt->close();


    header('Location: ' . $_SERVER['PHP_SELF']);
    exit;
}

$sql = "SELECT r.*, u.username AS driver_name, m.mission_id AS mission_number
        FROM reports r
        JOIN users u ON r.user_id = u.user_id
        JOIN missions m ON r.mission_id = m.mission_id
        WHERE u.role = 'Driver'";
$result = $conn->query($sql);

$message = isset($_SESSION['message']) ? $_SESSION['message'] : '';
unset($_SESSION['message']);
?>

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
        <h2>Driver Reports Management</h2>
        <?php if ($message): ?>
            <p><?php echo $message; ?></p>
        <?php endif; ?>
        <table>
            <thead>
                <tr>
                    <th>Driver Name</th>
                    <th>Mission Number</th>
                    <th>Report</th>
                    <th>Decision</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . htmlspecialchars($row['driver_name']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['mission_number']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['content']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['decision']) . "</td>";
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
                    echo "<tr><td colspan='5'>No reports found for Drivers.</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>

    <a href="viewreports.php" class="back-button">Back</a>
</body>
</html>
