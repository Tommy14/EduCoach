<?php require_once('./db/connection.php'); ?>
<?php session_start(); ?>

<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $contactNumber = $_POST['contact'];
    $message = $_POST['message'];

    // Insert the data into the contact table
    $name = mysqli_real_escape_string($connection, $_POST['name']);
    $email = mysqli_real_escape_string($connection, $_POST['email']);
    $contact = mysqli_real_escape_string($connection, $_POST['contact']);
    $message = mysqli_real_escape_string($connection, $_POST['message']);


    $query ="INSERT INTO contact (id, name, email, contact_number,  message, reply, created_at) VALUES (NULL,'{$name}','{$email}','{$contact}','{$message}', '', current_timestamp())";

    $result = mysqli_query($connection, $query);

    if ($result) {
        // query successful... redirecting to contactUS page
        header('Location:./contactus.php?message=true');
    } else {
        echo '<script>alert("Something has error Try again...")</script>';
    }
}
?>
 
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Educoach - Contact Us</title>

    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/header.css">
    <link rel="stylesheet" href="./css/footer.css">
    <link rel="stylesheet" href="./css/contactus.css">

    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.2.0/fonts/remixicon.css" rel="stylesheet">

    <script src="./js/join.js"></script>
    <script src="./js/contactus.js"></script>

    
</head>
<body>

    <!--Header call-->
    <?php include './components/header.php' ?>

    <div>

        <div class="join-container">

            <div class="join-form-container">
                <form id="contact-form" action="./contactus.php" method="post">
                    <div class="container">
                        <h1>Contact Us</h1>
                       <br>
                        <hr>

                        <label for="name"><b>Name</b></label> <br/>
                        <input type="text" id="name" placeholder="Enter Name" name="name" required>
                        <br/>
                        <label for="email"><b>Email</b></label> <br/>
                        <input type="text" id="email" placeholder="Enter Email" name="email" required>
                        <br/>
                        <label for="contact-number"><b>Contact Number</b></label> <br/>
                        <input type="text" id="contact" placeholder="Enter Contact Number" name="contact" required>
                        <br/>
                        <label for="message"><b>Message</b></label> <br/>
                        <textarea type="text" id="message" cols="10" rows="5" name="message" required> </textarea>
                        <br/>
                
                        <div class="clearfix">
                            <button type="submit" class="signupbtn">Submit</button>
                        </div>
                    </div>
                </form>
                <span id="character-count"></span>

                <?php 
                    if (isset($_GET['message'])) {
                        $message = $_GET['message'];
                        if( $message === 'true'){
                                echo "<p class='success-msg'>✓ You'r message was sent.</p>";
                        }
                    }
                ?>
            </div>


            <div class="join-form-container border-line-left-black">
                <div>
                     <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d63373.37389976297!2d79.89634944108441!3d6.910220049904056!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ae256db1a6771c5%3A0x2c63e344ab9a7536!2sSri%20Lanka%20Institute%20of%20Information%20Technology!5e0!3m2!1sen!2slk!4v1685657720301!5m2!1sen!2slk" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>               
                 </div>
            </div>


        </div>
        
    </div>


    <!--Footer call-->
    <?php include './components/footer.php' ?>

</body>
</html>