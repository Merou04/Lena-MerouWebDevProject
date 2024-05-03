<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vehicle Manager Reports</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background: linear-gradient(45deg, #172b4d, #2c3e50);
            color: #fff;
        }

        .report-container {
            background-color: rgba(255, 255, 255, 0.9);
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.2);
            text-align: center;
            width: 90%;
            max-width: 960px;
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            text-align: left;
            padding: 12px;
            border-bottom: 1px solid #ddd;
            color: #333;
        }

        th {
            background-color: #172b4d;
            color: white;
        }

        .button-container {
            display: flex;
            justify-content: center;
        }

        .button {
            padding: 6px 12px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 14px;
            margin-right: 5px;
        }

        .accept {
            background-color: #4caf50;
            color: #fff;
        }

        .decline {
            background-color: #f44336;
            color: #fff;
        }

        .button:hover {
            opacity: 0.8;
        }

        h2 {
            color: #333;
        }
    </style>
</head>
<body>
    <div class="report-container">
        <h2>Vehicle Manager Reports</h2>
        <table>
            <thead>
                <tr>
                    <th>Car Name</th>
                    <th>Car Number</th>
                    <th>Report</th>
                    <th>Additional Fees</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Toyota Corolla/td>
                    <td>123</td>
                    <td>Replaced brake pads and rotors due to wear and tear.</td>
                    <td>$200</td>
                    <td class="button-container">
                        <button class="button accept">Accept</button>
                        <button class="button decline">Decline</button>
                    </td>
                </tr>
                <tr>
                    <td>Mercedes Ml</td>
                    <td>456</td>
                    <td>Performed oil change and filter replacement as part of routine maintenance.</td>
                    <td>$50</td>
                    <td class="button-container">
                        <button class="button accept">Accept</button>
                        <button class="button decline">Decline</button>
                    </td>
                </tr>
                <tr>
                    <td>Ford K</td>
                    <td>789</td>
                    <td>Replaced worn-out tires with new ones for improved safety and performance.</td>
                    <td>$300</td>
                    <td class="button-container">
                        <button class="button accept">Accept</button>
                        <button class="button decline">Decline</button>
                    </td>
                </tr>
                <tr>
                    <td>Nissan Sunny</td>
                    <td>246</td>
                    <td>Performed engine tune-up to address performance issues and optimize fuel efficiency.</td>
                    <td>$150</td>
                    <td class="button-container">
                        <button class="button accept">Accept</button>
                        <button class="button decline">Decline</button>
                    </td>
                </tr>
                <tr>
                    <td>BMW 3 Series</td>
                    <td>135</td>
                    <td>Replaced worn-out suspension components to improve ride quality and handling.</td>
                    <td>$500</td>
                    <td class="button-container">
                        <button class="button accept">Accept</button>
                        <button class="button decline">Decline</button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</body>
</html>
