<?php
session_start();

 $host = "localhost";
 $dbuser = "root";
 $dbpass = "";
 $dbname = "CarTrack";
 $conn = mysqli_connect($host, $dbuser, $dbpass, $dbname);
 
 // recherche du conducteur et supprimer
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirm Deletion</title>
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

        .confirmation-box {
            background-color: rgba(255, 255, 255, 0.9);
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.2);
            text-align: center;
            max-width: 400px;
            width: 80%;
        }

        h2 {
            color: #172b4d; 
        }

        p {
            color: #333; 
            margin-top: 20px;
            margin-bottom: 40px;
        }

        .button {
            background-color: #ffdb58; 
            color: #333;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            margin: 0 10px;
            text-decoration: none; 
        }

        .button:hover {
            background-color: #ccab42; 
        }
    </style>
</head>
<body>
    <div class="confirmation-box">
        <h2>Confirm Deletion</h2>
        <p>Are you sure you want to delete this driver?</p>
        <button class="button" onclick="confirmDeletion()">Yes, Delete</button>
        <button class="button" onclick="cancelDeletion()">No, Cancel</button>
    </div>

    <script>
        function confirmDeletion() {
            // Implementation would go here for what happens when 'Yes' is clicked.
            alert('Driver deleted successfully.');
        }

        function cancelDeletion() {
            // Implementation would go here for what happens when 'No' is clicked.
            alert('Deletion canceled.');
        }
    </script>
</body>
</html>

<?php
    mysqli_close($conn);
?>