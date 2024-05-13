<?php
            // Exemple de code PHP pour récupérer des informations depuis la base de données
            $host = "localhost";
            $dbuser = "root";
            $dbpass = "";
            $dbname = "CarTrack";
            $conn = mysqli_connect($host, $dbuser, $dbpass, $dbname);

            // Vérifier la connexion
            if (!$conn) {
                die("Connection failed: " . mysqli_connect_error());
            }

            // Exemple de requête SQL pour récupérer des informations
            $sql = "SELECT * FROM reports";
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0) {
                // Afficher les données dans un tableau
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
