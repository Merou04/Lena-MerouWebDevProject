<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vehicle Information</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #172b4d; 
        }
        .container {
            max-width: 800px;
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
            margin-right: 10px;
        }
        .edit-mode input {
            width: 100%;
            padding: 8px;
            box-sizing: border-box;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Vehicle Information</h1>
        <table id="vehicle-info-table">
            <tr>
                <th>Name of Vehicle</th>
                <td>Toyota Camry</td>
            </tr>
            <tr>
                <th>Year</th>
                <td>2022</td>
            </tr>
            <tr>
                <th>License Plate</th>
                <td>ABC123</td>
            </tr>
            <tr>
                <th>Color</th>
                <td>Red</td>
            </tr>
            <tr>
                <th>Type</th>
                <td>Sedan</td>
            </tr>
            <tr>
                <th>Last Mileage Recorded</th>
                <td>5000 miles</td>
            </tr>
            <tr>
                <th>Date of Last Check</th>
                <td>2024-05-01</td>
            </tr>
            <tr>
                <th>Mileage of Next Maintenance</th>
                <td>10000 miles</td>
            </tr>
        </table>
        <div class="btn-container">
            <button onclick="toggleEditMode()">Edit</button>
            <button onclick="saveChanges()">Save</button>
        </div>
    </div>

</body>
</html>
