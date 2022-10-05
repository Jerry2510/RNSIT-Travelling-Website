<?php
 /*to connect mysql database we will use mysqli function which is procedural oriented,
  we can do it by using objects in php which is object oriented*/ 
  $insert = FALSE;
  if(isset($_POST['name']))
  {
    $server = 'ec2-3-225-110-188.compute-1.amazonaws.com';
    $username = 'lyxnocuvqwvjdw';
    $password = '097e81370eb26c3b835f1af2faee5f0cf70fcf51fef597549bff6c1ff14be843';
    //$db = 'trip';

    $con = mysqli_connect($server, $username, $password);

    if(!$con)
    {
        die("connection to this database failed due to" .
            mysqli_connect_error()); 
    }
    //echo "Successful connection to the database Jerry"
    $name=$_POST['name'];
    $age=$_POST['age'];
    $gender=$_POST['gender'];
    $email=$_POST['email'];
    $phone=$_POST['phone'];
    $desc=$_POST['desc'];
    
    $sql = "INSERT INTO `trip`.`trip_info` (`Name`, `Age`, `Gender`, `Email`, `Phone`, `Others`, `dt`) VALUES ('$name','$age','$gender','$email','$phone','$desc',current_timestamp())";
    //echo $sql;
    if($con->query($sql)==TRUE)
    {
      //echo "Successfully inserted";
      $insert = TRUE;
    }
    else
    {
      echo "Error: $sql <br> $con->error";
    }
    $con->close();
  }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Travel Form of RNSIT</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto|Sriracha&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="style.css">
</head>
<body>
    <img class="bg" src="bg1.jpg" alt="RNSIT Bangalore">
    <div class="container">
        <h1>Welcome to RNSIT Bangalore Coorg Trip form</h3>
        <p>Enter your details and submit this form to confirm your participation in the trip </p>
        <?php
           if($insert == TRUE)
           {
               echo "<p class='submitmsg'>Thanks for submitting the form.We are happy to see you joining us for the Coorg trip.</p>";
           }
       ?>
        <form action="index.php" method="post">
            <input type="text" name="name" id="name" placeholder="Enter your name">
            <input type="text" name="age" id="age" placeholder="Enter your Age">
            <input type="text" name="gender" id="gender" placeholder="Enter your gender">
            <input type="email" name="email" id="email" placeholder="Enter your email">
            <input type="phone" name="phone" id="phone" placeholder="Enter your phone">
            <textarea name="desc" id="desc" cols="30" rows="10" placeholder="Enter any other information here"></textarea>
            <button class="btn">Submit</button> 
        </form>
    </div>
    <script src="index.js"></script>   
</body>
</html>
