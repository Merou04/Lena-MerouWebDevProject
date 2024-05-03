<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Car Track</title>
    <style>
        body {
            background: linear-gradient(to right, orange, yellow, red); 

            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            font-family: 'Arial', sans-serif;
            color: #FFFFFF; /
        }
        form {
            width: 300px;
            padding: 30px;
            background: white; 
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2); 
        }
        h2 {
            text-align: center;
            color: #333; 
            margin-bottom: 20px; 
        }
        label {
            display: block; 
            margin-bottom: 5px; 
        }
        input[type="text"], input[type="password"] {
            width: calc(100% - 20px); 
            padding: 10px;
            margin-bottom: 15px; 
            border: 1px solid #ccc; 
            border-radius: 5px; 
        }
        input[type="submit"] {
            width: 100%;
            background-color: #ff4500; 
            color: white;
            padding: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #c83711; 
        }
    </style>
</head>
<body>
    <form action="/submit-your-login-form" method="post">
        <h2>Login to Car Track</h2>
        <div>
            <label for="userid">User ID:</label>
            <input type="text" id="userid" name="userid" required placeholder="Enter your User ID">
        </div>
        <div>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required placeholder="Enter your Password">
        </div>
        <div>
            <input type="submit" value="Login">
        </div>
    </form>
</body>
</html>


