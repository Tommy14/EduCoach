<?php require_once('./db/connection.php'); ?>
<?php session_start(); ?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Educoach</title>

    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/header.css">
    <link rel="stylesheet" href="./css/home.css">
    <link rel="stylesheet" href="./css/footer.css">

    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.2.0/fonts/remixicon.css" rel="stylesheet">
    
</head>
<body>

    <!--Header call-->
    <?php include './components/header.php' ?>

    <div>
        <!-- Slideshow container -->
        <div class="slideshow-container">

            <!-- Full-width images with number and caption text -->
            <div class="mySlides fade">
                <img src="./images//slides/slide 1 f.JPG" style="width:100%">
            </div>
        
            <div class="mySlides fade">
                <img src="./images//slides/slide 2 f.JPG" style="width:100%">
            </div>
        
            <div class="mySlides fade">
                <img src="./images//slides/slide 3 f.JPG" style="width:100%">
            </div>
        
            <!-- Next and previous buttons -->
            <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
            <a class="next" onclick="plusSlides(1)">&#10095;</a>
        </div>
            
            <!-- The dots/circles -->
            <div style="text-align:center">
                <span class="dot" onclick="currentSlide(1)"></span>
                <span class="dot" onclick="currentSlide(2)"></span>
                <span class="dot" onclick="currentSlide(3)"></span>
            </div>

            
            <div>
                <div class="section2">
                    <div class="column-home">
                        <div class="side-1">
                            <h1>Why Choose Us ?</h1>

                            <p>
                                Welcome to our online teacher training system! We understand that teaching online can be 
                                challenging, but we’re here to help. Our system offers a range of features that make it 
                                easy for you to teach online. With our flexible scheduling options, you can choose when 
                                to conduct your lessons. We also provide a virtual toolbox that shows how your current 
                                teaching strategies transfer to online learning. Additionally, we offer a guide for teaching 
                                with social media and tips for teaching online — with or without a Learning Management System. 
                            </p>

                            <ul>
                                <li>Expert-Lead Training</li>
                                <li>Open Positions</li>
                                <li>Diverse Course Offerings</li>
                                <li>Intractive Learning Experiences</li>
                                <li>Community Support</li>
                            </ul>
                        </div>
                    </div>
                    <div class="column-home">
                        <div class="side-2">

                            <h1>Start You'r Journey <br> Today !</h1>

                            <a href="./join.php">Join Now</a>
                        </div>
                  </div>
            </div>


    </div>


    <!-- JS Files -->
    <script src="./js/slide.js"></script>


    <!--Footer call-->
    <?php include './components/footer.php' ?>

</body>
</html>