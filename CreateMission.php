<style>
     body {
    font-family: Arial;
    background-color:#172b4d;
    }
    th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #AAB7B8;
        }
        .scrollable {
        max-height: 420px;
        overflow-y: auto;
    }
    .block {
    max-width: 500px;
    margin: 50px auto;
    padding: 20px;
    background-color: #fff;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }
    textarea{
        width: 100%;
        padding: 10px;
        margin-bottom: 20px;
        border: 1px solid #ccc;
        border-radius: 5px;
        box-sizing: border-box;
        resize: none;
    }
    input[type="time"],
    input[type="date"],
    input[type="number"],
    input[type="text"] {
    width: 100%;
    padding: 10px;
    margin-bottom: 20px;
    border: 1px solid #ccc;
    border-radius: 5px;
    box-sizing: border-box;
    }
    button{
        text-align: center;
        background-color:#ffdb58; 
        color: #fff;
        border: none;
        padding: 10px 20px;
        border-radius: 5px;
        cursor: pointer;
        width: 100%;
    }
    .button{
        text-align: center;
        background-color:#FCC764; 
        color: #fff;
        border: none;
        padding: 8px 20px;
        border-radius: 5px;
        width: 100%;
    }
    select {
        width: 100%;
        padding: 10px;
        margin-bottom: 20px;
        border: 1px solid #ccc;
        border-radius: 5px;
        box-sizing: border-box;
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

<?php
session_start();
 $host = "localhost";
 $dbuser = "root";
 $dbpass = "Raouf120304";
 $dbname = "cartrack_db";
 $conn = mysqli_connect($host, $dbuser, $dbpass, $dbname); 

 
?>

<html>
    <head>
    <title>Mission</title>
    </head>
    <body>
    <a href="Index.php" class="logout-button">Se déconnecter</a>

        <div class="block">
        <h1>Create New Mission</h1>
    <form>
    <Label>Type mission:</Label>
            <input type="text" name="misson_type" placeholder="Mission"/>
            <br>
        <label>Licence needed:</label>
            <select name="licence_needed">
                <option value="0">Select the driving licence</option>
                <option value="1">A</option>
                <option value="2">B</option>
                <option value="3">C</option>
            </select>
            <br>
        <Label>Location:</Label>
            <input type="text" name="misson_location" placeholder="Delivery location" required/>
            <br>
        <label>Date:</label>
            <input type="date" name="mission_date" placeholder="date" required/>
            <br>
        <Label>Good's type:</Label>
            <input type="text" name="goodstype" placeholder="Type of the merchandise"/>
            <br>
        <Label>Cost:</Label>
            <input type="text" name="costs" placeholder="Costs of the mission"/>
            <br>
        
        <h2>Select Driver:</h2>
        <table>
            <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Select</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $query = "SELECT driver_id, name, status FROM Drivers WHERE status = 'Available'";
            $result = $conn->query($query);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $driver_id = $row['driver_id'];
                    $name = $row['name'];
                    $status = $row['status'];
                    echo "<tr>";
                    echo "<td>$driver_id</td>";
                    echo "<td>$name</td>";
                    echo "<td><input type='radio' name='selected_driver_id' value='$driver_id' required></td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='4'>No available drivers</td></tr>";
            }
            ?>
            </tbody>
        </table>

        <h2>Select Vehicle:</h2>
        <table>
            <thead>
            <tr>
                <th>Name</th>
                <th>Model</th>
                <th>Year</th>
                <th>License Plate</th>
                <th>Select</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $sql = "SELECT name, model, year, license_plate, vehicle_id FROM Vehicles WHERE status = 'Available'";
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . $row['name'] . "</td>";
                    echo "<td>" . $row['model'] . "</td>";
                    echo "<td>" . $row['year'] . "</td>";
                    echo "<td>" . $row['license_plate'] . "</td>";
                    echo "<td><input type='radio' name='selected_vehicle_id' value='" . $row['vehicle_id'] . "' required></td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='5'>No available vehicles found</td></tr>";
            }
            ?>
            </tbody>
        </table>

        <button name="submit">Create Mission</button>
    </form>
        </div>
        <a href="acceuilSA.php" class="back-button">Back</a>
    </body>
</html>


<?php
    if (isset($_POST['submit'])) {
        $mission_type = $_POST['mission_type'];
        $licence_needed = $_POST['licence_needed'];
        $mission_location = $_POST['mission_location'];
        $mission_date = $_POST['mission_date'];
        $goodstype = $_POST['goodstype'];
        $costs = $_POST['costs'];
        $selected_driver_id = $_POST['selected_driver_id'];
        $selected_vehicle_id = $_POST['selected_vehicle_id'];

        $insert_mission_query = "INSERT INTO missions (title, description, start_date, end_date, status, DeliveryLocation, goodstype, MissionCost) 
                                VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

        $stmt = mysqli_prepare($conn, $insert_mission_query);

        mysqli_stmt_bind_param($stmt, "ssssssss", $mission_type, "Mission for $mission_location", $mission_date, $mission_date, "Waiting...", $mission_location, $goodstype, $costs);

        if (mysqli_stmt_execute($stmt)) {

            $mission_id = mysqli_insert_id($conn);

            $insert_assignment_query = "INSERT INTO Mission-assignment (mission_id, vehicle_id, driver_id, assigned_date) 
                                        VALUES (?, ?, ?, CURDATE())";

            $stmt2 = mysqli_prepare($conn, $insert_assignment_query);

            mysqli_stmt_bind_param($stmt2, "iii", $mission_id, $selected_vehicle_id, $selected_driver_id);

            if (mysqli_stmt_execute($stmt2)) {
                $_SESSION['success_message'] = "Mission created successfully.";
            } else {
                $_SESSION['error_message'] = "Error in mission assignment: " . mysqli_error($conn);
            }
        } else {
            $_SESSION['error_message'] = "Error in creating mission: " . mysqli_error($conn);
        }

        // Close the prepared statements
        mysqli_stmt_close($stmt);
        mysqli_stmt_close($stmt2);
    }

    mysqli_close($conn);
?>
