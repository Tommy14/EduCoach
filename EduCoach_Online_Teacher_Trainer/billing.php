<?php require_once('./db/connection.php'); ?>
<?php session_start(); ?>


<?php

        // Checking if a user is logged in
        if (!isset($_SESSION['user_id'])) {
            echo "<script>alert('User not logged in. Please log in to continue.'); window.location.href = './index.php';</script>";
            exit; // Ensure that the script terminates immediately after displaying the alert and redirecting
        }

        // Initialize variables
        $billId = '';
        $customerName = '';
        $address = '';

        // Check if the form is submitted
        if (isset($_POST['submit'])) {
            // Get form inputs
            $customerName = $_POST['customer_name'];
            $address = $_POST['address'];
            $courseId = $_POST['id'];
            $amount = $_POST['amount'];

            // Create or update the bill in the database
            if (isset($_GET['bill_id'])) {
                $billId = $_POST['bill_id'];
                // Update existing bill
                $query = "UPDATE bills SET customer_name = '$customerName', address = '$address' WHERE id = $billId";
                $result = mysqli_query($connection, $query);
                if ($result) {
                    header("Location:./billing.php?id={$courseId}&bill_id={$billId}");
                    exit;
                } else {
                    echo "Error updating bill: " . mysqli_error($connection);
                }
            } else {

                // Create new bill
                $query = "INSERT INTO bills (id, customer_name, address, amount, course, create_at, cus_id) VALUES (NULL, '$customerName', '$address','$amount','$courseId', current_timestamp(), '{$_SESSION['user_id']}')";
                $result = mysqli_query($connection, $query);
            
                if ($result) {
                    $billId = mysqli_insert_id($connection); // Get the newly inserted bill ID
                    header("Location:./billing.php?id={$courseId}&bill_id={$billId}");
                    exit;
                } else {
                    echo "Error creating bill: " . mysqli_error($connection);
                }
            }
        }

        // Check if a bill ID is provided in the URL
        if (isset($_GET['bill_id'])) {
            $billId = $_GET['bill_id'];

            // Retrieve the bill details from the database
            $query = "SELECT * FROM bills WHERE id = $billId";
            $result = mysqli_query($connection, $query);
            $bill = mysqli_fetch_assoc($result);

            if ($bill) {
                $customerName = $bill['customer_name'];
                $address = $bill['address'];
            } else {
                echo "Bill not found.";
                exit;
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
            } 



            if (isset($_POST['delete'])) {
                $billId = mysqli_real_escape_string($connection, $_POST['bill_id']);
                $query = "DELETE FROM bills WHERE `bills`.`id` = '{$billId}'";
        
                $result_set = mysqli_query($connection, $query);
        
                header("Location: ./course.php?deleted=true");
            }
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Educoach - Bill</title>

    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/header.css">
    <link rel="stylesheet" href="./css/footer.css">
    <link rel="stylesheet" href="./css/bill.css">

    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.2.0/fonts/remixicon.css" rel="stylesheet">

    <script src="./js/course.js"></script>
    
</head>
<body>

    <!--Header call-->
    <?php include './components/header.php' ?>

    <div> 
        <h2 class="page-title">Billing Details</h2>
        <hr/>
        <br><br>
            <div class="card-form">
                        <div class="form-card-body">
                            <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" >

                            <table>
                                <tbody>
                                    <tr>
                                        <td> <label for="name">Billing Name:</label></td>
                                        <td>:</td>
                                        <td><input type="text" name="customer_name" value="<?php echo $customerName; ?>" required></td>
                                    </tr>
                                    <tr>
                                        <td><label for="description">Address:</label></td>
                                        <td>:</td>
                                        <td><textarea name="address" rows="4" required><?php echo $address; ?></textarea></td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td>
                                            <input  type="hidden" type="text" name="id" value="<?php echo $courseId; ?>">
                                            <input type="hidden"  type="text" name="bill_id" value="<?php echo $billId; ?>">
                                            <input type="hidden"  type="text" name="amount" value="<?php echo $price; ?>">
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <br><br>
                               
                                <?php  
                                if (isset($_GET['bill_id'])) {
                                   echo '<button class="update-btn" type="submit" name="submit">Update Billing Details</button>';
                                }
                                else{
                                    echo '<button class="create-btn" type="submit" name="submit">Add Billing Details</button>';
                                }
                                ?>
                            </form>
                        </div>
            </div>
      
    </div>

<br><br>

    <div class="card-form">
            <div class="form-card-body">  
                <table>
                                <tbody>
                                    <tr>
                                        <td> <label for="name">Course Name</label></td>
                                        <td>:</td>
                                        <td><?php echo $name; ?></td>
                                    </tr>
                                    <tr>
                                        <td><label for="description">Course Price</label></td>
                                        <td>:</td>
                                        <td>LKR <?php echo $price; ?></td>
                                    </tr>
                                    <tr>
                                        <td><label for="description">Customer Name</label></td>
                                        <td>:</td>
                                        <td><?php echo $customerName; ?></td>
                                    </tr>
                                    <tr>
                                        <td><label for="description">Address</label></td>
                                        <td>:</td>
                                        <td><?php echo $address; ?></td>
                                    </tr>
                                </tbody>
                </table>

                <br> <br> <br>
                <?php
                    if (isset($_GET['bill_id'])) {
                        $billId = $_GET['bill_id'];
                        ?>

                        <form method="post" action="./billing.php">
                            <input type="hidden" name="bill_id" value="<?php echo $billId; ?>">
                            <button class="action-button dlt-button" type="submit" name="delete" onclick="return confirm('Are you sure you want to delete this bill?');">Delete Bill &nbsp; <i class="ri-delete-bin-2-fill"></i></button>
                        </form>

                    <?php
                    }
                ?>
                
                <button class="action-button process-button" onclick="makePayment('<?php echo $customerName; ?>')">Make Payment</button>

                <script>
                    function makePayment(customerName) {
                        if (customerName) {
                            if (confirm('Your Payment Completed')) {
                                window.location.href = 'course.php?payment=true';
                            }
                        } else {
                            alert('Customer not found. Payment cannot be completed.');
                        }
                    }
                </script>
            </div>
    </div>  

    <br><br>


    <!--Footer call-->
    <?php include './components/footer.php' ?>

</body>
</html>