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
            background-color: #f2f2f2;
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
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
            border-radius: 4px;
            font-size: 16px;
        }
        button:hover {
            background-color: #45a049;
        }
        .big-button {
            padding: 12px 24px;
            font-size: 18px;
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
                        <button>Make Available</button>
                        <button>Put Out of Service</button>
                        <button>Show Info</button>
                    </td>
                </tr>
                <tr>
                    <td>Honda Accord</td>
                    <td>Out of Service</td>
                    <td class="btn-container">
                        <button>Make Available</button>
                        <button>Put Out of Service</button>
                        <button>Show Info</button>
                    </td>
                </tr>
                <tr>
                    <td>Ford Fusion</td>
                    <td>Available</td>
                    <td class="btn-container">
                        <button>Make Available</button>
                        <button>Put Out of Service</button>
                        <button>Show Info</button>
                    </td>
                </tr>
                <!-- Add more rows for additional vehicles -->
                <tr>
                    <td>BMW 3 Series</td>
                    <td>Available</td>
                    <td class="btn-container">
                        <button>Make Available</button>
                        <button>Put Out of Service</button>
                        <button>Show Info</button>
                    </td>
                </tr>
                <tr>
                    <td>Chevrolet Cruze</td>
                    <td>Out of Service</td>
                    <td class="btn-container">
                        <button>Make Available</button>
                        <button>Put Out of Service</button>
                        <button>Show Info</button>
                    </td>
                </tr>
                <tr>
                    <td>Mercedes-Benz C-Class</td>
                    <td>Available</td>
                    <td class="btn-container">
                        <button>Make Available</button>
                        <button>Put Out of Service</button>
                        <button>Show Info</button>
                    </td>
                </tr>
                <tr>
                    <td>Audi A4</td>
                    <td>Available</td>
                    <td class="btn-container">
                        <button>Make Available</button>
                        <button>Put Out of Service</button>
                        <button>Show Info</button>
                    </td>
                </tr>
                <tr>
                    <td>Nissan Altima</td>
                    <td>Out of Service</td>
                    <td class="btn-container">
                        <button>Make Available</button>
                        <button>Put Out of Service</button>
                        <button>Show Info</button>
                    </td>
                </tr>
                <tr>
                    <td>Hyundai Sonata</td>
                    <td>Available</td>
                    <td class="btn-container">
                        <button>Make Available</button>
                        <button>Put Out of Service</button>
                        <button>Show Info</button>
                    </td>
                </tr>
                <tr>
                    <td>Subaru Legacy</td>
                    <td>Available</td>
                    <td class="btn-container">
                        <button>Make Available</button>
                        <button>Put Out of Service</button>
                        <button>Show Info</button>
                    </td>
                </tr>
                <!-- Add more rows for existing vehicles -->
            </tbody>
        </table>
        <div class="btn-container">
            <button class="big-button" style="margin-right: 20px;">Add Vehicle</button>
            <button class="big-button">Delete Vehicle</button>
        </div>
    </div>
</body>
</html>
