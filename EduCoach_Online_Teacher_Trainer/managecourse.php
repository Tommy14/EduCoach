<?php require_once('./db/connection.php'); ?>
<?php session_start(); ?>


<?php


            // Insert course into the database
            if (isset($_POST['submit'])) {
                $name = mysqli_real_escape_string($connection, $_POST['name']);
                $description = mysqli_real_escape_string($connection, $_POST['description']);
                $price = mysqli_real_escape_string($connection, $_POST['price']);

                $query = "INSERT INTO courses (name, description, price, created_date) 
                          VALUES ('$name', '$description', '$price', current_timestamp())";

                if (mysqli_query($connection, $query)) {
                    echo '<script>alert("New Course Added")</script>';
                    header('Location: ./managecourse.php?course=true');
                } else {
                    echo '<script>alert("Something has error")</script>';
                    echo "Error adding course: " . mysqli_error($connection);
                }
            }


            // Check if the course ID is provided in the URL
            if (isset($_GET['id'])) {
                $courseId = $_GET['id'];

                // Retrieve the course details from the database
                $query = "SELECT * FROM courses WHERE id = $courseId";
                $result = mysqli_query($connection, $query);

                if (mysqli_num_rows($result) == 1) {
                    $row = mysqli_fetch_assoc($result);

                    // Store the course details in variables
                    $name = $row['name'];
                    $description = $row['description'];
                    $price = $row['price'];
                } else {
                    echo "Course not found.";
                    exit;
                }
            } else{

                $name = "";
                $description = "";
                $price = "";
            }

            // Handle the form submission update
            if (isset($_POST['update'])) {
                $courseId = mysqli_real_escape_string($connection, $_POST['id']);
                $name = mysqli_real_escape_string($connection, $_POST['name']);
                $description = mysqli_real_escape_string($connection, $_POST['description']);
                $price = mysqli_real_escape_string($connection, $_POST['price']);


                // Update the course in the database
                $query = "UPDATE courses SET name = '$name', description = '$description', price = '$price' WHERE id = $courseId";

                if (mysqli_query($connection, $query)) {
                    header('Location: ./managecourse.php?update=true');
                } else {
                    echo "Error updating course: " . mysqli_error($connection);
                }
            }


            if (isset($_POST['delete'])) {
                $courseId = mysqli_real_escape_string($connection, $_POST['courseId']);
                $query = "DELETE FROM courses WHERE `courses`.`id` = '{$courseId}'";
        
                $result_set = mysqli_query($connection, $query);
        
                header("Location: ./managecourse.php?deleted=true");
            }
?>

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

    <script src="./js/course.js"></script>
    
</head>
<body>

    <!--Header call-->
    <?php include './components/header.php' ?>

    <div> 
        <h2 class="page-title">COURSES MANAGEMENT</h2>
        <hr/>
        <br><br>
            <div class="card-form">
                        <div class="form-card-body">
                            <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" onsubmit="return validatePrice()">

                            <table>
                                <tbody>
                                    <tr>
                                        <td> <label for="name">Name:</label></td>
                                        <td>:</td>
                                        <td><input type="text" name="name" value="<?php echo $name; ?>" required></td>
                                    </tr>
                                    <tr>
                                        <td><label for="description">Description:</label></td>
                                        <td>:</td>
                                        <td><textarea name="description" rows="4" required><?php echo $description; ?></textarea></td>
                                    </tr>
                                    <tr>
                                        <td> <label for="price">Price:</label></td>
                                        <td>:</td>
                                        <td> <input type="number" id="price" name="price" value="<?php echo $price; ?>" required></td>
                                    </tr>
                                    <tr >
                                        <td></td>
                                        <td></td>
                                        <td>
                                            <input type="hidden" type="text" name="id" value="<?php echo $courseId; ?>">
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <br><br>
                               
                                <?php  
                                if (isset($_GET['id'])) {
                                   echo '<button class="update-btn" type="submit" name="update">Update Course</button>';
                                }
                                else{
                                    echo '<button class="create-btn" type="submit" name="submit">Add Course</button>';
                                }
                                ?>
                            </form>
                        </div>
            </div>
      
    </div>

<div class="display-table">
    <table>
        <tbody>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Description</th>
                <th>Price</th>
                <th>Action</th>
            </tr>
            <?php

                // Fetch all courses from the database
                $query = "SELECT * FROM courses";
                $result = mysqli_query($connection, $query);

                // Display courses in a table
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>".$row['id']."</td>";
                    echo "<td>".$row['name']."</td>";
                    echo "<td class='td-description'>".$row['description']."</td>";
                    echo "<td>".$row['price']."</td>";
                    echo '<td class="action-td">
                                <a class="action-button update-action-btn" href="./managecourse.php?id=' . $row['id'] . '" type="submit" name="edit">Update &nbsp <i class="ri-edit-box-fill"></i></a>
                                <form method="post" action="./managecourse.php">
                                    <input type="hidden" name="courseId" value="' . $row['id'] . '">
                                    <button class="action-button dlt-button" type="submit" name="delete" onclick="return confirm(\'Are you sure you want to delete this course?\');">Delete &nbsp <i class="ri-delete-bin-2-fill"></i></button>
                                </form>
                        </td>';
                                 
                    echo "</tr>";
                }

                // Close the database connection
                mysqli_close($connection);
                ?>
        </tbody>
    </table>

</div>




    <!--Footer call-->
    <?php include './components/footer.php' ?>

</body>
</html>