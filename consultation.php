<style>
    body{
        text-align: center;
        background-color:#172b4d;
    }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #AAB7B8;
        }
        .scrollable {
        max-height: 200px;
        overflow-y: auto;
    }
    .block {
    max-width: 1000px;
    margin: 50px auto;
    padding: 20px;
    background-color: #fff;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }
</style>

<?php
session_start();

 $host = "localhost";
 $dbuser = "root";
 $dbpass = "";
 $dbname = "CarTrack";
 $conn = mysqli_connect($host, $dbuser, $dbpass, $dbname);
 // display toutes les missions
 ?>

<html>
    <head>
        <title>Missions Table</title>
    </head>
    <body>
        <div class="block" >
            <h2>Missions</h2>
            <div class="scrollable">
                <table width=100%>                
                    <tr>
                        <th>Mission's number</th>
                        <th>Location</th>
                        <th>Driver</th>
                        <th>Vehicule</th>
                        <th>State</th>
                    </tr>        
                    <tr>
                        <td>00001</td>
                        <td>Algiers</td>
                        <td>Mestapha Dadzedine</td>
                        <td>Ford Mustang</td>
                        <td>in process</td>
                    </tr>
                    <tr>
                        <td>00002</td>
                        <td>Cheraga</td>
                        <td>Fella Boufelfel</td>
                        <td>Audi A4</td>
                        <td>Wainting...</td>
                    </tr>
                    <tr>
                    <td>000003</td>
                    <td>Draria</td>
                    <td>Connor Macgregor</td>
                    <td>Jeep Wrangler</td>
                    <td>Done</td>
                    </tr>            
                </table>
            </div>
        </div>
    </body>
</html>

<?php
    mysqli_close($conn);
?>