<?php
session_start();

 $host = "localhost";
 $dbuser = "root";
 $dbpass = "";
 $dbname = "CarTrack";
 $conn = mysqli_connect($host, $dbuser, $dbpass, $dbname);
 
 // recherche des conducteurs libres

 ?>
 
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

        button {
        background-color: #4caf50;
        color: black;
        padding: 8px 15px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        }
</style>
<html>
<head>
    <title>Available Drivers</title>
    
</head>
<body>
    <form action="CreateMission.php" method="post">
    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Availability</th>
            </tr>
        </thead>
        <tbody>
        <?php
            $query = "SELECT driver_id, name, status FROM Drivers";
            $result = $conn->query($query);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $driver_id = $row['driver_id'];
                    $name = $row['name'];
                    $status = $row['status'];
                    $availability_class = '';
                    switch ($status) {
                        case 'Available':
                            $availability_class = 'available';
                            break;
                        case 'On Leave':
                            $availability_class = 'on-leave';
                            break;
                        case 'On Mission':
                            $availability_class = 'on-mission';
                            break;
                        default:
                            $availability_class = '';
                            break;
                        }

                        echo "<tr>";
                        echo "<td>$name</td>";
                        echo "<td class='$availability_class'>$status</td>";
                        echo "<td><button type='submit' name='selected_driver_id' value='$driver_id'>Choose</button></td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='4'>No drivers available</td></tr>";
                }
                ?>
        </tbody>
    </table>

</form>
</body>
</html>

<?php
    mysqli_close($conn);
?>