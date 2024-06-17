<?php session_start(); ?>
<?php require_once('./db/connection.php'); ?>


<?php 

	// check for form submission
	if  ($_SERVER["REQUEST_METHOD"] == "POST") {

			// save username, password  into variables
			$email 	= mysqli_real_escape_string($connection, $_POST['email']);
			$password 	= mysqli_real_escape_string($connection, $_POST['password']);

            $query = "SELECT * FROM users 
							  WHERE email = '{$email}' 
							  AND
							  password = '{$password}' 
							  LIMIT 1
							  ";

			    $result_set = mysqli_query($connection, $query);

				if (mysqli_num_rows($result_set) == 1) {
					// valid user found
					$user = mysqli_fetch_assoc($result_set);
                    $_SESSION['user_id'] = $user['id'];
					$_SESSION['name'] = $user['name'];
					$_SESSION['role'] = "user";

					// redirect to users.php
					header('Location: ./index.php?login=true');
                    exit();
				} else {
					
					// user name and password invalid
                    header('Location: ./join.php?login=false');
				}
		
	}
?>

<?php mysqli_close($conn); ?>