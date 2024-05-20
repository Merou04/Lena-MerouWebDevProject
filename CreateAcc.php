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
 //session_start();
 $host = "localhost";
 $dbuser = "root";
 $dbpass = "";
 $dbname = "cartrack";
 $conn = mysqli_connect($host, $dbuser, $dbpass, $dbname);
 
 
 ?>


<html >
    <head>
            <title>Account Creation</title>
    </head>
    <body>
        <div class="block">
            <h2>Create a driver's account</h2>
            <form>
                <label>Username:</label>
                <input type="text" id="username" name="username" required>
                <label>Password:</label>
                <input type="password" id="password" name="password" minlength="6" required>
                
                <label>Licence:</label>
                <select name="licence">
                    <option value="0">Select the driving licence</option>
                    <option value="1">A</option>
                    <option value="2">B</option>
                    <option value="3">C</option>
                </select>
                <label>Status:</label>
                <select name="status" required>
                    <option value="Active">Active</option>
                    <option value="Inactive">Inactive</option>
                </select>
                <label>Birth date:</label>
                <input type="date" id="birthdate" name="birthdate" required max="2003-01-01">
                <label>Tel:</label>
                <input type="tel" id="tel" name="tel" placeholder="Num tel" required>
                <label>Description of the driver:</label>
                <textarea name="Description"></textarea>
                <input type="hidden" id="role" name="role" value="Driver">
                <button type="submit" name="submit">Create Account</button>
            </form>
        </div>

    </body>
</html>

<?php
        
    if(isset($_POST['submit'])){
            $tel=$_POST['tel'];
            $psw=$_POST['password'];
            if (strlen($tel) !== 10) {
                echo "<script>alert('Phone number must be 10 characters long');</script>";
                exit();
            }
            if (strlen($psw) < 6) {
                echo "<script>alert('Password must be at least 6 characters long');</script>";
                exit(); 
            }
            $username = $_POST['username'];
            $password = $_POST['password'];
            $role = $_POST['role'];
            $name = $_POST['name'];
            $license_number = $_POST['license_number'];
            $status = $_POST['status'];
            $email = $_POST['email'];
            $birthdate = $_POST['birthdate'];
            $tel = $_POST['tel'];
            $description = $_POST['Description'];

            $sql_user = "INSERT INTO Users (username, password, role) VALUES ('$username', '$password', '$role')";
            if ($conn->query($sql_user) === TRUE) {
                $user_id = $conn->insert_id; 
            } else {
                echo "Error: " . $sql_user . "<br>" . $conn->error;
            }

            $sql_driver = "INSERT INTO Drivers (user_id, name, license_number, status) VALUES ('$user_id', '$name', '$license_number', '$status')";
            if ($conn->query($sql_driver) === TRUE) {
                echo "New record created successfully";
            } else {
                echo "Error: " . $sql_driver . "<br>" . $conn->error;
        }
    }
    
    mysqli_close($conn);
?>