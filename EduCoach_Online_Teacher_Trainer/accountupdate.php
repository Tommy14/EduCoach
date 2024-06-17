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
                    
				}
    }


    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Retrieve the updated values from the form
        $name = $_POST['name'];
        $email = $_POST['email'];
        $job = $_POST['job'];
    
        // Perform the update query
        $query = "UPDATE users SET name = '{$name}', email = '{$email}',  job = '{$job}' WHERE id = '{$_SESSION['user_id']}'";
    
        // Execute the query and check if it was successful
        if (mysqli_query($connection, $query)) {
            header("Location: ./myaccount.php?update=true");
        } else {
            header("Location: ./myaccount.php?update=false");
        }
    
        exit();
    }

    
 ?>
 
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Educoach - Account Update</title>

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
                <h2>PROFILE UPDATE</h2>
                <div class="card">
                    <div class="card-body update-body">
                        <form method="post" action="./accountupdate.php">
                            <br>
                            <label for="name">Name:</label><br>
                            <input type="text" name="name" value="<?php echo $userName; ?>"><br><br>

                            <label for="email">Email:</label><br>
                            <input type="email" name="email" value="<?php echo $userEmail; ?>"><br><br>

                            <label for="job">Job:</label><br>
                            <input type="text" name="job" value="<?php echo $userJob; ?>"><br><br>

                            <input class="update-btn" type="submit" name="submit" value="Update">
                        </form>
                        
                    </div>
                </div>
            </div>

    </div>


    <!--Footer call-->
    <?php include './components/footer.php' ?>

</body>
</html>