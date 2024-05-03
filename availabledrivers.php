<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Available Drivers</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background: linear-gradient(45deg, #172b4d, #2c3e50);
            color: #fff;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        table {
            width: 80%;
            border-collapse: collapse;
            background-color: #fff;
            color: #172b4d;
        }

        th, td {
            border: 1px solid #ccc;
            padding: 12px;
            text-align: left;
        }

        th {
            background-color: #172b4d;
            color: #fff;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        .button-container {
            margin-top: 20px;
        }

        .choose-button {
            background-color: #ffdb58;
            color: #fff;
            border: none;
            padding: 15px 30px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 18px;
        }

        .choose-button:hover {
            background-color: #ccab42;
        }
    </style>
</head>
<body>
    <table>
        <thead>
            <tr>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Availability</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>karim</td>
                <td>Douaa</td>
                <td style="background-color: #2ecc71;">Available</td>
            </tr>
            <tr>
                <td>Jebali</td>
                <td>Sliman</td>
                <td style="background-color: #e74c3c;">On Leave</td>
            </tr>
            <tr>
                <td>Samia</td>
                <td>Lylia</td>
                <td style="background-color: #f39c12;">On Mission</td>
            </tr>
            <!-- Repeat more rows as needed -->
        </tbody>
    </table>

    <div class="button-container">
        <button class="choose-button">Choose Driver</button>
    </div>
</body>
</html>
