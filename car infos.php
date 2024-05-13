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
        <form method="post" id="vehicle-info-form">
            <table id="vehicle-info-table">
                <tr>
                    <th>Name of Vehicle</th>
                    <td><span class="vehicle-name">Toyota Camry</span><input type="text" class="edit-mode" name="name" value="Toyota Camry" style="display: none;"></td>
                </tr>
                <tr>
                    <th>Year</th>
                    <td><span class="vehicle-year">2022</span><input type="text" class="edit-mode" name="year" value="2022" style="display: none;"></td>
                </tr>
                <tr>
                    <th>License Plate</th>
                    <td><span class="vehicle-license">ABC123</span><input type="text" class="edit-mode" name="license" value="ABC123" style="display: none;"></td>
                </tr>
                <!-- Add other vehicle information here -->
            </table>
            <div class="btn-container">
                <button type="button" onclick="toggleEditMode()">Edit</button>
                <button type="submit" name="submit">Save</button>
            </div>
        </form>
    </div>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
        // Get form data
        $name = $_POST['name'];
        $year = $_POST['year'];
        $license = $_POST['license'];
        // Update displayed information
        echo "<script>";
        echo "document.querySelector('.vehicle-name').innerText = '$name';";
        echo "document.querySelector('.vehicle-year').innerText = '$year';";
        echo "document.querySelector('.vehicle-license').innerText = '$license';";
        echo "</script>";
    }
    ?>

    <script>
        function toggleEditMode() {
            var editInputs = document.querySelectorAll('.edit-mode');
            for (var i = 0; i < editInputs.length; i++) {
                if (editInputs[i].style.display === 'none') {
                    editInputs[i].style.display = 'inline-block';
                    editInputs[i].previousElementSibling.style.display = 'none';
                } else {
                    editInputs[i].style.display = 'none';
                    editInputs[i].previousElementSibling.style.display = 'inline-block';
                }
            }
        }
    </script>

</body>
</html>
