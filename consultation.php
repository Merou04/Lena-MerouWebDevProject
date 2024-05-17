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
                <?php for($i =0;$i<5;$i++){ ?>       
                    
                    <tr>
                        <td><?php echo "hello";?></td>
                        <td><?php echo "test";?></td>
                        <td><?php echo "test";?></td>
                        <td><?php echo "test";?></td>
                        <td><?php echo "test";?></td>
                    </tr>
                    <?php } ?>     
                </table>
            </div>
        </div>
    </body>
</html>

<?php
    mysqli_close($conn);
?>