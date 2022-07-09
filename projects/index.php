<?php
    $insert = false;
    if(isset($_POST['name'])){

    $server = "localhost";
    $username = "root";
    $password = "";

    $con = mysqli_connect($server, $username, $password);

    if(!$con){
        die("connection to database failed due to" . mysqli_connect_error());
    }
    // echo "success connecting to db";

    $name = $_POST['name'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $desc = $_POST['desc'];


    $sql = "INSERT INTO `ladakh`.`ladakh` (`name`, `age`, `gender`, `email`, `phone`, `other`, `dt`) VALUES ('$name', '$age', '$gender', '$email', '$phone', '$desc', current_timestamp())";
    // echo $sql;
    

    if($con->query($sql) == true){
        // echo "Succeessfully inserted";
        $insert = true;
    }
    else{
        echo "ERROR : $sql <br> $con -> error";
    }

    $con->close();
}

?><!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Travel Details</title>
</head>

<body>
    <img src="bg.jpg" alt="bg" class="bg">
    <div class="container">
        <h1>Welcome to Ladakh travel form</h1>
        <p>Enter Your details to confirm and submit your form</p>

        <?php
        if($insert == true){
        echo "<p class='submitmsg'>Thanks for submitting we are happy to help you</p>";
        }
        ?>

        <form action="index.php" method="post">
            <input type="text" name="name" id="name" placeholder="Enter Your name">
            <input type="text" name="age" id="age" placeholder="Enter Your age">
            <input type="text" name="gender" id="gender" placeholder="Enter Your gender">
            <input type="email" name="email" id="email" placeholder="Enter Your email">
            <input type="phone" name="phone" id="phone" placeholder="Enter Your phone">
            <textarea name="desc" id="desc" cols="30" rows="10" placeholder="additional information"></textarea>
            <button class="btn">Submit</button>
            <!-- <button class="btn">Reset</button> -->
        </form>
    </div>


    <script src="scripts.js"></script>

</body>

</html>



