<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil - Cartrack</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <div class="content">
            <h1>Bienvenue dans l'univers de <span>Cartrack</span></h1>
            <p>Prêt à découvrir une nouvelle expérience de suivi et de gestion de missions d'entreprise ?</p>
            <a href="login.php" class="btn-login">Login</a>
        </div>
    </div>
</body>
</html>

<style>
body {
    margin: 0;
    padding: 0;
    font-family: 'Arial', sans-serif;
    background-color: #001f3f; 
    color: #fff;
    height: 100vh;
    display: flex;
    align-items: center;
    justify-content: center;
    background: linear-gradient(135deg, #001f3f 40%, #00509e 100%);
}

.container {
    text-align: center;
}

.content {
    background-color: rgba(255, 255, 255, 0.15); 
    border-radius: 15px;
    max-width: 600px;
    width: 90%;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
}

h1 {
    font-size: 48px;
    margin-bottom: 20px;
    color: #ffc107;
}

h1 span {
    font-weight: bold;
    color: #ffdb58; 
}

p {
    font-size: 24px;
    margin-bottom: 30px;
}

.btn-login {
    display: inline-block;
    padding: 15px 30px;
    background-color: #ffc107;
    color: #001f3f;
    text-decoration: none;
    border-radius: 5px;
    font-size: 24px;
    transition: background-color 0.3s ease, transform 0.3s ease;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
}

.btn-login:hover {
    background-color: #ffdb58; 
    transform: translateY(-2px);
}

.btn-login:active {
    background-color: #e0ac00; 
    transform: translateY(0);}

</style>