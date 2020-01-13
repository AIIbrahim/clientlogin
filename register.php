<?php

    include ('connection.php');
    include ('include/header.php');

    // store the result
   
    // verify if result is returned
   

       if( isset( $_POST["submit"] ) ) {
        
        $name = $_POST["username"];
        $password = $_POST["password"];
        $email = $_POST["email"];
        $hash = password_hash($password, PASSWORD_DEFAULT);

        $query = "INSERT INTO users(id, username, password, email) VALUES (NULL, '$name', '$hash', '$email' )";

       
        if (mysqli_query($conn, $query)) {
        echo 'New record in database';
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
    
<h1>Register Client</h1>

<form action="<?php echo htmlspecialchars( $_SERVER['PHP_SELF'] ); ?>" method="post" class="row">
    <div class="form-group col-sm-12">
        <label for="client-name">Username</label>
        <input type="text" class="form-control input-lg" id="client-name" name="username" value="">
    </div>
    <div class="form-group col-sm-12">
        <label for="client-email">Password</label>
        <input type="password" class="form-control input-lg" id="client-email" name="password" value="">
    </div>
    <div class="form-group col-sm-12">
        <label for="client-email">Email</label>
        <input type="text" class="form-control input-lg" id="client-email" name="email" value="">
    </div>  
    <div class="col-sm-12">
            <button type="submit" class="btn btn-lg btn-success pull-right" name="submit">Submit</button>
    </div>
</form>

        <?php 
        include ('include/footer.php');
        ?>
</body>
</html>