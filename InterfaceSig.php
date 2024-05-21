<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>What problem are you encountering?</title>
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
            max-width: 600px;
            width: 80%;
        }

        h2 {
            color: #172b4d; 
        }

        textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border-radius: 5px;
            border: 1px solid #ccc;
            box-sizing: border-box;
            resize: vertical; 
        }

        input[type="submit"] {
            background-color: #ffdb58; 
            color: #333; 
            padding: 10px 20px;
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
    <div class="container">
        <h2>What problem are you encountering?</h2>
        <form action="ACCEPTMISSION.PHP" method="post">
            <textarea name="problem" rows="8" placeholder="Describe the problem encountered here..." required><?php
                
                session_start();
                if (!isset($_SESSION['user_id'])) {
                    header("Location: login.php");
                    exit();
                }

                $servername = "127.0.0.1";
                $username = "root";
                $password = "Raouf120304";
                $dbname = "cartrack_db";
                $user_id = $_SESSION['user_id'];

                $conn = new mysqli($servername, $username, $password, $dbname);

                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                $role_sql = "SELECT role FROM users WHERE user_id = $user_id";
                $role_result = $conn->query($role_sql);

                if ($role_result->num_rows > 0) {
                    $role_row = $role_result->fetch_assoc();
                    $role = $role_row['role'];

                    if ($role == 'Car Manager') {
                        $report_sql = "SELECT content FROM reports WHERE user_id = $user_id LIMIT 1";
                    } elseif ($role == 'Driver') {
                        $report_sql = "SELECT content FROM reports WHERE user_id = $user_id LIMIT 1";
                    } else {
                        echo "No report found for this role.";
                        exit();
                    }

                    $report_result = $conn->query($report_sql);

                    if ($report_result->num_rows > 0) {
                        while($row = $report_result->fetch_assoc()) {
                            echo htmlspecialchars($row["content"]);
                        }
                    } else {
                        echo "No report found";
                    }
                } else {
                    echo "No role found for this user.";
                }

                $conn->close();
            ?></textarea>
            <br>
            <input type="submit" value="Submit">
        </form>
    </div>
</body>
</html>
