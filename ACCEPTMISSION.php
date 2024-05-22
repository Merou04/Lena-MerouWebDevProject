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

        p {
            color: #555;
            margin-bottom: 20px;
        }

        button {
            background-color: #4CAF50;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
        }

        button:hover {
            background-color: #45a049;
        }

        .logout-button {
            position: absolute;
            top: 10px;
            right: 10px;
            background-color: #FF0000;
            color: #fff;
            padding: 10px 20px;
            border-radius: 5px;
            text-decoration: none;
            cursor: pointer;
        }

        .logout-button:hover {
            background-color: #cc0000;
        }

        .back-link {
            display: inline-block;
            margin-top: 20px;
            background-color: #0000FF;
            color: #fff;
            padding: 10px 20px;
            border-radius: 5px;
            text-decoration: none;
            cursor: pointer;
            position: absolute;
            bottom: 10px;
            left: 10px;
        }

        .back-link:hover {
            background-color: #0000cc;
        }
    </style>
</head>
<body>
    <a href="Index.php" class="logout-button">Se déconnecter</a>
    <div class="container">
        <h1>Mission Information</h1>
        <div>
            <p><strong>Mission Number :</strong> <?php echo isset($_POST['numeroMission']) ? htmlspecialchars($_POST['numeroMission']) ; ?></p>
            <p><strong>Mission Type :</strong> <?php echo isset($_POST['typeMission']) ? htmlspecialchars($_POST['typeMission']) ; ?></p>
            <p><strong>Goods Type :</strong> <?php echo isset($_POST['typeMarchandise']) ? htmlspecialchars($_POST['typeMarchandise']) ; ?></p>
            <p><strong>Delivery Location :</strong> <?php echo isset($_POST['lieuLivraison']) ? htmlspecialchars($_POST['lieuLivraison']) ; ?></p>
            <p><strong>Assigned Vehicle :</strong> <?php echo isset($_POST['vehiculeAttribue']) ? htmlspecialchars($_POST['vehiculeAttribue']) ; ?></p>
            <p><strong>Mission Cost :</strong> <?php echo isset($_POST['fraisMission']) ? htmlspecialchars($_POST['fraisMission']) ; ?></p>
        </div>
        <button type="button" onclick="window.location.href = 'InterfaceSig.php';">Report</button>
        <a href="InterfaceMS.php" class="back-link">Back</a>
    </div>
</body>
</html>
