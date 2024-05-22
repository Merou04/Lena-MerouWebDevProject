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

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['update'])) {
        $ids = $_POST['driver_id'];
        $names = $_POST['name'];
        $birth_dates = $_POST['birth_date'];
        $license_types = $_POST['license_type'];
        $statuses = $_POST['status'];

        for ($i = 0; $i < count($ids); $i++) {
            $id = intval($ids[$i]);
            $name = mysqli_real_escape_string($conn, $names[$i]);
            $birth_date = mysqli_real_escape_string($conn, $birth_dates[$i]);
            $license_type = mysqli_real_escape_string($conn, $license_types[$i]);
            $status = mysqli_real_escape_string($conn, $statuses[$i]);

            $query = "UPDATE Drivers SET name='$name', birth_date='$birth_date', license_type='$license_type', status='$status' WHERE driver_id=$id";//changer ce qu'on a
            if (!mysqli_query($conn, $query)) {
                die("Error updating driver: " . mysqli_error($conn));
            }
        }

        header("Location: " . $_SERVER['PHP_SELF']);
        exit();
    }

    if (isset($_POST['delete'])) {
        $id = intval($_POST['driver_id']);
        $query = "UPDATE Drivers SET status='deleted' WHERE driver_id=$id";//rendre les driver status "deleted"
        if (!mysqli_query($conn, $query)) {
            die("Error deleting driver: " . mysqli_error($conn));
        }

        header("Location: " . $_SERVER['PHP_SELF']);
        exit();
    }
}

// Fetch all drivers from the database
$query = "SELECT driver_id, name, birth_date, license_type, status FROM Drivers WHERE status != 'deleted' ORDER BY name";
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
            background: #001f3f;
            font-family: 'Arial', sans-serif;
            padding: 20px;
            color: #fff;
            position: relative;
            min-height: 100vh;
        }
        .title {
            text-align: center;
            font-size: 24px;
            color: #ffdc00;
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
            color: #333;
        }
        th {
            background-color: #172b4d;
            color: white;
        }
        input[type="text"], input[type="date"] {
            width: 100%;
            padding: 5px;
            margin: 0;
            border: 1px solid #ccc;
            border-radius: 3px;
            box-sizing: border-box;
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
            text-decoration: none;
            display: inline-block;
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
    <script>
        function enableEdit(row) {
            const inputs = row.querySelectorAll('input');
            inputs.forEach(input => {
                input.removeAttribute('readonly');
                input.style.backgroundColor = '#fff';
            });
            row.querySelector('.save-button').style.display = 'inline';
            row.querySelector('.update-button').style.display = 'none';
        }

        function deleteRow(button) {
            const row = button.closest('tr');
            const form = button.closest('form');
            const input = row.querySelector('input[name="driver_id[]"]');
            const hiddenInput = document.createElement('input');
            hiddenInput.type = 'hidden';
            hiddenInput.name = 'driver_id';
            hiddenInput.value = input.value;
            form.appendChild(hiddenInput);
            const deleteButton = document.createElement('button');
            deleteButton.type = 'submit';
            deleteButton.name = 'delete';
            deleteButton.style.display = 'none';
            form.appendChild(deleteButton);
            deleteButton.click();
        }
    </script>
</head>
<body>
    <h2 class="title">Driver Management</h2>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
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
                    <input type="hidden" name="driver_id[]" value="<?php echo htmlspecialchars($row['driver_id']); ?>">
                    <td><input type="text" name="name[]" value="<?php echo htmlspecialchars($row['name']); ?>" readonly></td>
                    <td><input type="date" name="birth_date[]" value="<?php echo htmlspecialchars($row['birth_date']); ?>" readonly></td>
                    <td><input type="text" name="license_type[]" value="<?php echo htmlspecialchars($row['license_type']); ?>" readonly></td>
                    <td><input type="text" name="status[]" value="<?php echo htmlspecialchars($row['status']); ?>" readonly></td>
                    <td>
                        <button type="button" class="delete-button" onclick="deleteRow(this)">Delete</button>
                        <button type="button" class="update-button" onclick="enableEdit(this.closest('tr'))">Update</button>
                        <button type="submit" class="save-button" name="update" style="display:none;">Save</button>
                    </td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </form>
    <a href="CreateAcc.php" class="button">Add New Driver</a>
    <a href="Index.php" class="logout-button">Se déconnecter</a>
    <a href="acceuilSA.php" class="back-button">Back</a>
</body>
</html>

<?php
mysqli_close($conn);
?>
