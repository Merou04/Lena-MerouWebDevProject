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
        max-height: 420px;
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
 $dbname = "cartrack";
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
                    <?php $query = "SELECT idmission,locationM,username,nameV,stateM from mission m,vehicle v,driver d
                    where m.iddriver=d.iddriver and m.idvehicule=v.idvehicule;";
                        if ($result=mysqli_query($conn,$query)){
                            while ($row=mysqli_fetch_row($result)){ ?>       
                            <tr>
                                <td><?php echo $row[0];?></td>
                                <td><?php echo $row[1];?></td>
                                <td><?php echo $row[2];?></td>
                                <td><?php echo $row[3];?></td>
                                <td><?php echo $row[4];?></td>
                            </tr>
                    <?php } mysqli_free_result($result) ;} ?>     
                </table>
            </div>
        </div>
    </body>
</html>

<?php
    mysqli_close($conn);
?>