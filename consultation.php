<style>
    body{
        text-align: center;
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
    max-width: 1000px;
    margin: 50px auto;
    padding: 20px;
    background-color: #fff;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }
</style>

<?php
session_start();

 $host = "localhost";
 $dbuser = "root";
 $dbpass = "";
 $dbname = "cartrack_db";
 $conn = mysqli_connect($host, $dbuser, $dbpass, $dbname);
 
 // fonction display toutes les missions
 function displayMissionDetails($mission_id, $db_connection) {
    
    $query = "SELECT Missions.mission_id, Missions.title, Missions.location, Drivers.name AS driver_name, Vehicles.make, Vehicles.model, Vehicles.license_plate
              FROM Missions
              INNER JOIN Mission_Assignments ON Missions.mission_id = Mission_Assignments.mission_id
              INNER JOIN Drivers ON Mission_Assignments.driver_id = Drivers.driver_id
              INNER JOIN Vehicles ON Mission_Assignments.vehicle_id = Vehicles.vehicle_id
              WHERE Missions.mission_id = ?
              LIMIT 1";

    $statement = $db_connection->prepare($query);
    $statement->bind_param("i", $mission_id);
    $statement->execute();
    $result = $statement->get_result();

    if ($result->num_rows > 0) {  
        $row = $result->fetch_assoc();
        $mission_number = $row['mission_id'];
        $mission_title = $row['title'];
        $location = $row['location'];
        $driver_name = $row['driver_name'];
        $vehicle_make = $row['make'];
        $vehicle_model = $row['model'];
        $license_plate = $row['license_plate'];

        echo "<tr>";
        echo "<td>$mission_number</td>";
        echo "<td>$location</td>";
        echo "<td>$driver_name</td>";
        echo "<td>$vehicle_make $vehicle_model (License Plate: $license_plate)</td>";
        echo "<td>State</td>";
        echo "</tr>";
    } else {
        echo "Mission not found.";
    }  
    $statement->close();
}

?>

<html>
    <head>
        <title>Missions Table</title>
    </head>
    <body>
        <div class="block" >
            <h2>Missions</h2>
            <div class="scrollable">
                <table width=100%>  

                    <tr>
                        <th>Mission's number</th>
                        <th>Location</th>
                        <th>Driver</th>
                        <th>Vehicule</th>
                        <th>State</th>
                    </tr>
                    <?php 
                        $query = "SELECT mission_id FROM Missions";
                        if ($result = mysqli_query($conn, $query)) {
                            while ($row = mysqli_fetch_row($result)) {
                                displayMissionDetails($row[0], $conn);
                            }
                            mysqli_free_result($result);
                        } 
                    ?>
                </table>
            </div>
        </div>
    </body>
</html>

<?php
    mysqli_close($conn);
?>