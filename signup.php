<?php
include 'connection.php';
session_start();

//Values 
if(isset($_POST['email'])){
    $email= $_POST['email'];
} else {
    $email= '';
}

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

if(isset($_POST['confirmpass'])){
    $confirmpass= $_POST['confirmpass'];
} else {
    $confirmpass= '';
}

if(isset($_POST['user'])){
    $user= $_POST['user'];
} else {
    $user= '';
}

$errMsg='';


if(isset($_POST['confirmpass']) && $confirmpass!='' && $confirmpass==$password){
    $sql0= "SELECT username, password from user where email= '$email'";
    $sql01= "SELECT username, password from user where username= '$username'";
    $result0 = mysqli_query($mysqli, $sql0);
    $result01 = mysqli_query($mysqli, $sql01);
    $result0Array = $result0 -> fetch_array(MYSQLI_NUM);
    $result01Array = $result01 -> fetch_array(MYSQLI_NUM);
    if($result0Array==[] && $result01Array==[]){
        $sql = "INSERT INTO user (email, username, password, type) VALUES ('$email', '$username', '$password', '$user')";
        $result = mysqli_query($mysqli, $sql);
        header("Location: signin.php");
        die();
        // // Fetch all
        // mysqli_fetch_all($result, MYSQLI_ASSOC);
        print($result);
    } 
    
}




// if($confirmpass!='' && $confirmpass==$password){
//     $sql = "INSERT INTO user (email, username, password, type) VALUES ('$email', '$username', '$password', '$user')";
//     $result = mysqli_query($mysqli, $sql);


//     // // Fetch all
//     // mysqli_fetch_all($result, MYSQLI_ASSOC);
//     print($result);
// } else {
//     $errMsg= 'passwords do not match';
//     echo $errMsg;  
// }



// Free result set
// mysqli_free_result($result);

mysqli_close($mysqli);
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
        <div class="options" href="planner.php">
            <a class="navlink" href='planner.php'>Home</a>
            <a class="navlink">Profile</a>
            <a class="navlink">Meal Planner</a>
            <a class="navlink">Recipes</a>
            <a class="navlink" href="blog.php">Blog</a>
            <a class="navlink" style="color: #f86f14;" href="signup.php">Sign Up</a>
            <a class="navlink" href="signin.php">Sign In</a>
            <?php 
            if(isset($_SESSION['loggedin'])&&$_SESSION['loggedin']=='true'){
                echo '<a class="navlink" href="logout.php">Log Out<a>';
            } 
            ?>
        </div>
    </nav>
    <div>
        <form action="signup.php" method="post" style="display: flex; align-items: center;justify-content: center; height: fit-content; ">
            <div class="signup-form">
                <div style="text-align: center;font-weight: bold;">SIGN UP</div>
                <div style="margin-top: 20px;">
                    <label for="email" >email</label>
                    <div style="padding-0top: 5px;">
                        <input class="signup-inputs" autocomplete='off' name="email" type="email" placeholder="email">
                    </div>
                </div>
                <?php
                if(isset($_POST['confirmpass']) && $confirmpass!='' && $confirmpass==$password){
                    if($result0Array!=[] ){
                        echo "<small style='color: red'>user already exists</small>";
                    }      
                }
                ?> 
                <div style="padding-top: 10px;"> 
                    <label for="username">username</label>
                    <div style="padding-top: 5px;">
                        <input class="signup-inputs" autocomplete='off' name="username" type="text" placeholder="username">
                    </div> 
                    <?php
                    if(isset($_POST['confirmpass']) && $confirmpass!='' && $confirmpass==$password){
                        if($result01Array!=[] ){
                            echo "<small style='color: red'>username already taken</small>";
                        }      
                    }
                    ?>        
                </div> 
                <div style="padding-top: 10px;">
                    <label for="password">password</label>
                    <div style="padding-top: 5px;">
                        <input class="signup-inputs" autocomplete='off' name="password" type="password" placeholder="password">
                    </div>
                </div>
                <div style="padding-top: 10px;">
                    <label for="confirmpassword">confirm password</label>
                    <div style="padding-top: 5px;">
                        <input class="signup-inputs" autocomplete='off' name="confirmpass" type="password" placeholder="password">
                    </div>
                    <?php if (isset($_POST['confirmpass']) && $confirmpass!='' && $confirmpass!=$password){
                        echo "<small style='color: red'>passwords do not match</small>";
                    } ?>
                </div>
                <!-- <div style="padding-top: 10px;">
                    <label for="user">user</label>
                    <div style="padding-top: 5px;">
                    <input type="radio" id="chef" name="user" value="1">
                    <label for="chef">chef</label><br>
                    <input type="radio" id="seeker" name="user" value="2">
                    <label for="seeker">recipe seeker</label><br>
                    </div>
                </div> -->
                <div style="margin-top: 10px; padding-top: 10px; padding-bottom: 5px;">Health conditions(optional)</div>
                <div>
                    <input type="checkbox" id="diabetes" name="diabetes">
                    <label for="diabetes">diabetes</label>
                </div>
                <div>
                    <input type="checkbox" id="hbp" name="hbp">
                    <label for="hbp">high blood pressure</label>
                </div>
                <div>
                    <input type="checkbox" id="lbp" name="lbp">
                    <label for="lbp">low blood pressure</label>
                </div>
                <div>
                    <input type="checkbox" id="obesity" name="obesity">
                    <label for="obesity">obesity</label>
                </div>
                <div style="margin-top: 15px;">
                    <input type='submit' class="signup-button" value='SIGN UP'></input>
                </div>
                <div style="margin-top: 7px; font-size: 12px; text-align: center;">Already have an account? <a href="signin.php" style="color: #f86f14; text-decoration: none;">sign in</a></div>
            </div>
        </form>
    </div>
</body>
</html>