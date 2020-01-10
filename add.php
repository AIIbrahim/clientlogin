<?php

    include ('connection.php');
    include ('include/header.php');

    // store the result
   
    // verify if result is returned
   

       if( isset( $_POST["submit"] ) ) {
        
        $newusername = $_POST["username"];
        $newpass = $_POST["pass"];
        $newemail = $_POST["email"];
        $hash = password_hash($newpass, PASSWORD_DEFAULT);
        echo "<br> $hash";

        $query = "INSERT INTO users(id, username, password, email) VALUES (NULL, '$newusername', '$hash', '$newemail' )";

       
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

	<form  action="" method="post">
		<input type="text" name="username" placeholder="username">
		<input type="password" name="pass" placeholder="password">
        <input type="text" name="email" placeholder="email">
		<input type="submit" name="submit">
	</form>
        <?php 
        include ('include/footer.php');
        ?>
</body>
</html>