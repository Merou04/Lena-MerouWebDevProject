<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Car Manager</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #172b4d; /* Changed background color */
        }
        .container {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            text-align: center;
            margin-bottom: 20px;
            color: #ffffff; /* Title text color changed to white */
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #dddddd;
            padding: 12px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        tr:hover {
            background-color: #e6e6e6;
        }
        .btn-container {
            text-align: center;
            margin-top: 20px;
        }
        button {
            padding: 8px 16px;
            border: none;
            cursor: pointer;
            border-radius: 4px;
            font-size: 16px;
        }
        button.show-info {
            background-color: #ffdb58; /* Show Info button color changed to yellow */
            color: black; /* Text color changed */
        }
        button.add-vehicle {
            background-color: #4CAF50; /* Add Vehicle button color */
            color: white; /* Text color changed */
            margin-right: 20px;
        }
        button.delete-vehicle, button.put-out-of-service {
            background-color: #ff4d4f; /* Delete Vehicle and Put Out of Service button color changed to red */
            color: white; /* Text color changed */
        }
        .big-button {
            padding: 12px 24px;
            font-size: 18px;
        }
        th:nth-child(1) {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Car Manager</h1>
        <table>
            <thead>
                <tr>
                    <th>Vehicle</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Toyota Camry</td>
                    <td>Available</td>
                    <td class="btn-container">
                        <button class="make-available">Make Available</button>
                        <button class="put-out-of-service">Put Out of Service</button>
                        <button class="show-info">Show Info</button>
                    </td>
                </tr>
                <!-- Add more rows for additional vehicles -->
            </tbody>
        </table>
        <div class="btn-container">
            <button class="big-button add-vehicle">Add Vehicle</button>
            <button class="big-button delete-vehicle">Delete Vehicle</button>
        </div>
    </div>
</body>
</html>
