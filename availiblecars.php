<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>List of Vehicles</title>
<style>
  body {
    font-family: Arial, sans-serif;
    background-color: #172b4d;   
    
    color: black;
    margin: 0;
    padding: 20px;
  }
  .container {
    max-width: 600px;
    margin: 0 auto;
    background-color: #fff;
    padding: 20px;
    border-radius: 5px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
  }
  h1 {
    text-align: center;
    color: #172b4d;
  }
  ul {
    list-style-type: none;
    padding: 0;
  }
  li {
    padding: 10px 0;
    border-bottom: 1px solid #ccc;
    display: flex;
    justify-content: space-between;
    align-items: center;
  }
  button {
    background-color: #4caf50;
    color: black;
    padding: 8px 15px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
  }
</style>
</head>
<body>
<div class="container">
  <h1>List of Vehicles</h1>
  <ul>
    <li><span>Toyota Camry</span> <span>21B001</span> <form method="post"><input type="hidden" name="vehicle" value="Toyota Camry"><button type="submit" name="submit">Select</button></form></li>
    <li><span>Honda Civic</span> <span>22R002</span> <form method="post"><input type="hidden" name="vehicle" value="Honda Civic"><button type="submit" name="submit">Select</button></form></li>
    <li><span>Ford Mustang</span> <span>21G003</span> <form method="post"><input type="hidden" name="vehicle" value="Ford Mustang"><button type="submit" name="submit">Select</button></form></li>
    <li><span>Chevrolet Corvette</span> <span>23W004</span> <form method="post"><input type="hidden" name="vehicle" value="Chevrolet Corvette"><button type="submit" name="submit">Select</button></form></li>
    <li><span>BMW X5</span> <span>22R005</span> <form method="post"><input type="hidden" name="vehicle" value="BMW X5"><button type="submit" name="submit">Select</button></form></li>
    <li><span>Audi A4</span> <span>21B006</span> <form method="post"><input type="hidden" name="vehicle" value="Audi A4"><button type="submit" name="submit">Select</button></form></li>
    <li><span>Mercedes-Benz E-Class</span> <span>23W007</span> <form method="post"><input type="hidden" name="vehicle" value="Mercedes-Benz E-Class"><button type="submit" name="submit">Select</button></form></li>
    <li><span>Volkswagen Golf</span> <span>22R008</span> <form method="post"><input type="hidden" name="vehicle" value="Volkswagen Golf"><button type="submit" name="submit">Select</button></form></li>
    <li><span>Jeep Wrangler</span> <span>23W009</span> <form method="post"><input type="hidden" name="vehicle" value="Jeep Wrangler"><button type="submit" name="submit">Select</button></form></li>
    <li><span>Nissan Altima</span> <span>21G010</span> <form method="post"><input type="hidden" name="vehicle" value="Nissan Altima"><button type="submit" name="submit">Select</button></form></li>
  </ul>
</div>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    $selectedVehicle = $_POST['vehicle'];
    echo "<div class='container'>";
    echo "<h2>Selected Vehicle: $selectedVehicle</h2>";
    echo "</div>";
}
?>

</body>
</html>
