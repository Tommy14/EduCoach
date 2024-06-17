<?php require_once('./db/connection.php'); ?>
<?php session_start(); ?>

<?php 
	// checking if a user is logged in
	if (isset($_SESSION['user_id'])) {
		header('Location: ./index.php');
	}
 ?>
 
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Educoach - Join</title>

    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/header.css">
    <link rel="stylesheet" href="./css/footer.css">
    <link rel="stylesheet" href="./css/join.css">

    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.2.0/fonts/remixicon.css" rel="stylesheet">

    <script src="./js/join.js" ></script>
    
</head>
<body>

    <!--Header call-->
    <?php include './components/header.php' ?>

    <div>

        <div class="join-container">

            <div class="join-form-container">
                <form id="email-form" action="signup.php" method="post" onsubmit="return validateForm()">
                    <div class="container">
                        <h1>Sign Up</h1>
                        <p>Please fill in this form to create an account.</p>
                        <hr>

                        <label for="name"><b>Name</b></label> <br/>
                        <input type="text" id="name" placeholder="Enter Name" name="name" required>
                        <br/>
                        <label for="email"><b>Email</b></label> <br/>
                        <input type="text" id="email" placeholder="Enter Email" name="email" required>
                        <br/>
                        <label for="job"><b>Job</b></label> <br/>
                        <input type="text" id="job" placeholder="Enter Job" name="job" required>
                        <br/>
                        <label for="psw"><b>Password</b></label> <br/>
                        <input type="password" id="password" placeholder="Enter Password" name="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Should contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>
                        <br/>
                        <label for="psw-repeat"><b>Repeat Password</b></label> <br/>
                        <input type="password" id="psw-repeat" placeholder="Repeat Password" name="password-repeat" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Should contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" oninput="checkPasswordMatch()" required>
                        <span id="password-error" style="color: red;"></span>
                        <br/>


                        <p>By creating an account you agree to our <a href="#" style="color:dodgerblue">Terms & Privacy</a>.</p>

                        <div class="clearfix">
                            <button type="submit" class="signupbtn">Sign Up</button>
                        </div>
                    </div>
                </form>

                <p id="validation-message"></p>

                <?php 
                    if (isset($_GET['account'])) {
                        $accountStatus = $_GET['account'];
                        if( $accountStatus === 'true'){
                                echo "<p class='success-msg'>✓ You'r account was created ! Please Login</p>";
                         }
                    }
                ?>
            </div>


            <div class="join-form-container border-line-left-black">
                <form  action="login.php" method="post">
                        <div class="container">
                            <h1>Sign In</h1>
                            <p>Please fill in this form to login.</p>
                            <hr>

                            <label for="email"><b>Email</b></label> <br/>
                            <input type="text" placeholder="Enter Email" name="email" required>
                            <br/>
                            <label for="psw"><b>Password</b></label><br/>
                            <input type="password" placeholder="Enter Password" name="password" required>
                            <br/>



                            <br/>
                            <div class="clearfix">
                                <button type="submit" class="signupbtn">Sign In</button>
                            </div>
                        </div>
                    </form>

                    <?php 
                    if (isset($_GET['login'])) {
                        $login = $_GET['login'];
                        if( $login === 'false'){
                                echo "<p class='error-msg'>Invalid Username / Password or You'r Account is Deleted</p>";
                         }
                    }
                ?>
            </div>


        </div>


        
    </div>


    <!-- JS Files -->
    <script src="./js/slide.js"></script>


    <!--Footer call-->
    <?php include './components/footer.php' ?>

</body>
</html>