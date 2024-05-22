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
            position: relative;
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
        .profile-info a.button, .profile-info form button {
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
        .profile-info a.button:hover, .profile-info form button:hover {
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
            object-fit: cover;
        }
        .no-mission {
            color: #ff0000;
            margin-top: 20px;
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
    <div class="container">
        <div class="profile-image">
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

            $sql = "SELECT d.driver_id, d.name, d.license_type, d.status, d.birth_date, d.Description, d.Pic_Driver 
                    FROM drivers d 
                    JOIN users u ON d.user_id = u.user_id 
                    WHERE u.user_id = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("i", $user_id);
            $stmt->execute();
            $stmt->bind_result($driver_id, $name, $license_type, $status, $birth_date, $description, $pic_driver);
            $stmt->fetch();
            $stmt->close();

            // Vérification de l'existence de missions pour ce driver_id
            $sql = "SELECT COUNT(*) FROM `mission-assignment` WHERE driver_id = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("i", $driver_id);
            $stmt->execute();
            $stmt->bind_result($mission_count);
            $stmt->fetch();
            $stmt->close();
            $conn->close();

            $has_mission = ($mission_count > 0);

            if ($pic_driver) {
                echo '<img src="data:image/jpeg;base64,' . base64_encode($pic_driver) . '" alt="Driver\'s Photo">';
            } else {
                echo '<img src="path/to/default/image.jpg" alt="Default Photo">';
            }
            ?>
        </div>
        <div class="profile-info">
            <h2>Driver's Name: <?php echo htmlspecialchars($name); ?></h2>
            <p>Date of Birth: <?php echo htmlspecialchars($birth_date); ?></p>
            <p>License Type: <?php echo htmlspecialchars($license_type); ?></p>
            <p>Status: <?php echo htmlspecialchars($status); ?></p>
            <p>Description: <?php echo htmlspecialchars($description); ?></p>
            <?php if ($has_mission): ?>
                <form method="GET" action="InterfaceMS.php">
                    <button type="submit" class="button">View Mission</button>
                </form>
            <?php else: ?>
                <p class="no-mission">No current mission</p>
            <?php endif; ?>
        </div>
    </div>
    <a href="login.php" class="back-button">Back</a>
</body>
</html>
