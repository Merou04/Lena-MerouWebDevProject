<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Driver Reports Management</title>
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
        <h2>Driver Reports Management</h2>
        <table>
            <thead>
                <tr>
                    <th>Driver Name</th>
                    <th>Mission Number</th>
                    <th>Report</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Samir Fattal </td>
                    <td>123</td>
                    <td>Samir encountered a vehicle breakdown halfway through the mission.</td>
                    <td class="button-container">
                        <button class="button accept">Accept</button>
                        <button class="button decline">Decline</button>
                    </td>
                </tr>
                <tr>
                    <td>Abdou Tair</td>
                    <td>456</td>
                    <td>Abdou faced adverse weather conditions which delayed the delivery.</td>
                    <td class="button-container">
                        <button class="button accept">Accept</button>
                        <button class="button decline">Decline</button>
                    </td>
                </tr>
                <tr>
                    <td>Dwane Zoubir</td>
                    <td>789</td>
                    <td>Dwane encountered road closures, resulting in a significant delay in completing the mission.</td>
                    <td class="button-container">
                        <button class="button accept">Accept</button>
                        <button class="button decline">Decline</button>
                    </td>
                </tr>
                <tr>
                    <td>Adem Nemrouchi</td>
                    <td>246</td>
                    <td>Adem's vehicle had a flat tire, causing a delay in reaching the destination.</td>
                    <td class="button-container">
                        <button class="button accept">Accept</button>
                        <button class="button decline">Decline</button>
                    </td>
                </tr>
                <tr>
                    <td>Fatima Lekhal</td>
                    <td>135</td>
                    <td>Fatima's GPS malfunctioned, leading to confusion and a longer route.</td>
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
