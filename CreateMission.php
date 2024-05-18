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
 $dbname = "cartrack";
 $conn = mysqli_connect($host, $dbuser, $dbpass, $dbname); 


?>

<html>
    <head>
    <title>Mission</title>
    </head>
    <body>
        <div class="block">
        <h1>Create a mission:</h1>
        <label>Mission's number:</label>
            <input type="number" name="mission_number" placeholder="Mission" />
            <br>
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
        <label>Departure time:</label>
            <input type="time" name="departure_time" placeholder="Start" required/>
            <br>
        <label>Choose driver:</label>
        <a href="availabledrivers.php" class="button">Driver</a>
        <br><br><br>
        <label>Choose vehicle:</label>
        <a href="availiblecars.php" class="button">Vehicle</a> 
        <br><br>   
        <button type="submit" name="submit">Submit mission</button>
        </div>
    </body>
</html>

<?php

    $query=mysqli_prepare($conn,"INSERT INTO mission(missionNumber,typeM,licence,dated,timed,iddriver,idvehicule,stateM) 
        VALUES (?,?,?,?,?,?,?,?)");
    $query->bind_param("ssssssss",$mission_number,$mission_type,$licence_needed,$location,$date,$departure_time,$iddriver,$idvehicule);
if(isset($_POST['submit']))  {
    echo"BUG HEREEEEEE";
    
    $mission_number = $_POST["mission_number"];
    $mission_type = $_POST["mission_type"];
    $licence_needed = $_POST["licence_needed"];
    $location = $_POST["mission_location"];
    $date = $_POST["mission_date"];
    $departure_time = $_POST["departure_time"];
    $iddriver;
    $idvehicule;
    
    $query->execute();
    echo "New account created";
}
    mysqli_close($conn);
?>