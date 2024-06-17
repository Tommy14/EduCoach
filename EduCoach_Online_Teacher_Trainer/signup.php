<?php require_once('./db/connection.php'); ?>

<?php


if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name = $_POST["name"];
  $email = $_POST["email"];
  $job = $_POST["job"];
  $password = $_POST["password"];
  
  $name = mysqli_real_escape_string($connection, $_POST['name']);
  $email = mysqli_real_escape_string($connection, $_POST['email']);
  $job = mysqli_real_escape_string($connection, $_POST['job']);
  $password = mysqli_real_escape_string($connection, $_POST['password']);


  $query = "INSERT INTO `users` (`id`, `name`, `email`, `job`, `password`,`create_datetime`) VALUES (NULL, '{$name}','{$email}', '{$job}', '{$password}', current_timestamp())";

  $result = mysqli_query($connection, $query);

  if ($result) {
      // query successful... redirecting to login page
      header('Location: join.php?account=true');
  } else {
    echo '<script>alert("Something has error Try again...")</script>';
  }
}
?>
