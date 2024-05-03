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
    input[type="time"],
    input[type="date"],
    input[type="number"],
    input[type="text"] {
    width: 100%;
    padding: 10px;
    margin-bottom: 20px;
    border: 1px solid #ccc;
    border-radius: 5px;
    box-sizing: border-box;
    }
    button{
        text-align: center;
        background-color:#ffdb58; 
        color: #fff;
        border: none;
        padding: 10px 20px;
        border-radius: 5px;
        width: 100%;
    }
    .button{
        text-align: center;
        background-color:#FCC764; 
        color: #fff;
        border: none;
        padding: 8px 20px;
        border-radius: 5px;
        width: 100%;
    }
</style>
<html>
    <head>
    <title>Mission</title>
    </head>
    <body>
        <div class="block">
        <h1>Create a mission:</h1>
        <label>Mission's number:</label>
            <input type="number" name="nbr" placeholder="Mission"/>
            <br>
        <Label>Type mission:</Label>
            <input type="text" name="mission" placeholder="Mission"/>
            <br>
        <label>Type of merchandise:</label>
            <input type="text" name="merchandise" placeholder="Merchandise"/>
            <br>
        <Label>Location:</Label>
            <input type="text" name="location" placeholder="Delivery location"/>
            <br>
        <label>Date:</label>
            <input type="date" name="date" placeholder="date"/>
            <br>
        <label>Departure time:</label>
            <input type="time" name="Start" placeholder="Start"/>
            <br>
        <label>Choose driver:</label>
        <a href="fichier php ch dispo" class="button">Driver</a>
        <br><br><br>
        <label>Choose vehicle:</label>
        <a href="availiblecars.php" class="button">Vehicle</a> 
        <br><br>   
        <button type="submit">Submit mission</button>
        </div>
    </body>
</html>
