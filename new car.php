<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Vehicle</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #172b4d;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            text-align: center;
            margin-bottom: 20px;
        }
        .form-group {
            margin-bottom: 20px;
        }
        label {
            display: block;
            font-weight: bold;
        }
        input[type="text"],
        input[type="number"],
        input[type="date"] {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        select {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        button {
            padding: 12px 24px;
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
            border-radius: 4px;
        }
        button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Add Vehicle</h1>
        <form action="process_form.php" method="POST">
            <div class="form-group">
            <label for="name">Name of Vehicle:</label>
            <input type="text" id="name" name="name" required>
            </div>
            <div class="form-group">
            <label for="year">Year:</label>
            <input type="number" id="year" name="year" min="1900" max="9999" required>
            </div>
            <div class="form-group">
            <label for="licence_plate">License Plate:</label>
            <input type="text" id="licence_plate" name="licence_plate" required>
            </div>
            <div class="form-group">
            <label for="color">Color:</label>
            <input type="text" id="color" name="color" required>
            </div>
            <div class="form-group">
            <label for="type">Type:</label>
            <select id="type" name="type" required>
                <option value="Sedan">Sedan</option>
                <option value="SUV">SUV</option>
                <option value="Truck">Truck</option>
                <option value="Van">Van</option>
                <option value="Other">Other</option>
            </select>
            </div>
            <div class="form-group">
            <label for="last_mileage">Last Mileage Recorded:</label>
            <input type="number" id="last_mileage" name="last_mileage" min="0" required>
            </div>
            <div class="form-group">
            <label for="date_last_check">Date of Last Check:</label>
            <input type="date" id="date_last_check" name="date_last_check" required>
            </div>
            <div class="form-group">
            <label for="mileage_next_maintenance">Mileage of Next Maintenance:</label>
            <input type="number" id="mileage_next_maintenance" name="mileage_next_maintenance" min="0" required>
            </div>
            <div class="form-group">
            <label for="vehicle_code">Vehicle Code:</label>
            <input type="text" id="vehicle_code" name="vehicle_code" required>
            </div>
            <button type="submit">Submit</button>
        </form>

        <?php
        // Check if the form is submitted
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Retrieve the form data
            $name = $_POST["name"];
            $year = $_POST["year"];
            $licence_plate = $_POST["licence_plate"];
            $color = $_POST["color"];
            $type = $_POST["type"];
            $last_mileage = $_POST["last_mileage"];
            $date_last_check = $_POST["date_last_check"];
            $mileage_next_maintenance = $_POST["mileage_next_maintenance"];
            $vehicle_code = $_POST["vehicle_code"];

            // TODO: Insert the form data into the database
            // You can use database functions like mysqli_query() or PDO to insert the data

            // Redirect to a success page
            header("Location: success.php");
            exit;
        }
        ?>

            <?php
                        // Check if the form is submitted
                        if ($_SERVER["REQUEST_METHOD"] == "POST") {
                            // Retrieve the form data
                            $name = $_POST["name"];
                            $year = $_POST["year"];
                            $licence_plate = $_POST["licence_plate"];
                            $color = $_POST["color"];
                            $type = $_POST["type"];
                            $last_mileage = $_POST["last_mileage"];
                            $date_last_check = $_POST["date_last_check"];
                            $mileage_next_maintenance = $_POST["mileage_next_maintenance"];
                            $vehicle_code = $_POST["vehicle_code"];

                            // TODO: Insert the form data into the database
                            // You can use database functions like mysqli_query() or PDO to insert the data

                            // Redirect to a success page
                            header("Location: success.php");
                            exit;
                        }
                    ?>


        </form>
    </div>
</body>
</html>
