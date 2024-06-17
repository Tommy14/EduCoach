<?php require_once('./db/connection.php'); ?>
<?php session_start(); ?>


<?php

            // Check if the contact ID is provided in the URL
            if (isset($_GET['id'])) {
               $contactId = $_GET['id'];

                // Retrieve the contact details from the database
                $query = "SELECT * FROM contact WHERE id = $contactId";
                $result = mysqli_query($connection, $query);

                if (mysqli_num_rows($result) == 1) {
                    $row = mysqli_fetch_assoc($result);

                    // Store the contact details in variables
                    $contactId = $row['id'];
                    $message = $row['message'];
                } else {
                    echo "Contact not found.";
                    exit;
                }
            } 

            // Handle the form submission update
            if (isset($_POST['update'])) {
                $contactId = mysqli_real_escape_string($connection, $_POST['id']);
                $reply = mysqli_real_escape_string($connection, $_POST['reply']);


                // Update the contact in the database
                $query = "UPDATE contact SET reply = '$reply' WHERE id = $contactId";

                if (mysqli_query($connection, $query)) {
                    header('Location: ./contactmanage.php?update=true');
                } else {
                    echo "Error updating contact: " . mysqli_error($connection);
                }
            }


            if (isset($_POST['delete'])) {
                $contactId = mysqli_real_escape_string($connection, $_POST['courseId']);
                $query = "DELETE FROM contact WHERE `contact`.`id` = '{$contactId}'";
        
                $result_set = mysqli_query($connection, $query);
        
                header("Location: ./contactmanage.php?deleted=true");
            }
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Educoach - Contact Management</title>

    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/header.css">
    <link rel="stylesheet" href="./css/footer.css">
    <link rel="stylesheet" href="./css/contactmanage.css">

    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.2.0/fonts/remixicon.css" rel="stylesheet">

    <script src="./js/course.js"></script>
    
</head>
<body>

    <!--Header call-->
    <?php include './components/header.php' ?>

    <div> 
        <h2 class="page-title">CONTACT MANAGEMENT</h2>
        <hr/>
        <br><br>
        <?php

            // Check if the contact ID is provided in the URL
            if (isset($_GET['id'])) { 
        ?>
                <div class="card-form">
                            <div class="form-card-body">
                                <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" onsubmit="return validatePrice()">

                                <table>
                                    <tbody>
                                        <tr>
                                            <td> <label for="name">ID</label></td>
                                            <td>:</td>
                                            <td><input type="text" name="id" value="<?php echo $contactId; ?>"  readonly></td>
                                        </tr>
                                        <tr>
                                            <td><label for="description">Message</label></td>
                                            <td>:</td>
                                            <td><textarea name="reply" rows="4" readonly><?php echo $message; ?></textarea></td>
                                        </tr>
                                        <tr>
                                            <td><label for="description">Reply</label></td>
                                            <td>:</td>
                                            <td><textarea name="reply" rows="4" required><?php echo $reply; ?></textarea></td>
                                        </tr>
                                    </tbody>
                                </table>
                                <br><br>
                                <button class="update-btn" type="submit" name="update">Update Contact / Add Reply</button>
                                </form>
                            </div>
                </div>
        <?php
                 }
        ?>
    </div>

            <?php 
                    if (isset($_GET['update'])) {
                        $update = $_GET['update'];
                        if( $update === 'true'){
                                echo "<p class='success-msg'>✓ Successfully Updated</p>";
                        }
                    }
                ?>

<div class="display-table">
    <table>
        <tbody>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Mobile</th>
                <th>Message</th>
                <th>Reply</th>
                <th>Action</th>
            </tr>
            <?php

                // Fetch all contacts from the database
                $query = "SELECT * FROM contact";
                $result = mysqli_query($connection, $query);

                // Display contacts in a table
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>".$row['id']."</td>";
                    echo "<td>".$row['name']."</td>";
                    echo "<td>".$row['email']."</td>";
                    echo "<td>".$row['contact_number']."</td>";
                    echo "<td class='td-reply'>".$row['message']."</td>";
                    echo "<td class='td-reply'>".$row['reply']."</td>";
                    echo '<td class="action-td">
                                <a class="action-button update-action-btn" href="./contactmanage.php?id=' . $row['id'] . '" type="submit" name="edit">Update &nbsp <i class="ri-edit-box-fill"></i></a>
                                <form method="post" action="./contactmanage.php">
                                    <input type="hidden" name="courseId" value="' . $row['id'] . '">
                                    <button class="action-button dlt-button" type="submit" name="delete" onclick="return confirm(\'Are you sure you want to delete this message?\');">Delete &nbsp <i class="ri-delete-bin-2-fill"></i></button>
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