<?php
include '../../connection.php';
session_start();



$image_file = $_FILES["image"];

//get values
if (isset($_POST["btn"])) {
    if(isset($_POST['title'])){
        $title= $_POST['title'];
    } else {
        $title= '';
    }
    
    if(isset($_POST['content'])){
        $content= $_POST['content'];
    } else {
        $content= '';
    }
    if(isset($_POST['food_category'])){
        $category= $_POST['food_category'];
    } else {
        $category= '';
    }
    if (isset($_FILES["image"])) {
        echo 'here';
        $address= "/images/" . $image_file["name"];
        echo $address;
        move_uploaded_file(
            // Temp image location
            $image_file["tmp_name"],
        
            // New image location, __DIR__ is the location of the current PHP file
            __DIR__ . "/images/" . $image_file["name"]
        );
    }
 
    if(isset($_POST['title'])&&isset($_POST['content'])&&isset($image_file)&&isset($_POST['food_category'])){
        echo $address;
         $userid= $_SESSION['foodbizuser'];
            $sql = "INSERT INTO recipes (author, title, content, image, category) VALUES ('$userid','$title', '$content', '$address', '$category')";
            $result = mysqli_query($mysqli, $sql);
            header("Location: upload_recipe.php");
            die();
    } else {
        $title= '';
    }
    
}

//close connection
 mysqli_close($mysqli);
?> 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../../css/style.css">
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
                <form method='post' action="upload_recipe.php" enctype='multipart/form-data'>
                    <input type="hidden" name="upload_recipe" value="upload_recipe">
                    <label for="title">Title</label>
                    <div>
                    <input class='recipe_input' placeholder='' type="text" name="title" required><br>
                    </div>
                    <label for="content">Content</label>
                    <div>
                    <textArea rows=20 class='recipe_input' placeholder='' type="text" name="content" required></textArea><br>
                    </div>
                    <label for="title">Image</label>
                    <div>
                    <input  type="file"  name="image" accept="image/*" required><br>
                    </div>
                    <div>
                    <select name="food_category" class='mid-select' id="">
                <option disabled><span style='font-size: 12px'>select food category</span></option>
                <option value="desert" >Desert</option>
                <option value="appetizer">Appetizer</option>
                <option value="main" >Main Course</option>
                <option value="veg">Vegetarian</option>
            </select></div>
                    <div>
                    <input class='submit_auth' type="submit" name='btn' value="Submit">
                    </div>  
                </form>
            </div>
          </div>
    </div>
</body>
<!-- <script src='js/recipe.js'></script> -->
  
</html>