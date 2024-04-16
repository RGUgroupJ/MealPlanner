<?php
include 'connection.php';
session_start();

//Values 
if(isset($_POST['username'])){
    $username= $_POST['username'];
} else {
    $username= '';
}

if(isset($_POST['password'])){
    $password= $_POST['password'];
} else {
    $password= '';
}


// $email= $_POST['email'];
// $username= $_POST['username'];
// $password= $_POST['password'];
// $confirmpass= $_POST['confirmpass'];
// $user= $_POST['user'];
// $email= $_REQUEST['email'];
$errMsg='';




// Free result set
// mysqli_free_result($result);


?> 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <nav class="home-nav">
        <div>LOGO</div>
        <div class="options">
            <a class="navlink" href="planner.php">Home</a>
            <a class="navlink">Meal Planner</a>
            <a class="navlink" href="blog.php">Blog</a>
            <a class="navlink" href="signup.php">Sign Up</a>
            <a class="navlink" style="color: #f86f14;" href="signin.php">Sign In</a>
            <?php 
            if(isset($_SESSION['loggedin'])&&$_SESSION['loggedin']=='true'){
                echo '<a class="navlink" href="logout.php">Log Out<a>';
            } 
            ?>
        </div>
    </nav>
    <div >
        <form action="signin.php" method='post' style="display: flex; align-items: center;justify-content: center; height: 92vh; ">
            <div class="login-form" >
                <div style="text-align: center;font-weight: bold;">SIGN IN</div>
                <div style="padding-top: 20px;">
                    <label for="username">username/email</label>
                    <div style="padding-top: 10px;">
                        <input class="login-inputs" autocomplete='off' name='username' type="text" placeholder="username">
                    </div>    
                </div>
                <div style="padding-top: 15px;">
                    <label for="password">password</label>
                    <div style="padding-top: 10px;">
                    <input name='password' class="login-inputs" autocomplete='off' type="password" placeholder="password">
                </div>
                <small style='color: red;'>
                <?php
                    if(isset($_POST['username']) && isset($_POST['password']) ){
                        $sql= "SELECT id, username, password, type from user where username= '$username' or email= '$username'";
                        $result = mysqli_query($mysqli, $sql);
                        $row = $result -> fetch_array(MYSQLI_NUM);
                        if($row!=[]){
                            if ($password==$row[2]) {
                                $_SESSION['loggedin'] = true;
                                $_SESSION['planneruserid'] = $row[0];
                                $_SESSION['username'] = $row[1];
                                $_SESSION['plannerusertype'] = $row[3];
                                header("Location: planner.php");
                            } else {
                                echo "invalid username or password";
                            }
                        } else {
                            echo "invalid username or password";
                        }
                        
                    
                    
                    
                    
                        // // Fetch all
                        // mysqli_fetch_all($result, MYSQLI_ASSOC);
                    }
                    mysqli_close($mysqli);
                ?>
                </small>
                </div>
                <small style="float: right; font-size: 12px; margin-top: 5px; color: #555; cursor: pointer;">forgot password?</small>
                <div style="margin-top: 25px;">
                    <button style="width: 260px;" class="signin-button">SIGN IN</button>
                </div>
            <div style="margin-top: 7px; font-size: 12px; text-align: center;">Don't have an account? <a href="signup.php" style="color: #f86f14; text-decoration: none;">sign up</a></div>
            </div>
        </form>
    </div>
</body>
</html>