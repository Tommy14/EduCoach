<?php require_once('./db/connection.php'); ?>
<?php session_start(); ?>


<?php


            // Insert faq into the database
            if (isset($_POST['submit'])) {
                $question = mysqli_real_escape_string($connection, $_POST['question']);
                $answer = mysqli_real_escape_string($connection, $_POST['answer']);

                $query = "INSERT INTO faq (question, answer,  created_date) 
                          VALUES ('$question', '$answer',  current_timestamp())";

                if (mysqli_query($connection, $query)) {
                    echo '<script>alert("New FAQ Added")</script>';
                    header('Location: ./faqmanage.php?faq=true');
                } else {
                    echo '<script>alert("Something has error")</script>';
                    echo "Error adding FAQ: " . mysqli_error($connection);
                }
            }


            // Check if the faq ID is provided in the URL
            if (isset($_GET['id'])) {
                $faqId = $_GET['id'];

                // Retrieve the faq details from the database
                $query = "SELECT * FROM faq WHERE id = $faqId";
                $result = mysqli_query($connection, $query);

                if (mysqli_num_rows($result) == 1) {
                    $row = mysqli_fetch_assoc($result);

                    // Store the faq details in variables
                    $question = $row['question'];
                    $answer = $row['answer'];
                } else {
                    echo "FAQ not found.";
                    exit;
                }
            } 

            // Handle the form submission update
            if (isset($_POST['update'])) {
                $faqId = mysqli_real_escape_string($connection, $_POST['id']);
                $question = mysqli_real_escape_string($connection, $_POST['question']);
                $answer = mysqli_real_escape_string($connection, $_POST['answer']);

                // Update the faq in the database
                $query = "UPDATE faq SET question = '$question', answer = '$answer' WHERE id = $faqId";

                if (mysqli_query($connection, $query)) {
                    header('Location: ./faqmanage.php?update=true');
                } else {
                    echo "Error updating FAQ: " . mysqli_error($connection);
                }
            }


            if (isset($_POST['delete'])) {
                $faqId = mysqli_real_escape_string($connection, $_POST['faqId']);
                $query = "DELETE FROM faq WHERE `faq`.`id` = '{$faqId}'";
        
                $result_set = mysqli_query($connection, $query);
        
                header("Location: ./faqmanage.php?deleted=true");
            }
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Educoach - FAQ Management</title>

    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/header.css">
    <link rel="stylesheet" href="./css/footer.css">
    <link rel="stylesheet" href="./css/faq.css">

    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.2.0/fonts/remixicon.css" rel="stylesheet">

    <script src="./js/course.js"></script>
    
</head>
<body>

    <!--Header call-->
    <?php include './components/header.php' ?>

    <div> 
        <h2 class="page-title">FAQ MANAGEMENT</h2>
        <hr/>
        <br><br>
            <div class="card-form">
                        <div class="form-card-body">
                            <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" >

                            <table>
                                <tbody>
                                    <tr>
                                        <td> <label for="name">Question</label></td>
                                        <td>:</td>
                                        <td><input type="text" name="question" value="<?php echo $question; ?>" required></td>
                                    </tr>
                                    <tr>
                                        <td><label for="description">Answer</label></td>
                                        <td>:</td>
                                        <td><textarea name="answer" rows="4" required><?php echo $answer; ?></textarea></td>
                                    </tr>
                                    <tr >
                                        <td></td>
                                        <td></td>
                                        <td>
                                            <input type="hidden" type="text" name="id" value="<?php echo $faqId; ?>">
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <br><br>
                               
                                <?php  
                                if (isset($_GET['id'])) {
                                   echo '<button class="update-btn" type="submit" name="update">Update FAQ</button>';
                                }
                                else{
                                    echo '<button class="create-btn" type="submit" name="submit">Add FAQ</button>';
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
                <th>Question</th>
                <th>Answer</th>
                <th>Action</th>
            </tr>
            <?php

                // Fetch all faq from the database
                $query = "SELECT * FROM faq";
                $result = mysqli_query($connection, $query);

                // Display faq in a table
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>".$row['id']."</td>";
                    echo "<td class='td-question'>".$row['question']."</td>";
                    echo "<td class='td-question'>".$row['answer']."</td>";
                    echo '<td class="action-td">
                                <a class="action-button update-action-btn" href="./faqmanage.php?id=' . $row['id'] . '" type="submit" name="edit">Update &nbsp <i class="ri-edit-box-fill"></i></a>
                                <form method="post" action="./faqmanage.php">
                                    <input type="hidden" name="faqId" value="' . $row['id'] . '">
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