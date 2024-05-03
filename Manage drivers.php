<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Driver Management</title>
    <style>
        body {
            background: #f5f5f5; 
            font-family: 'Arial', sans-serif;
            padding: 20px;
            color: #333; 
        }
        .title {
            text-align: center;
            font-size: 24px;
            color: #172b4d; 
            margin-bottom: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            background-color: white; 
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); 
            margin-bottom: 20px; 
        }
        th, td {
            border: 1px solid #dee2e6; 
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #172b4d; 
            color: white; 
        }
        button {
            cursor: pointer;
            padding: 5px 10px;
            background-color: #ffdb58; 
            color: #333; 
            border: none;
            border-radius: 5px;
            margin-right: 4px;
        }
        button:hover {
            background-color: #ccab42; 
        }
        .button-container {
            text-align: center;
        }
        .button {
            text-align: center;
            background-color:#ffdb58; 
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            width: 100%;
        }
    </style>
</head>
<body>
    <h2 class="title">Driver Management</h2>
    <table id="driversTable">
        <thead>
            <tr>
                <th>Driver's Name</th>
                <th>Date of Birth</th>
                <th>License Type</th>
                <th>Driver's Description</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>John Doe</td>
                <td>1980-04-25</td>
                <td>Class A</td>
                <td>Experienced truck driver with over 10 years on the road.</td>
                <td>
                    <button>Delete</button>
                    <button>Update</button>
                </td>
            </tr>
            <tr>
                <td>Jane Smith</td>
                <td>1992-07-16</td>
                <td>Class B</td>
                <td>City bus driver with strong record of punctuality and safety.</td>
                <td>
                    <button>Delete</button>
                    <button>Update</button>
                </td>
            </tr>
            <tr>
                <td>Sam Lee</td>
                <td>1985-03-30</td>
                <td>Class C</td>
                <td>Long-haul specialist, skilled in navigation and efficient route planning.</td>
                <td>
                    <button>Delete</button>
                    <button>Update</button>
                </td>
            </tr>
            <tr>
                <td>Alex Rivera</td>
                <td>1975-11-11</td>
                <td>Class D</td>
                <td>Offers over 15 years of driving experience across multiple vehicle types.</td>
                <td>
                    <button>Delete</button>
                    <button>Update</button>
                </td>
            </tr>
        </tbody>
    </table>
    <div class="button-container">
        <a href="CreateAcc.php" class="button">Add New Driver</a> 
    </div>
</body>
</html>

