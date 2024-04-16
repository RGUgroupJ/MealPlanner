<?php
include 'connection.php';
session_start();

?> 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body >
    <nav class="home-nav">
        <div>LOGO</div>
        <div class="options">
            <a class="navlink" style="color: #f86f14;" href="planner.php">Home</a>
            <?php if(isset($_SESSION['plannerusertype']) && $_SESSION['plannerusertype']=='admin'){
                // echo 'Sign Up';
              echo  '<a class="navlink" href="adminMeals.php">Admin<a>';
            } 
            ?>
            <?php if(isset($_SESSION['loggedin'])&&$_SESSION['loggedin']=='true'){
                // echo 'Sign Up';
              echo  '<a href="mealplanner.php" class="navlink">Meal Planner</a>';
            } 
            ?>
            <a class="navlink" href="blog.php">Blog</a>
            <a class="navlink" href=""><?php if(isset($_SESSION['loggedin'])&&$_SESSION['loggedin']=='true'){
                echo 'welcome '.$_SESSION['username'];
            } 
            ?> </a>
            <?php if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!='true'){
                // echo 'Sign Up';
              echo  '<a class="navlink" href="signup.php">Sign Up<a>';
            } 
            ?>
            <?php if(!isset($_SESSION['loggedin']) ||$_SESSION['loggedin']!='true'){
                echo '<a class="navlink" href="signin.php">Sign In<a>';
            } 
            ?>
            <?php if(isset($_SESSION['loggedin'])&&$_SESSION['loggedin']=='true'){
                echo '<a class="navlink" href="logout.php">Log Out<a>';
            } 
            ?>
        </div>
    </nav>
</body>
</html>