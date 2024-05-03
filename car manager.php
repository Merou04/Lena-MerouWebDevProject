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
            background-color: #172b4d; 
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
            color: #000000; 
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
            background-color: #ffdb58; 
            color: black; 
        }
        button.add-vehicle {
            background-color: #4CAF50; 
            color: white; 
            margin-right: 20px;
        }
        button.make-available{
            background-color: #4CAF50; 
            color: white; 
            margin-right: 20px;
        }
        button.delete-vehicle, button.put-out-of-service {
            background-color: #ff4d4f; 
            color: white; 
        }
        .big-button {
            padding: 12px 24px;
            font-size: 18px;
        }
        th:nth-child(1) {
            background-color: #f2f2f2;
        }
        td:nth-child(2):contains("Out of Service") {
            color: red;
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
                    <th>Code</th> 
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
                    <td>TOY22B0001</td>
                </tr>
                <tr>
                    <td>Honda Accord</td>
                    <td>Out of Service</td>
                    <td class="btn-container">
                        <button class="make-available">Make Available</button>
                        <button class="put-out-of-service">Put Out of Service</button>
                        <button class="show-info">Show Info</button>
                    </td>
                    <td>HON22R0002</td>
                </tr>
                <tr>
                    <td>Ford Fusion</td>
                    <td>Available</td>
                    <td class="btn-container">
                        <button class="make-available">Make Available</button>
                        <button class="put-out-of-service">Put Out of Service</button>
                        <button class="show-info">Show Info</button>
                    </td>
                    <td>FOR22G0003</td>
                </tr>
                <tr>
                    <td>BMW 3 Series</td>
                    <td>Available</td>
                    <td class="btn-container">
                        <button class="make-available">Make Available</button>
                        <button class="put-out-of-service">Put Out of Service</button>
                        <button class="show-info">Show Info</button>
                    </td>
                    <td>BMW22B0004</td>
                </tr>
                <tr>
                    <td>Chevrolet Cruze</td>
                    <td>Out of Service</td>
                    <td class="btn-container">
                        <button class="make-available">Make Available</button>
                        <button class="put-out-of-service">Put Out of Service</button>
                        <button class="show-info">Show Info</button>
                    </td>
                    <td>CHE22R0005</td>
                </tr>
                <tr>
                    <td>Mercedes-Benz C-Class</td>
                    <td>Available</td>
                    <td class="btn-container">
                        <button class="make-available">Make Available</button>
                        <button class="put-out-of-service">Put Out of Service</button>
                        <button class="show-info">Show Info</button>
                    </td>
                    <td>MER22G0006</td>
                </tr>
                <tr>
                    <td>Audi A4</td>
                    <td>Available</td>
                    <td class="btn-container">
                        <button class="make-available">Make Available</button>
                        <button class="put-out-of-service">Put Out of Service</button>
                        <button class="show-info">Show Info</button>
                    </td>
                    <td>AUD22B0007</td>
                </tr>
                <tr>
                    <td>Nissan Altima</td>
                    <td>Out of Service</td>
                    <td class="btn-container">
                        <button class="make-available">Make Available</button>
                        <button class="put-out-of-service">Put Out of Service</button>
                        <button class="show-info">Show Info</button>
                    </td>
                    <td>NIS22R0008</td>
                </tr>
                <tr>
                    <td>Hyundai Sonata</td>
                    <td>Available</td>
                    <td class="btn-container">
                        <button class="make-available">Make Available</button>
                        <button class="put-out-of-service">Put Out of Service</button>
                        <button class="show-info">Show Info</button>
                    </td>
                    <td>HYU22G0009</td>
                </tr>
                <tr>
                    <td>
