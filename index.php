<?php

$insert=false;
// Database connection variables
$server = "localhost";
$username = "root";
$password = "";


// Create a connection
$con = mysqli_connect($server, $username, $password);

// Check connection
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}
// echo "Success connecting to the database.<br>";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $name = $_POST['name'];
    $gender = $_POST['gender'];
    $DOB = $_POST['DOB'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $date = $_POST['date'];
    $destination = $_POST['destination'];

    // SQL query to insert data
    $sql = "INSERT INTO `trip`.`trip` (`name`, `gender`, `phone`, `email`, `address`, `DOB`, `destination`, `date`) 
            VALUES ('$name', '$gender', '$phone', '$email', '$address', '$DOB', '$destination', '$date')";



    // Execute the query
    if ($con->query($sql) === TRUE) {
        $insert=true;
    } else {
        echo "ERROR: $sql <br> $con->error";
    }
}

$con->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="style.css" rel="stylesheet">
</head>
<body>
    <div class="outer-contanier">
<img src ="vintage.jpg">
    <div class="container">
   
    <div class="inner-container">
    <h3>Welcome to travel website</h3>
<p>Enter your details</p>

<?php
if($insert==true){
echo "<p class='subMsg'>Thanks for submitting your form.</p> ";
}
?>
<form method="post" action="index.php">
<input id="name" type="text" name="name" placeholder="Enter your name">
<input id="gender" type="text" name="gender" placeholder="Enter your gender">
<input id="DOB" type="text" name="DOB" placeholder="Enter your date of birth">
<input id="phone" type="text" name="phone" placeholder="Enter your phone number">
<input id="email" type="text" name="email" placeholder="Enter your email:">
<input id="address" type="text" name="address" placeholder="Enter your address">

<h1>Travel details</h1>

<input id="date" type="text" name="date" placeholder="Enter your date of travel">
<input id="destination" type="text" name="destination" placeholder="Enter your destination">
<hr>
<button type="submit" class="submit">Submit</button>
</form>
</div>
</div>
</div>
<script src="index.js"></script>
</body>
</html>
