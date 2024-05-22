<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Report Management</title>
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

        .report-container {
            background-color: rgba(255, 255, 255, 0.9);
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.2); 
            text-align: center;
            width: 80%;
            max-width: 400px;
        }

        h2 {
            color: #172b4d; 
            margin-bottom: 30px; 
        }

        button {
            background-color: #ffdb58; 
            color: #333; 
            padding: 12px 24px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            width: 100%; 
            margin: 10px 0; 
            text-decoration: none;
        }

        button:hover {
            background-color: #ccab42;
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
</head>
<body>
    <a href="Index.php" class="logout-button">Se déconnecter</a>
    <div class="report-container">
        <h2>Report Management</h2>
        <button onclick="window.location.href = 'view drivers reports.php';">Driver Reports</button> 
        <button onclick="window.location.href = 'vehiculemanagerreports.php';">Vehicle Manager Reports</button>
    </div>
    <a href="acceuilSA.php" class="back-button">Back</a>
</body>
</html>
