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
            color: #333; /* Dark blue */
            margin-bottom: 20px;
        }
        label {
            display: block;
            margin-bottom: 5px;
            color: #333; /* Dark blue */
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
    </style>
</head>
<body>
    <?php
    // Vérification du formulaire après soumission
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Vérification du format de l'identifiant utilisateur
        if (isset($_POST["userid"])) {
            $userId = $_POST["userid"];
            // Redirection en fonction du préfixe de l'identifiant utilisateur
            if (substr($userId, 0, 1) === "1") {
                header("Location: acceuilSA.php");
                exit();
            } elseif (substr($userId, 0, 1) === "2") {
                header("Location: InterfaceCH.php");
                exit();
            } elseif (substr($userId, 0, 1) === "3") {
                header("Location: car manager.php");
                exit();
            }
        }
    }
    ?>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <h2>Login to CarTrack</h2>
        <div>
            <label for="userid">User ID:</label>
            <input type="text" id="userid" name="userid" required placeholder="Enter your User ID">
        </div>
        <div>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required placeholder="Enter your Password">
        </div>
        <div>
            <input type="submit" value="Login">
        </div>
    </form>
</body>
</html>
