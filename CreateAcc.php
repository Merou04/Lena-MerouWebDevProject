<style>
    body {
    font-family: Arial;
    background-color:#172b4d;
    }
    .block {
    max-width: 400px;
    margin: 50px auto;
    padding: 20px;
    background-color: #fff;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }
    h2 {
    text-align: center;
    margin-bottom: 20px;
    }
    label {
    display: block;
    margin-bottom: 5px;
    }
    input[type="text"],
    input[type="email"],
    input[type="date"],
    input[type="tel"],
    input[type="password"] {
    width: 100%;
    padding: 10px;
    margin-bottom: 20px;
    border: 1px solid #ccc;
    border-radius: 5px;
    box-sizing: border-box;
    }
    textarea{
        width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
            resize: none;
    }
    .button {
    background-color:#ffdb58; 
    color: #fff;
    border: none;
    padding: 10px 20px;
    border-radius: 5px;
    cursor: pointer;
    width: 100%;
    }
    img {
    display: block;
    margin: 0 auto 20px;
    }
    select {
        width: 100%;
        padding: 10px;
        margin-bottom: 20px;
        border: 1px solid #ccc;
        border-radius: 5px;
        box-sizing: border-box;
    }
</style>
 <?php
session_start();
$host = "localhost";
 $dbuser = "root";
 $dbpass = "";
 $dbname = "CarTrack";
 $conn = mysqli_connect($host, $dbuser, $dbpass, $dbname);
 
// insert in table avec les attributs...
?>

 <html>
    <head>
        <title>Account Creation</title>
    </head>
    <body>
        <div class="block">
            <h2>Create a driver's account</h2>
            <img src="C:/images" alt="Driver's picture" width="150">
            <label>Username:</label>
            <input type="text" id="username" name="username" required>
            <label>Birth date:</label>
            <input type="date" id="birthdate" name="birthdate">
            <label>Licence:</label>
                <select name="licence">
                    <option value="0">Select the driving licence</option>
                    <option value="1">A</option>
                    <option value="2">B</option>
                    <option value="3">C</option>
                </select>
            <label>Tel:</label>
            <input type="tel" name="tel" placeholder="Num tel"/>
            <br>
            <label>Description of the driver:</label>
            <textarea name="description"></textarea>
            <br>
            <label>Email:</label>
            <input type="email" id="email" name="email" required>
            <label>Password:</label>
            <input type="password" id="password" name="password" required>
            <a href="Manage drivers.php" class="button" name="sbt">Creat account</a>
        </div>
    </body>
</html>

<?php
    mysqli_close($conn);
?>