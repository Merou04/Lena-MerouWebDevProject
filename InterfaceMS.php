<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Informations mission</title>
</head>
<body style="margin: 0; padding: 0; display: flex; justify-content: center; align-items: center; height: 100vh; background: linear-gradient(45deg, #FFA500, #FFFF00); font-family: Arial, sans-serif;">
    <div class="container" style="text-align: center; background-color: rgba(255, 255, 255, 0.9); padding: 20px; border-radius: 10px; box-shadow: 0 0 20px rgba(0, 0, 0, 0.2);">
        <h1 style="color: #333; margin-bottom: 20px;">Informations mission</h1>
        <form style="max-width: 400px; margin: 0 auto;">
            <label for="typeMission" style="display: block; margin-bottom: 10px;">Type de mission :</label>
            <input type="text" id="typeMission" name="typeMission" style="width: 100%; padding: 10px; margin-bottom: 20px; border-radius: 5px; border: 1px solid #ccc; box-sizing: border-box;">

            <label for="typeMarchandise" style="display: block; margin-bottom: 10px;">Type de marchandise :</label>
            <input type="text" id="typeMarchandise" name="typeMarchandise" style="width: 100%; padding: 10px; margin-bottom: 20px; border-radius: 5px; border: 1px solid #ccc; box-sizing: border-box;">

            <label for="vehiculeAttribue" style="display: block; margin-bottom: 10px;">Véhicule attribué :</label>
            <input type="text" id="vehiculeAttribue" name="vehiculeAttribue" style="width: 100%; padding: 10px; margin-bottom: 20px; border-radius: 5px; border: 1px solid #ccc; box-sizing: border-box;">

            <label for="lieuLivraison" style="display: block; margin-bottom: 10px;">Lieu de livraison :</label>
            <input type="text" id="lieuLivraison" name="lieuLivraison" style="width: 100%; padding: 10px; margin-bottom: 20px; border-radius: 5px; border: 1px solid #ccc; box-sizing: border-box;">

            <label for="tempsLivraison" style="display: block; margin-bottom: 10px;">Temps de livraison :</label>
            <input type="text" id="tempsLivraison" name="tempsLivraison" style="width: 100%; padding: 10px; margin-bottom: 20px; border-radius: 5px; border: 1px solid #ccc; box-sizing: border-box;">

            <label for="fraisMission" style="display: block; margin-bottom: 10px;">Frais de mission :</label>
            <input type="text" id="fraisMission" name="fraisMission" style="width: 100%; padding: 10px; margin-bottom: 20px; border-radius: 5px; border: 1px solid #ccc; box-sizing: border-box;">

            <input type="submit" value="Enregistrer" style="background-color: #FFA500; color: white; padding: 10px 20px; border: none; border-radius: 5px; cursor: pointer;">
        </form>
    </div>
</body>
</html>