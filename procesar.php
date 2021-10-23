<?php
   $user = $_POST["user"];
   $pw = $_POST["pw"];

   echo "user: ".$user." --- pw: ".md5($pw); 


   ///conexion a MYSQL
   $conn = mysqli_connect('localhost', 'root', '', 'colegiobd');
   // Check connection
   if (!$conn) {
       die("Connection failed: " . mysqli_connect_error());
    }
   echo "Connected successfully <br><hr>";
   
   $sql = "SELECT user, pw FROM usuario";
   $result = $conn->query($sql);
   
   if ($result->num_rows > 0) {
     // output data of each row
     while($row = $result->fetch_assoc()) {
       echo "user: " . $row["user"]. " - pw: " . $row["pw"]."<br>";
     }
   } else {
     echo "0 results";
   }

   mysqli_close($conn);

?>