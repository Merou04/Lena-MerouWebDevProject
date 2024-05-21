<style>
     body {
    font-family: Arial;
    background-color:#172b4d;
    }
    .block {
    max-width: 400px;
    margin: 50px auto;
    padding: 20px;
    background-color: #fff;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
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
</style>

<?php
 $host = "localhost";
 $dbuser = "root";
 $dbpass = "";
 $dbname = "cartrack_db";
 $conn = mysqli_connect($host, $dbuser, $dbpass, $dbname); 

?>

<html>
    <head>
    <title>Mission</title>
    </head>
    <body>
        <div class="block">
        <h1>Create a mission:</h1>
        
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
        
        <label>Choose driver:</label>
        <a href="availabledrivers.php" class="button">Driver</a>
        <br><br><br>
        <label>Choose vehicle:</label>
        <a href="availiblecars.php" class="button">Vehicle</a> 
        <br><br>   
        <button type="submit" name="submit">Submit mission</button>
        <br><br>
        <a href="acceuilSA.php" class="button">Cancel</a>
        </div>
    </body>
</html>


<?php
    if(isset($_POST['submit']))  {
        $mission_type = $_POST["mission_type"];
        $licence_needed = $_POST["licence_needed"];
        $location = $_POST["mission_location"];
        $date = $_POST["mission_date"];
        $departure_time = $_POST["departure_time"]; 
        if(isset($_POST['selected_driver_id'])) {
        $driver_id = $_POST['selected_driver_id'];
        }else {
            echo "Error: Driver ID not provided.";
            exit;
        }
        if(isset($_POST['vehicle_id'])) {
            $vehicle_id = $_POST['vehicle_id'];
        } else {
            echo "Error: Vehicle ID not provided.";
            exit;
        }
        $insert_mission_query = "INSERT INTO Missions (title, description, start_date, end_date, status) VALUES (?, ?, ?, ?, ?)";
        $stmt_mission = mysqli_prepare($conn, $insert_mission_query);
        $status = "Pending"; 
        mysqli_stmt_bind_param($stmt_mission, "sssss", $mission_type, $location, $date, $date, $status);
        mysqli_stmt_execute($stmt_mission);
        $mission_id = mysqli_insert_id($conn); 

        
        $insert_assignment_query = "INSERT INTO Mission_Assignments (mission_id, vehicle_id, driver_id, assigned_date) VALUES (?, ?, ?, ?)";
        $stmt_assignment = mysqli_prepare($conn, $insert_assignment_query);
        $assigned_date = date("Y-m-d");
        mysqli_stmt_bind_param($stmt_assignment, "iiis", $mission_id, $vehicle_id, $driver_id, $assigned_date);
        mysqli_stmt_execute($stmt_assignment);

        echo "New mission created successfully";
    }
    
    mysqli_close($conn);
?>
