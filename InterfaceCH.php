<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Driver Profile</title>
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
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: rgba(255, 255, 255, 0.9);
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.2);
            max-width: 800px;
            width: 80%;
        }
        .profile-info {
            flex: 1;
            text-align: left;
            margin-left: 20px;
        }
        .profile-info h2 {
            color: #172b4d;
            margin-top: 0;
        }
        .profile-info p {
            margin-bottom: 10px;
            color: #555;
        }
        .profile-info a.button {
            background-color: #ffdb58;
            color: #333;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin-right: 10px;
            display: inline-block;
            margin-top: 20px;
            text-decoration: none;
        }
        .profile-info a.button:hover {
            background-color: #ccab42;
        }
        .profile-image {
            flex: 1;
            text-align: center;
        }
        .profile-image img {
            width: 300px;
            height: 300px;
            border-radius: 10px;
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

  
    $user_id = $_SESSION['user_id'];

 
    $sql = "SELECT d.name, d.license_type, d.status, d.birth_date, d.Description 
            FROM drivers d 
            JOIN users u ON d.user_id = u.user_id 
            WHERE u.user_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $stmt->bind_result($name, $license_type, $status, $birth_date, $description);
    $stmt->fetch();
    $stmt->close();
    $conn->close();
    ?>
    <div class="container">
        <div class="profile-image">
            <img src="path/to/your/image.jpg" alt="Driver's Photo"> 
        </div>
        <div class="profile-info">
            //pour afficher sur l'interface a partir de la bdd
            <h2>Driver's Name: <?php echo htmlspecialchars($name); ?></h2>
            <p>Date of Birth: <?php echo htmlspecialchars($birth_date); ?></p>
            <p>License Type: <?php echo htmlspecialchars($license_type); ?></p>
            <p>Status: <?php echo htmlspecialchars($status); ?></p>
            <p>Description: <?php echo htmlspecialchars($description); ?></p>
            <a href="InterfaceMS.php" class="button">View Mission</a>
        </div>
    </div>
</body>
</html>
