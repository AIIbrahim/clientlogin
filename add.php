<?php

    include ('connection.php');
    include ('include/header.php');

    // store the result
   
    // verify if result is returned
   

       if( isset( $_POST["submit"] ) ) {
        
        $name = $_POST["clientName"];
        $email = $_POST["clientEmail"];
        $phone = $_POST["clientPhone"];
        $address = $_POST["clientAddress"];
        $note = $_POST["clientNote"];
        $company = $_POST["clientCompany"];

        $query = "INSERT INTO client(id, name, email, phone, address, note, company) VALUES (NULL, '$name', '$email', '$phone', 
        '$address', '$note', '$company' )";

       
        if (mysqli_query($conn, $query)) {
        echo 'New record in database';
        // refresh page with query string
        header( "Location: client.php?alert=success" );
        }else{
            echo "Error IN SAVING DATA";
            }

        }

?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
    
<h1>Add Client</h1>

<form action="<?php echo htmlspecialchars( $_SERVER['PHP_SELF'] ); ?>" method="post" class="row">
    <div class="form-group col-sm-6">
        <label for="client-name">Name *</label>
        <input type="text" class="form-control input-lg" id="client-name" name="clientName" value="">
    </div>
    <div class="form-group col-sm-6">
        <label for="client-email">Email *</label>
        <input type="text" class="form-control input-lg" id="client-email" name="clientEmail" value="">
    </div>
    <div class="form-group col-sm-6">
        <label for="client-phone">Phone</label>
        <input type="text" class="form-control input-lg" id="client-phone" name="clientPhone" value="">
    </div>
    <div class="form-group col-sm-6">
        <label for="client-address">Address</label>
        <input type="text" class="form-control input-lg" id="client-address" name="clientAddress" value="">
    </div>
    <div class="form-group col-sm-6">
        <label for="client-company">Company</label>
        <input type="text" class="form-control input-lg" id="client-company" name="clientCompany" value="">
    </div>
    <div class="form-group col-sm-6">
        <label for="client-notes">Notes</label>
        <textarea type="text" class="form-control input-lg" id="client-notes" name="clientNote"></textarea>
    </div>
    <div class="col-sm-12">
            <a href="client.php" type="button" class="btn btn-lg btn-default">Cancel</a>
            <button type="submit" class="btn btn-lg btn-success pull-right" name="submit">Add Client</button>
    </div>
</form>

        <?php 
        include ('include/footer.php');
        ?>
</body>
</html>