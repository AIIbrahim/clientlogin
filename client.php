<?php

include ('connection.php');

include ('include/header.php');
$query = "SELECT * FROM client";

// store the result
$result = mysqli_query( $conn, $query );

// check for query string
if( isset( $_GET['alert'] ) ) {
    
    // new client added
    if( $_GET['alert'] == 'success' ) {
        $alertMessage = "<div class='alert alert-success'>New client added! <a class='close' data-dismiss='alert'>&times;</a></div>";
       
    // client updated
    } elseif( $_GET['alert'] == 'updatesuccess' ) {
        $alertMessage = "<div class='alert alert-success'>Client updated! <a class='close' data-dismiss='alert'>&times;</a></div>";
    
    // client deleted
    } elseif( $_GET['alert'] == 'deleted' ) {
        $alertMessage = "<div class='alert alert-success'>Client deleted! <a class='close' data-dismiss='alert'>&times;</a></div>";
    }
      
}

// verify if result is returned
if( mysqli_num_rows($result) > 0 ) {
   
   // store basic user data in variables
   
echo 
$alertMessage.'
<table class="table table-striped table-bordered">
<tr>
    <th>Name</th>
    <th>Email</th>
    <th>Phone</th>
    <th>Address</th>
    <th>Company</th>
    <th>Notes</th>
    <th>Edit</th>
</tr>';

 
   while( $row = mysqli_fetch_assoc($result) ) {
       $user       = $row['name']; 
       $email      = $row['email'];
       $phone      = $row['phone'];
       $address    = $row['address']; 
       $company    = $row['company'];
       $note       = $row['note'];
     
       echo "<tr>";
            
        echo "<td>" . $row['name'] . "</td><td>" . $row['email'] . "</td><td>"
         . $row['phone'] . "</td> <td>" . $row['address'] . "</td><td>" . $row['company'] . "</td><td>" . $row['note'] . "</td>";
        
          
         echo '<td><a href="edit.php?id=' . $row['id'] . '" type="button" class="btn btn-primary btn-sm">
         <span class="glyphicon glyphicon-edit"></span>
         </a></td> </tr>';
        
   }
   
   
  
        echo ' <tr> <td colspan="7"><div class="text-center"><a href="add.php" type="button" class="btn btn-sm btn-success"><span class="glyphicon glyphicon-plus"></span> Add Client</a></div></td>
</tr>  </table>'; 
 
}else{
    echo " no information in database";
} 
    include ('include/footer.php');

?>
