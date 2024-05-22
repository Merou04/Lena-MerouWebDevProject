<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$servername = "127.0.0.1";
$username = "root";
$password = "Raouf120304";
$dbname = "cartrack_db";
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['check_decision'])) {
        $report_id = $_POST['report_id'];
        $stmt = $conn->prepare("SELECT decision FROM reports WHERE report_id = ?");
        $stmt->bind_param("i", $report_id);
        $stmt->execute();
        $stmt->bind_result($decision);
        $stmt->fetch();
        $stmt->close();
        echo json_encode(['decision' => $decision]);
        exit();
    } else if (isset($_POST['see_decision'])) {
        $user_id = $_SESSION['user_id'];
        $stmt = $conn->prepare("SELECT decision FROM reports WHERE user_id = ? ORDER BY report_id DESC LIMIT 1");
        $stmt->bind_param("i", $user_id);
        $stmt->execute();
        $stmt->bind_result($decision);
        $stmt->fetch();
        $stmt->close();
        echo json_encode(['decision' => $decision]);
        exit();
    } else {
        $user_id = $_SESSION['user_id'];
        $problem = $_POST['problem'];
        $mission_id = 10301; 
        $vehicle_id = 1; 
        $report_date = date("Y-m-d"); 

        $stmt = $conn->prepare("INSERT INTO reports (mission_id, user_id, vehicle_id, report_date, content) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("iiiss", $mission_id, $user_id, $vehicle_id, $report_date, $problem);

        if ($stmt->execute()) {
            $report_id = $stmt->insert_id;
            echo "<script>
                document.addEventListener('DOMContentLoaded', function() {
                    startCheckingDecision($report_id);
                });
            </script>";
        } else {
            echo "<script>document.getElementById('waitingMessage').innerText = 'Error: " . $stmt->error . "';</script>";
        }

        $stmt->close();
    }
}

$conn->close();
?>
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
            position: relative;
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
            color: #000; /* Ensure text color is readable */
        }

        input[type="submit"],
        button {
            background-color: #ffdb58; 
            color: #333; 
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin: 10px 0;
        }

        input[type="submit"]:hover,
        button:hover {
            background-color: #ccab42; 
        }

        .logout-link {
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

        .logout-link:hover {
            background-color: #cc0000;
        }

        .back-link {
            display: inline-block;
            margin-top: 20px;
            background-color: #0000FF;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
            position: absolute;
            bottom: 10px;
            left: 10px;
        }

        .back-link:hover {
            background-color: #0000cc;
        }

        .waiting-message {
            display: none;
            margin-top: 20px;
            font-size: 18px;
            color: #172b4d;
            background-color: rgba(255, 255, 255, 0.9);
            padding: 10px;
            border-radius: 5px;
        }

        .decision-message {
            margin-top: 20px;
            font-size: 18px;
            color: #172b4d;
            background-color: rgba(255, 255, 255, 0.9);
            padding: 10px;
            border-radius: 5px;
            display: none;
        }
    </style>
    <script>
        function showWaitingMessage() {
            document.getElementById("waitingMessage").style.display = "block";
            document.getElementById("waitingMessage").innerText = "En attente de la réponse de l'admin";
        }

        function checkDecision(reportId) {
            const formData = new FormData();
            formData.append('check_decision', 'true');
            formData.append('report_id', reportId);

            fetch(window.location.href, {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                if (data.decision === "pending") {
                    document.getElementById("waitingMessage").innerText = "En attente de la réponse de l'admin";
                } else if (data.decision === "decliné") {
                    window.location.href = "ACCEPTMISSION.php?message=report_decliné";
                } else if (data.decision === "accepté") {
                    window.location.href = "InterfaceCH.php?message=No_Current_Mission";
                }
            })
            .catch(error => console.error('Error:', error));
        }

        function startCheckingDecision(reportId) {
            showWaitingMessage();
            setInterval(() => checkDecision(reportId), 5000);
        }

        function seeDecision() {
            const formData = new FormData();
            formData.append('see_decision', 'true');

            fetch(window.location.href, {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                document.getElementById("decisionMessage").style.display = "block";
                document.getElementById("decisionMessage").innerText = `Decision: ${data.decision}`;
            })
            .catch(error => console.error('Error:', error));
        }
    </script>
</head>
<body>
    <a href="Index.php" class="logout-link">Se déconnecter</a>
    <div class="container">
        <h2>What problem are you encountering?</h2>
        <form id="problemForm" method="post" onsubmit="showWaitingMessage()">
            <textarea name="problem" rows="8" placeholder="Describe the problem encountered here..." required></textarea>
            <br>
            <input type="submit" value="Submit" onclick="showWaitingMessage()">
        </form>
        <button onclick="seeDecision()">Voir décision</button>
        <div id="waitingMessage" class="waiting-message">En attente de la réponse de l'admin</div>
        <div id="decisionMessage" class="decision-message"></div>
        <a href="javascript:history.back()" class="back-link">Back</a>
    </div>
</body>
</html>
