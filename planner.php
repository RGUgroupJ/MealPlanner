<?php
include 'connection.php';
session_start();
// $sql = "SELECT Lastname, Age FROM Persons ORDER BY Lastname";
// $result = mysqli_query($mysqli, $sql);


// // Fetch all
// mysqli_fetch_all($result, MYSQLI_ASSOC);

// // Free result set
// mysqli_free_result($result);

// mysqli_close($mysqli);
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
            <a class="navlink">Profile</a>
            <a class="navlink">Meal Planner</a>
            <a class="navlink">Recipes</a>
            <a class="navlink" href="blog.php">Blog</a>
            <a class="navlink" href=""><?php if(isset($_SESSION['loggedin'])&&$_SESSION['loggedin']=='true'){
                echo 'welcome '.$_SESSION['username'];
            } 
            ?> </a>
            <?php if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!='true'){
                // echo 'Sign Up';
              echo  '<a class="navlink" href="signup.php">Sign Up<a>';
            } 
            ?> </a>
            <?php if(!isset($_SESSION['loggedin']) ||$_SESSION['loggedin']!='true'){
                echo '<a class="navlink" href="signin.php">Sign In<a>';
            } 
            ?> </a>
            <?php if(isset($_SESSION['loggedin'])&&$_SESSION['loggedin']=='true'){
                echo '<a class="navlink" href="logout.php">Log Out<a>';
            } 
            ?> </a>
            <!-- <a class="navlink" href="signin.php"><?php if(!isset($_SESSION['loggedin']) ||$_SESSION['loggedin']!='true'){
                echo 'Sign In';
            } 
            ?> </a> -->
            <!-- <a class="navlink" href="logout.php"><?php if(isset($_SESSION['loggedin'])&&$_SESSION['loggedin']=='true'){
                echo 'Log Out';
            } 
            ?> </a> -->
            <!-- <a class="navlink" href="signup.php">Sign Up</a>
            <a class="navlink" href="signin.php">Sign In</a>
            <a style="display: none;">Log Out</a> -->
        </div>
    </nav>
    <div class="first-container">
        
        <div class="fader"></div>
        <div class="home-text">
            <div>Meal Planning For A Healthier Life</div> 
            <button class="get-started">Plan Meals</button>
         </div>
        <img class="bg1" src="healthy+food+for+seniors.jpg" alt="">
        
    </div>
</body>
</html>