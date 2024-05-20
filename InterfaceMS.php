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
        button[type="submit"] {
            background-color: #4CAF50;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin-right: 10px;
            text-decoration: none;
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
        button[type="submit"]:hover {
            background-color: #45a049;
        }
        a:hover {
            background-color: #cc0000;
        }
    </style>
</head>
<body>
    <?php
    session_start();

    // Connexion à la base de données
    $host = "localhost";
    $dbuser = "root";
    $dbpass = "Raouf120304";
    $dbname = "cartrack_db";
    $conn = new mysqli($host, $dbuser, $dbpass, $dbname);

    // Vérifier la connexion
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // ID de la mission (vous pouvez le passer en tant que paramètre dans l'URL ou dans la session)
    $mission_id = 10301; // Exemple d'ID de mission

    // Requête pour obtenir les informations de la mission
    $sql = "SELECT m.MissionNumber, m.MissionType, m.DeliveryLocation, m.MissionCost, m.licence, v.name 
            FROM mission m
            JOIN vehicle v ON m.idvehicle = v.idvehicle
            WHERE m.MissionNumber = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $mission_id);
    $stmt->execute();
    $stmt->bind_result($missionNumber, $missionType, $deliveryLocation, $missionCost, $licence, $vehicleName);
    $stmt->fetch();
    $stmt->close();
    $conn->close();
    ?>
    <div class="container">
        <h1>Mission Information</h1>
        <form>
            <label for="numeroMission">Mission Number :</label>
            <input type="text" id="numeroMission" name="numeroMission" value="<?php echo htmlspecialchars($missionNumber); ?>" readonly>

            <label for="typeMission">Mission Type :</label>
            <input type="text" id="typeMission" name="typeMission" value="<?php echo htmlspecialchars($missionType); ?>" readonly>

            <label for="typeMarchandise">Goods Type :</label>
            <input type="text" id="typeMarchandise" name="typeMarchandise" value="<?php echo htmlspecialchars($licence); ?>" readonly>

            <label for="lieuLivraison">Delivery Location :</label>
            <input type="text" id="lieuLivraison" name="lieuLivraison" value="<?php echo htmlspecialchars($deliveryLocation); ?>" readonly>

            <label for="vehiculeAttribue">Assigned Vehicle :</label>
            <input type="text" id="vehiculeAttribue" name="vehiculeAttribue" value="<?php echo htmlspecialchars($vehicleName); ?>" readonly>

            <label for="fraisMission">Mission Cost :</label>
            <input type="text" id="fraisMission" name="fraisMission" value="<?php echo htmlspecialchars($missionCost); ?>" readonly>

            <button type="submit" formaction="ACCEPTMISSION.PHP">✓ Accept</button>
            <a href="InterfaceSig.php">✗ Reject</a>
        </form>
    </div>
</body>
</html>
