<style>
    body{
        font-family: Arial;
        background-color:#172b4d;
    }
    .block {
    max-width: 500px;
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

 </style>

<html>
    <head>
        <title>SUPER Admin</title>
    </head>
    <body>
        <div class="block" >
        <a href="Welcome.php" class="logout-button">Se déconnecter</a>
            <div style="text-align :center;">
            <h1>Hello admin, what would you like to do?</h1>
            <a href="manag.php" class="button">Manage mission</a>
            <br><br><br> 
            <a href="Manage drivers.php" class="button">Manage driver</a>
            <br><br><br>  
            <a href="report.php" class="button">View report</a>
            <br><br>
        </div>
    </body>
</html>
