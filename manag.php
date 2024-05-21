<style>
    body{
        font-family: Arial;
        background-color:#172b4d;
    }
    .block {
    max-width: 600px;
    margin: 50px auto;
    padding: 20px;
    background-color: #fff;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }
    .button{
        text-align: center;
        background-color:#ffdb58; 
        color: #fff;
        border: none;
        padding: 10px 20px;
        border-radius: 5px;
        width: 100%;
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
<html>
    <head><title>Choice</title></head>
    <body>
    <a href="Welcome.php" class="logout-button">Se déconnecter</a>
        <div class="block">
            <div style="text-align :center;">
            <h2>Do you want to create or consult a mission?</h2>
            <a href="CreateMission.php" class="button">Create</a>
            <a href="consultation.php" class="button">Consult</a>
            <br><br>
        </div>
        <a href="acceuilSA.php" class="back-button">Back</a>
    </body>
</html>