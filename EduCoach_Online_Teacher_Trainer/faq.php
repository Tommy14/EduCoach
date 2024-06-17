<?php require_once('./db/connection.php'); ?>
<?php session_start(); ?>

<?php

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
    <link rel="stylesheet" href="./css/faq.css">

    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.2.0/fonts/remixicon.css" rel="stylesheet">

    <script src="./js/join.js"></script>

    
</head>
<body>

    <!--Header call-->
    <?php include './components/header.php' ?>

    <div>

        <div class="join-container">

            <div class="join-form-container">
                    <h1>FAQ</h1>
                    <br>
                    <hr>
                    <div>
                        <?php
                                // Retrieve faq data from the database
                                $query = "SELECT question, answer FROM faq";
                                $result = mysqli_query($connection, $query);

                                if (mysqli_num_rows($result) > 0) {
                                    echo "<ol class='list'>";

                                    while ($row = mysqli_fetch_assoc($result)) {
                                        $question = $row['question'];
                                        $answer = $row['answer'];

                                        echo "<li>$question";
                                        echo "<p>$answer</p>";
                                        echo "</li>";
                                    }

                                    echo "</ol>";
                                } else {
                                    echo "<p>NO FAQ</p>";
                                }

                                // Close the database connection
                                mysqli_close($connection);
                            ?>
                            
                    </div>
            </div>

            <div class="join-form-container2 border-line-left-black">
                <div>
                     <img src="./images/ad/ad1.png" class="ad" alt="">
                     <br>
                     <img src="./images/ad/ad2.png" class="ad" alt="">
                 </div>
            </div>


        </div>
        
    </div>


    <!--Footer call-->
    <?php include './components/footer.php' ?>

</body>
</html>