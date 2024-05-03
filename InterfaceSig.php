<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quel problème rencontrez-vous durant la mission ?</title>
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
            text-align: center;
            background-color: rgba(255, 255, 255, 0.9);
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.2);
            max-width: 600px;
            width: 80%;
        }

        textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border-radius: 5px;
            border: 1px solid #ccc;
            box-sizing: border-box;
            resize: vertical; /* permet le redimensionnement vertical de la zone de texte */
        }

        input[type="submit"] {
            background-color: #FFA500;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #FF8C00;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Quel problème rencontrez-vous durant la mission ?</h2>
        <textarea rows="8" placeholder="Décrivez le problème rencontré ici..." required></textarea>
        <br>
        <input type="submit" value="Soumettre">
    </div>
</body>
</html>

       