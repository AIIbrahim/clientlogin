<?php
    session_start();
    include ('connection.php');
    include ('include/header.php');

     $query = "SELECT username, email, password FROM users";
    
    // store the result
    $result = mysqli_query( $conn, $query );
    
    // verify if result is returned
    if( mysqli_num_rows($result) > 0 ) {
        
        // store basic user data in variables
        while( $row = mysqli_fetch_assoc($result) ) {
            $user       = $row['username']; 
            $email      = $row['email'];
            $hashedPass = $row['password'];
        }

       if( isset( $_POST["submit"] ) ) {
        // call function\&& password_verify($newpass, $hashpass)
        $enteredname = $_POST["username"];
        echo "<br>$enteredname";
         $enteredpass = $_POST["pass"];
        echo "<br>$enteredpass";
        
        if ( password_verify( $enteredpass, $hashedPass) ) {
                   echo "you're logged in" .$enteredname;
                   echo " <br> your password is " .$enteredpass . " with email ".$email;
                    
            // redirect user to clients page
                header( "Location: client.php" );
            
        }else {
        	echo "<br> incorrect details";
        	# code...
        }        
        }
    }

?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

	<form  action="" method="post">
        <small> NAME</small><input type="text" class="form-control"  name="username" placeholder="username">
        <small> PASSWORD</small><input type="password" class="form-control" name="pass" placeholder="password">
	    <input type="submit" name="submit">
	</form>
    <p> NEW USER? REGISTER <a href="register.php"> HERE</a></p>

    <?php 
    include ('include/footer.php');
    ?>
</body>
</html>