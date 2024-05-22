<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mission Information</title>
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

        .container {
            text-align: center;
            background-color: rgba(255, 255, 255, 0.9);
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.2);
            max-width: 400px;
            margin: 50px auto;
        }

        h1 {
            color: #333;
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 10px;
            color: #555;
        }

        input[type="text"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border-radius: 5px;
            border: 1px solid #ccc;
            box-sizing: border-box;
        }

        button[type="submit"], .back-button {
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin-right: 10px;
            text-decoration: none;
        }

        button[type="submit"] {
            background-color: #4CAF50;
        }

        button[type="submit"]:hover {
            background-color: #45a049;
        }

        a {
            background-color: #FF0000;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
        }

        a:hover {
            background-color: #cc0000;
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
        }

        .back-button:hover {
            background-color: #0000cc;
        }
    </style>
</head>
<body>
    <?php
    session_start();

    if (!isset($_SESSION['user_id'])) {
        header("Location: login.php");
        exit();
    }

    $host = "localhost";
    $dbuser = "root";
    $dbpass = "Raouf120304";
    $dbname = "cartrack_db";
    $conn = new mysqli($host, $dbuser, $dbpass, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $mission_id = 10301;
    $sql = "SELECT * FROM missions WHERE mission_id = $mission_id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $mission = $result->fetch_assoc();
    } else {
        echo "No mission found";
        exit;
    }
    ?>  
   
    <div class="container">
        <h1>Mission Information</h1>
        <form>
            <label for="numeroMission">Mission ID :</label>
            <input type="text" id="numeroMission" name="numeroMission" value="<?php echo $mission['mission_id']; ?>" readonly>

            <label for="typeMission">Mission Description :</label>
            <input type="text" id="typeMission" name="typeMission" value="<?php echo $mission['description']; ?>" readonly>

            <label for="typeMarchandise">Goods Type :</label>
            <input type="text" id="typeMarchandise" name="typeMarchandise" value="<?php echo $mission['goodstype']; ?>" readonly>

            <label for="lieuLivraison">Delivery Location :</label>
            <input type="text" id="lieuLivraison" name="lieuLivraison" value="<?php echo $mission['DeliveryLocation']; ?>" readonly>

            <label for="vehiculeAttribue">Assigned Vehicle :</label>
            <input type="text" id="vehiculeAttribue" name="vehiculeAttribue" value="Delivery Truck XYZ123" readonly>

            <label for="fraisMission">Mission Cost :</label>
            <input type="text" id="fraisMission" name="fraisMission" value="<?php echo $mission['MissionCost']; ?>" readonly>

            <button type="submit" formaction="ACCEPTMISSION.PHP">✓ Accept</button>
            <a href="InterfaceSig.php">✗ Reject</a>
        </form>
    </div>

    <a href="Index.php" class="logout-button">Se déconnecter</a>
    <a href="InterfaceCH.php" class="back-button">Back</a>
</body>
</html>

<?php
$conn->close();
?>
