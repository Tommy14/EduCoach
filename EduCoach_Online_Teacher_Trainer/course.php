<?php require_once('./db/connection.php'); ?>
<?php session_start(); ?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Educoach - Courses</title>

    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/header.css">
    <link rel="stylesheet" href="./css/footer.css">
    <link rel="stylesheet" href="./css/course.css">

    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.2.0/fonts/remixicon.css" rel="stylesheet">
    
</head>
<body>

    <!--Header call-->
    <?php include './components/header.php' ?>

    <div> 
        <h2 class="page-title">OUR COURSES</h2>
        <hr/>

        <div class="grid-container">

            <?php

                // Fetch all courses from the database
                $query = "SELECT * FROM courses";
                $result = mysqli_query($connection, $query);

                // Display courses in a table
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<div class='grid-item'>";
                    echo "<div class='card'>";
                    echo "<h1>".$row['name']."</h1>";
                    echo "<p class='price'>LKR.".$row['price']."</p>";
                    echo "<p class='details-course'>".$row['description']."</p>";
                    echo "<p><button onclick=\"redirectToBilling(" . $row['id'] . ")\">Enroll Now</button></p>";
                    echo "</div>";
                    echo "</div>";
                }

                // Close the database connection
                mysqli_close($connection);
            ?>

        </div>

        <script>
            function redirectToBilling(id) {
                window.location.href = 'billing.php?id=' + id;
            }
        </script>
      
    </div>




    <!--Footer call-->
    <?php include './components/footer.php' ?>

</body>
</html>