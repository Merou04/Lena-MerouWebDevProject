<?php
session_start();

$host = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "CarTrack";
$conn = mysqli_connect($host, $dbuser, $dbpass, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Fetch all drivers from the database
$query = "SELECT name, birthday, license_number, status FROM Drivers ORDER BY name";
$result = mysqli_query($conn, $query);
if (!$result) {
    die("Error fetching drivers: " . mysqli_error($conn));
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Driver Management</title>
    <style>
        body {
            background: #f5f5f5;
            font-family: 'Arial', sans-serif;
            padding: 20px;
            color: #333;
        }
        .title {
            text-align: center;
            font-size: 24px;
            color: #172b4d;
            margin-bottom: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            background-color: white;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }
        th, td {
            border: 1px solid #dee2e6;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #172b4d;
            color: white;
        }
        button {
            cursor: pointer;
            padding: 5px 10px;
            background-color: #ffdb58;
            color: #333;
            border: none;
            border-radius: 5px;
            margin-right: 4px;
        }
        button:hover {
            background-color: #ccab42;
        }
        .button {
            text-align: center;
            background-color: #ffdb58;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            width: 100%;
        }
    </style>
</head>
<body>
    <h2 class="title">Driver Management</h2>
    <table id="driversTable">
        <thead>
            <tr>
                <th>Driver's Name</th>
                <th>Date of Birth</th>
                <th>License Number</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = mysqli_fetch_assoc($result)): ?>
            <tr>
                <td><?php echo htmlspecialchars($row['name']); ?></td>
                <td><?php echo htmlspecialchars($row['birthday']); ?></td>
                <td><?php echo htmlspecialchars($row['license_number']); ?></td>
                <td><?php echo htmlspecialchars($row['status']); ?></td>
                <td>
                    <button>Delete</button>
                    <button>Update</button>
                </td>
            </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
    <a href="CreateAcc.php" class="button">Add New Driver</a> 
</body>
</html>

<?php
mysqli_close($conn);
?>
