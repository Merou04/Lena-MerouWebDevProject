<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil du Chauffeur</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background: linear-gradient(45deg, #FFA500, #FFFF00);
        }

        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: rgba(255, 255, 255, 0.9);
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.2);
            max-width: 800px;
            width: 80%;
        }

        .profile-info {
            flex: 1;
            text-align: left;
        }

        .profile-info h2 {
            color: #333;
            margin-top: 0;
        }

        .profile-info p {
            margin-bottom: 10px;
            color: #555;
        }

        .profile-info button {
            background-color: #FFA500;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin-right: 10px;
        }

        .profile-info button:hover {
            background-color: #FF8C00;
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
            <img src="photo_profil.jpg" alt="Photo du chauffeur">
        </div>
        <div class="profile-info">
            <h2>Nom Prénom du Chauffeur</h2>
            <p>Date de Naissance : JJ/MM/AAAA</p>
            <p>Type de Permis : B</p>
            <p>Description du Chauffeur</p>
            <button onclick="afficherMissions()">Missions</button>
            <button onclick="signalerProbleme()">Signaler un problème</button>
        </div>
    </div>
</body>
</html>