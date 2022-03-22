<?php
            //servername
            $servername = "localhost";
            //username
            $username = "root";
            //empty password
            $password = "";
            //geek is the database name
            $dbname = "laravel";
 
            // Create connection by passing these connection parameters
            $conn = new mysqli($servername, $username, $password, $dbname);
            //sql query
            $sql = "SELECT  SUM(total) from scores";
            $result = $conn->query($sql);
            //display data on web page
            while($row = mysqli_fetch_array($result)){
                echo "<b>TOTAL ALL : </b>". "<b>" . $row['SUM(total)'] . "</b>";
                echo "<br>";
            }
?>