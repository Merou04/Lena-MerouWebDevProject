<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - CarTrack</title>
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
        form {
            width: 300px;
            padding: 30px;
            background: rgba(255, 255, 255, 0.9);
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
        }
        h2 {
            text-align: center;
            color: #333; 
            margin-bottom: 20px;
        }
        label {
            display: block;
            margin-bottom: 5px;
            color: #333; 
        }
        input[type="text"], input[type="password"] {
            width: calc(100% - 20px);
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        input[type="submit"] {
            width: 100%;
            background-color: #ffdb58; 
            color: #333; 
            padding: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #ccab42; 
        }
        .error {
            color: red;
            text-align: center;
            margin-top: -10px;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <?php
    session_start();

    
    $servername = "localhost";
    $username = "root";
    $password = "Raouf120304"; 
    $dbname = "cartrack_db";

    $conn = new mysqli($servername, $username, $password, $dbname);

    
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $passwordError = "";

    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
       
        $userId = $_POST["userid"];
        $userPassword = $_POST["password"];

        $stmt = $conn->prepare("SELECT role, password FROM users WHERE user_id = ?");
        $stmt->bind_param("i", $userId);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows > 0) {
            $stmt->bind_result($role, $hashedPassword);
            $stmt->fetch();

            if ($userPassword == $hashedPassword) {  
                
                $_SESSION['user_id'] = $userId;

                
                if ($role === "Driver") {
                    header("Location: InterfaceCH.php");
                    exit();
                } elseif ($role === "Admin") {
                    header("Location: acceuilSA.php");
                    exit();
                } elseif ($role === "Car Manager") {
                    header("Location: car manager.php");
                    exit();
                }
            } else {
                $passwordError = "Invalid User ID or Password.";
            }
        } else {
            $passwordError = "Invalid User ID or Password.";
        }
        $stmt->close();
    }
    $conn->close();
    ?>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <h2>Login to CarTrack</h2>
        <div>
            <label for="userid">User ID:</label>
            <input type="text" id="userid" name="userid" required placeholder="Enter your User ID">
        </div>
        <div>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required placeholder="Enter your Password" minlength="6" maxlength="15">
            <?php if ($passwordError): ?>
                <div class="error"><?php echo $passwordError; ?></div>
            <?php endif; ?>
        </div>
        <div>
            <input type="submit" value="Login">
        </div>
    </form>
</body>
</html>
