<?php
session_start();

 $host = "localhost";
 $dbuser = "root";
 $dbpass = "";
 $dbname = "cartrack_db";
 $conn = mysqli_connect($host, $dbuser, $dbpass, $dbname);


 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List of Vehicles</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #172b4d;
            color: black;
            margin: 0;
            padding: 20px;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            color: #172b4d;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ccc;
        }

        th {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #f5f5f5;
        }

        button {
            background-color: #4caf50;
            color: white;
            padding: 8px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
    </style>
</head>
<body>
<div class="container">
    <h1>List of Available Vehicles</h1>
    <table>
        <thead>
        <tr>
            <th>Make</th>
            <th>Model</th>
            <th>Year</th>
            <th>License Plate</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        <?php
        // Fetching available vehicles
        $sql = "SELECT name, model, year, license_plate FROM Vehicles WHERE status = 'available'";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>" . $row['name'] . "</td>";
                echo "<td>" . $row['model'] . "</td>";
                echo "<td>" . $row['year'] . "</td>";
                echo "<td>" . $row['license_plate'] . "</td>";
                echo "<td><button>Select</button></td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='5'>No available vehicles found</td></tr>";
        }
        ?>
        </tbody>
    </table>
</div>
</body>
</html>


<?php
    mysqli_close($conn);
?>