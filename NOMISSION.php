<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>No Current Mission</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background-color: #172b4d; /* Navy blue background */
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            text-align: center;
        }

        h1 {
            color: #fff; /* White heading */
            margin-bottom: 10px;
        }

        p {
            color: #ccc; /* Light gray text */
            margin-bottom: 0;
        }

        .return-button {
            background-color: #ffdb58; /* Yellow */
            color: #fff; /* White text */
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin-top: 20px;
        }

        .return-button:hover {
            background-color: #ccab42; /* Darker yellow on hover */
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>No Current Mission</h1>
        <p>There are no missions available at the moment.</p>
        <button class="return-button" onclick="openInterface()">Return</button>
    </div>

    <script>
