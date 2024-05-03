<style>
    body{
        text-align: center;
        background-color:#F7DC6F;
    }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
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
                        <th>Localisation</th>
                        <th>Driver</th>
                        <th>Vehicule</th>
                        <th>State</th>
                    </tr>        
                    <tr>
                        <td>001</td>
                        <td>Algiers</td>
                        <td>John Doe</td>
                        <td>Toyota Camry</td>
                        <td>In process</td>
                    </tr>
                    <tr>
                        <td>002</td>
                        <td>Al Achour</td>
                        <td>Jane Doe</td>
                        <td>Ford Focus</td>
                        <td>Waiting...</td>
                    </tr>
                    <tr>
                    <td>003</td>
                    <td>Al Achour</td>
                    <td>Jane Doe</td>
                    <td>Ford Focus</td>
                    <td>In process</td>
                    </tr>            
                </table>
            </div>
        </div>
    </body>
</html>
