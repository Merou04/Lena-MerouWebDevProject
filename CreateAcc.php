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
    button {
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
 
 
 ?>


<html >
    <head>
            <title>Account Creation</title>
    </head>
    <body>
        <div class="block">
            <h2>Create a driver's account</h2>
            <img src="C:/images" alt="Driver's picture" width="150">
            <form action="#" method="post">
                <label>Username:</label>
                <input type="text" id="username" name="username" required>
                <label>Birth date:</label>
                <input type="date" id="birthdate" name="birthdate" required max="2003-01-01">
                <label>Licence:</label>
                <select name="Licence" required>
                    <option value="0">Select the driving licence</option>
                    <option value="1">A</option>
                    <option value="2">B</option>
                    <option value="3">C</option>
                </select>
                <label>Tel:</label>
                <input type="tel" id="tel" name="tel" placeholder="Num tel" required>
                <br>
                <label>Description of the driver:</label>
                <textarea name="Description"></textarea>
                <br>
                <label>Email:</label>
                <input type="email" id="email" name="email" required>
                <label>Password:</label>
                <input type="password" id="password" name="password" minlength="6" required>
                <button type="submit" name="submit">Create Account</button>
            </form>
        </div>
    </body>
</html>
<?php
    if(isset($_POST['submit'])) {
        
        $username = $_POST["username"];
        $birthdate = $_POST["birthdate"];
        $licence = $_POST["Licence"];
        $tel = $_POST["tel"];
        $description = $_POST["Description"];
        $email = $_POST["email"];
        $psw=$_POST["password"];
        $password = password_hash($pwd,PASSWORD_DEFAULT);

        
        if (strlen($tel) !== 10) {
            echo "<script>alert('Phone number must be 10 characters long');</script>";
            exit(); // Arrête l'exécution du script PHP
        }
        if (strlen($psw) < 6) {
            echo "<script>alert('Password must be at least 6 characters long');</script>";
            exit(); // Arrête l'exécution du script PHP
        }
        $query=mysqli_prepare($conn,"INSERT INTO driver(username,birthdate,licence,tel,descrip,email,psw) VALUES ($username,$birthdate,$licence,$tel,$description,$email,$password)");
        $query->execute();
        echo "New record inserted successfully";
    }
    mysqli_close($conn);
?>