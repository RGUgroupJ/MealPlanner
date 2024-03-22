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
            <a class="navlink">Profile</a>
            <a class="navlink">Meal Planner</a>
            <a class="navlink">Recipes</a>
            <a class="navlink" href="blog.php" style="color: #f86f14;">Blog</a>
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
        </div>
    </nav>
    <div class="blog-top-container">
        <div class="fader1"></div>
        <div class="flex blog-body">
            <div class="blog-body1">
            <div class="card">
                <div class="thumbnail-container">
                    <img class="blog-thumbnail" src="obesity.jpg" alt="">
                </div>
                <div class="text-body">
                    <a class="blog-link" href="http://">Obesity</a> 
                    <p>Obesity and overweight are caused when extra calories, particularly those from foods high in fat and sugar, are stored in the body as fat. Obesity is an increasingly <a href="http://">see more</a></p>   
                </div>
            </div>
            <div class="card">
                <div class="thumbnail-container">
                    <img class="blog-thumbnail" src="diabetes.jpg" alt="">
                </div>            
                <div class="text-body">
                    <a class="blog-link"  href="http://">Diabetes</a> 
                    <p>Diabetes is a condition that causes a person's blood sugar level to become too high. The risk of diabetes can be reduced through healthy eating, regular exercise and <a href="http://">see more</a></p>   
                </div>
            </div>
            <div class="card">
                <div class="thumbnail-container">
                    <img class="blog-thumbnail" src="hbp.jpg" alt="">
                </div>
                <div class="text-body">
                    <a class="blog-link"  href="http://">Hypertension</a> 
                    <p>High blood pressure can often be prevented or reduced by eating healthily, maintaining a healthy weight, taking regular exercise, drinking alcohol in modera <a href="http://">see more</a></p>   
                </div>
            </div>
            <div class="card">
                <div class="thumbnail-container">
                    <img class="blog-thumbnail" src="bd1.jpg" alt="">
                </div>
                <div class="text-body">
                    <a class="blog-link"  href="http://">Balanced diet</a> 
                    <p>Eating a healthy, balanced diet is an important part of maintaining good health and can help you feel your best. This means eating a wide variety of food <a href="http://">see more</a></p>   
                </div>
            </div>
        </div>
        </div>
        <div style="height: 600px; overflow: hidden;"><img class="bg2" src="AdobeStock_478251306.jpeg" alt=""></div>
        
        
    </div>
</body>
</html>