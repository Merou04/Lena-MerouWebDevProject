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
            color: #fff; /* White text */
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
    <div class="container">
        <div class="profile-image">
            <img src="C:\Users\Smadhi Katia\Pictures\Screenshots.jpg" alt="Driver's Photo"> <!-- Remplacez "C:\Users\Smadhi Katia\Pictures\Screenshots.jpg" par le chemin de votre image -->
        </div>
        <div class="profile-info">
            <h2>Driver's Name: SAID SAIDOUN</h2>
            <p>Date of Birth: DD/MM/YYYY</p>
            <p>License Type: C</p>
            <p>Driver's Description</p>
            <a href="InterfaceMS.php" class="button">View Mission</a>
        </div>
    </div>
</body>
</html>
