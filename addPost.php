<?php
include 'connection.php';


//get values
if (isset($_POST["btn"])) {
    if(isset($_POST['name'])){
        $name= $_POST['name'];
    } else {
        $name= '';
    }
    
    if(isset($_POST['content'])){
        $content= $_POST['content'];
    } else {
        $content= '';
    }
   
    
    if (isset($_FILES["image"])) {
        $image_file = $_FILES["image"];
        $address= "images/" .time().$image_file["name"];
        echo $address;
        move_uploaded_file(
            // Temp image location
            $image_file["tmp_name"],
        
            // New image location, __DIR__ is the location of the current PHP file
            __DIR__ . "images/".time().$image_file["name"]
        );
    }
    
 
    if(            
        isset($_POST['name'])
        &&isset($_POST['content'])
        &&isset($image_file)
        ){
            echo 'yh';
         $__id= time().'gl004';
         $user= $_SESSION['planneruserid'];
            $sql = "INSERT INTO post (id, title, content, author , image ) VALUES 
            ('$__id', '$name','$content','$user', '$address')";
            $result = mysqli_query($mysqli, $sql);
            header("Location: addPost.php");
            die();
    } else {
        $name= '';
    }
    
}  

//close connection
//  mysqli_close($mysqli);
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
                <form method='post' action="addPost.php" enctype='multipart/form-data'>
                    <input type="hidden" name="upload_recipe" value="upload_recipe">
                    <label class='add_label' for="title">Name*</label>
                    <div>
                    <input class='add_input' placeholder='' type="text" name="name" required><br>
                    </div>
                    <label class='add_label' for="content">Content*</label>
                    <div>
                    <input class='add_input' placeholder='' type="text" name="content" required><br>
                    </div>
                    <label class='add_label' for="title">Image*</label>
                    <div>
                    <input  type="file" name="image" accept="image/*" required><br>
                    </div>
                    <div style='margin-top: 10px;'>
                        <input class='submit_auth' type="submit" name='btn' value="Submit">
                    </div>  
                </form>
            </div>
          </div>
    </div>
</body>
<script src='sideboard.js'></script>
<script>
    openPosts();   
</script>

  
</html>