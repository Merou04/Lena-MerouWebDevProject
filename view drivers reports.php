<?php
           
            $host = "localhost";
            $dbuser = "root";
            $dbpass = "";
            $dbname = "CarTrack";
            $conn = mysqli_connect($host, $dbuser, $dbpass, $dbname);

            
            if (!$conn) {
                die("Connection failed: " . mysqli_connect_error());
            }

           
            $sql = "SELECT * FROM reports";
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0) {
               
                echo "<h3>Recent Reports</h3>";
                echo "<table border='1'>";
                echo "<tr><th>Subject</th><th>Message</th></tr>";
                while($row = mysqli_fetch_assoc($result)) {
                    echo "<tr><td>" . $row["subject"] . "</td><td>" . $row["message"] . "</td></tr>";
                }
                echo "</table>";
            } else {
                echo "No reports found";
            }

            mysqli_close($conn);
        ?>
