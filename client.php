<?php

include ('connection.php');
include ('include/header.php');
$query = "SELECT * FROM users";

// store the result
$result = mysqli_query( $conn, $query );

// verify if result is returned
if( mysqli_num_rows($result) > 0 ) {
   
   // store basic user data in variables
   echo "<table class='table table-striped table-bordered' >
   <tr>
   <th>Name</th>
   <th>Password</th>
   <th>Email</th>
   <tr>";

 
   while( $row = mysqli_fetch_assoc($result) ) {
       $user       = $row['username']; 
       $email      = $row['email'];
       $hashedPass = $row['password'];

     //<td>" . $row['password'] . "</td><td>"
       echo "<tr>";
            
        echo "<td>" . $row['username'] . "</td> <td>" . $row['email'] . "</td>";
        echo "</tr>";        
   }           
        echo "</table>"; 

}else{
    echo " no information in database";
}
    include ('include/footer.php');

?>
