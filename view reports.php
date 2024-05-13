
<?php
           
            $host = "localhost";
            $dbuser = "root";
            $dbpass = "";
            $dbname = "CarTrack";
            $conn = mysqli_connect($host, $dbuser, $dbpass, $dbname);

           
            if (!$conn) {
                die("Connection failed: " . mysqli_connect_error());
            }

            // pour recuper les données de la bas de données
            $sql = "SELECT * FROM reports";
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0) {
                
                echo "<h3>Recent Reports</h3>";
                echo "<table border='1'>";
                echo "<tr><th>Subject</th><th>Message</th></tr>";
                while($row = mysqli_fetch_assoc($result)) {
                    echo "<tr><td>" . $row["subject"] . "</td><td>" . $row["message"] . "</td></tr>";
                }
                echo "</table>";
            } else {
                echo "No reports found";
            }

            mysqli_close($conn);
        ?>
/* <?php
session_start();

 $host = "localhost";
 $dbuser = "root";
 $dbpass = "";
 $dbname = "CarTrack";
 $conn = mysqli_connect($host, $dbuser, $dbpass, $dbname);

 ?>*/

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
    </style>
</head>
<body>
    <div class="report-container">
        <h2>Report Management</h2>
        <button onclick="window.location.href = 'view drivers reports.php';">Driver Reports</button> 
        <button onclick="window.location.href = 'vehiculemanagerreports.php';">Vehicle Manager Reports</button>
    </div>
</body>
</html>

<?php
    mysqli_close($conn);
?>
