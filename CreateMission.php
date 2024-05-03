<style>
     body {
    font-family: Arial;
    background-color:#F7DC6F;
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
        background-color:orange; 
        color: #fff;
        border: none;
        padding: 10px 20px;
        border-radius: 5px;
        width: 100%;
    }
    .button{
        text-align: center;
        background-color:#febe33; 
        color: #fff;
        border: none;
        padding: 10px 20px;
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
        <label>N* mission:</label>
            <input type="number" name="nbr" placeholder="Mission"/>
            <br>
        <Label>Type mission:</Label>
            <input type="text" name="mission" placeholder="Mission"/>
            <br>
        <label>Type de marchandse:</label>
            <input type="text" name="marchandise" placeholder="Marchandise"/>
            <br>
        <Label>Localisation:</Label>
            <input type="text" name="localisation" placeholder="Lieu de livraison"/>
            <br>
        <label>Date:</label>
            <input type="date" name="date" placeholder="date"/>
            <br>
        <label>Heure de depart:</label>
            <input type="time" name="Start" placeholder="Start"/>
            <br>
        <label>Choisir chauffeur:</label>
        <a href="fichier php ch dispo" class="button">Chauffeur</a>
        <br><br><br>
        <label>Choisir vehicule:</label>
        <a href="fichier php veh dispo" class="button">Vehicule</a> 
        <br><br>   
        <button type="submit">Submit mission</button>
        </div>
    </body>
</html>
