<!DOCTYPE html>
<!-- === Coding by CodingLab | www.codinglabweb.com === -->
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page | JTMK</title>
    <!-- ===== Iconscout CSS ===== -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

    <!-- ===== CSS ===== -->
    <link rel="stylesheet" href="style.css">
         
    <!--<title>Login & Registration Form</title>-->
</head>
<?php
    include('functions.php');
    $id = $_GET['id'];
    $query = "select * from `requests` where `id` = '$id'; ";
    if(count(fetchAll($query)) > 0){
        foreach(fetchAll($query) as $row){
            $fullname = $row['fullname'];
            $email = $row['email'];
            $password = $row['password'];
            $password2 = $row['password2'];
            $query = "INSERT INTO `accounts`(`id`, `fullname`, `email`, `password`, `type`, `password2`)VALUES (NULL, '$fullname', '$email', '$password', 'user', '$password2');";
        }
        $query .= "DELETE FROM `requests` WHERE `requests`.`id` = '$id';";
        if(performQuery($query)){
            echo "<h1>Account Has Been Approved !</h1>";
        }else{
            echo "<h1>Unknown error occured. Please try again.</h1>";
        }
    }else{
        echo "<h1>Error Occured !</h1>";
    }
    
?>
<svg class="checkmark" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 52 52"> <circle class="checkmark__circle" cx="26" cy="26" r="25" fill="none"/> <path class="checkmark__check" fill="none" d="M14.1 27.2l7.1 7.2 16.7-16.8"/>
<h1>Account Has Been Approved !</h1>
     <a class="backButton" href="home.php">Back</a>



</html>