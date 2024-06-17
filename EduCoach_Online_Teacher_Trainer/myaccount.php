<?php require_once('./db/connection.php'); ?>
<?php session_start(); ?>


<?php 
	// checking if a user is logged in
	if (!isset($_SESSION['user_id'])) {
		header('Location: ./index.php');
	}
    else{
        
        $query = "SELECT * FROM users 
							  WHERE id = '{$_SESSION['user_id']}' 
							  LIMIT 1
							  ";

			    $result_set = mysqli_query($connection, $query);

				if (mysqli_num_rows($result_set) == 1) {

					// valid user found
					$user = mysqli_fetch_assoc($result_set);
					$userName = $user['name'];
					$userEmail = $user['email'];
                    $userJob = $user['job'];
                    $created =  $user['create_datetime'];
                    
                    $_SESSION['name'] = $user['name'];
				}
    }


    if (isset($_POST['delete'])) {
        
        $query = "DELETE FROM users WHERE `users`.`id` = '{$_SESSION['user_id']}'";

        $result_set = mysqli_query($connection, $query);

        // Destroy the session and redirect 
        session_destroy();
        header("Location: ./index.php?deleted=true");
    }

    
 ?>
 
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Educoach - My Account</title>

    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/header.css">
    <link rel="stylesheet" href="./css/footer.css">
    <link rel="stylesheet" href="./css/myaccount.css">

    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.2.0/fonts/remixicon.css" rel="stylesheet">
    
</head>
<body>

    <!--Header call-->
    <?php include './components/header.php' ?>

    <div class="body-container">

            <div class="main-container">
                <h2>PROFILE</h2>
                <div class="card">
                    <div class="card-body">
                        <i class="fa fa-pen fa-xs edit"></i>
                        <table>
                            <tbody>
                                <tr>
                                    <td>Name</td>
                                    <td>:</td>
                                    <td> <?php  echo $userName ;  ?></td>
                                </tr>
                                <tr>
                                    <td>Email</td>
                                    <td>:</td>
                                    <td><?php  echo $userEmail ;  ?></td>
                                </tr>
                                <tr>
                                    <td>Address</td>
                                    <td>:</td>
                                    <td>Colombo, Sri Lanka</td>
                                </tr>
                                <tr>
                                    <td>Job</td>
                                    <td>:</td>
                                    <td> <?php  echo $userJob ;  ?></td>
                                </tr>
                                <tr>
                                    <td>Account Created at</td>
                                    <td>:</td>
                                    <td><?php  echo $created ;  ?></td>
                                </tr>
                            </tbody>
                        </table>

                        <div class="btn-container">
                            <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                                    <button class="dlt-button" type="submit" name="delete" onclick="return confirm('Are you sure to delete this account?');">Delete Account &nbsp <i class="ri-delete-bin-2-fill"></i></button>
                            </form>

                            <a class="edit-button" href="./accountupdate.php" type="submit" name="edit">Update Details &nbsp <i class="ri-edit-box-fill"></i></a>

                            <form method="post" action="./logout.php">
                                <button class="logout-button" type="submit" name="logout" >Logout &nbsp <i class="ri-logout-circle-r-fill"></i></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

    </div>


    <!--Footer call-->
    <?php include './components/footer.php' ?>

</body>
</html>