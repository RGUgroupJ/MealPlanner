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

// if(isset($_POST['user'])){
//     $user= $_POST['user'];
// } else {
//     $user= '';
// }
if(isset($_POST['diabetes'])){
    $diabetes= true;
} else {
    $diabetes= false;
}

if(isset($_POST['bp'])){
    $bp= true;
} else {
    $bp= false;
}
if(isset($_POST['obesity'])){
    $obesity= $_POST['obesity'];
} else {
    $obesity= '';
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
        $_id= time().'con';
        $user_id= time().'mlp';
        $sql = "INSERT INTO user (id, email, username, password, type) VALUES ('$user_id', '$email', '$username', '$password', 'admin')";
        $result1 = mysqli_query($mysqli, $sql);
        header("Location: createAdmin.php");
        die();
        // // Fetch all
        // mysqli_fetch_all($result, MYSQLI_ASSOC);
        print($result);
    } 
    
} 
mysqli_close($mysqli);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>admin</title>
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
</head>
<body >
    <div style='background-color: #f8fae4;' class="layer0">
          <div style='display: flex;'>
          <?php
            include "sideboard.php";
            ?>
            <div style='padding-left: 30px;padding-top: 40px;'>
                <form method='post' action="createAdmin.php" enctype='multipart/form-data'>
                <div style="text-align: center;font-weight: bold;">Create Admin</div>
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
               
                <div style="margin-top: 15px;">
                    <input type='submit' class="admin-signup-button" value='SUBMIT'></input>
                </div>
        </form>
            </div>
          </div>
    </div>
</body>
<script src='sideboard.js'></script>
<script>
    openMeals();   
</script>

  
</html>