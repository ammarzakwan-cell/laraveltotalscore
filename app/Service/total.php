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
                echo "<b>" . "TOTAL ALL : " . $row['SUM(total)'] . "</b>";
                echo 
                "<br>";
            }

            $sql = "SELECT  SUM(total) from scores where name like 'g%'";
            $result = $conn->query($sql);
            //display data on web page
            while($row = mysqli_fetch_array($result)){
                echo "<b>" . "TOTAL G : " . $row['SUM(total)'] . "</b>";
                echo "<br>";
            }
?>