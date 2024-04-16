<?php
include 'connection.php';

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
        $image_file = $_FILES["image"];
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
              <div class='layer0'>
              <?php
                    $sql= "SELECT title, content, image from post";
                    $result = mysqli_query($mysqli, $sql);
                    $row = $result -> fetch_all(MYSQLI_ASSOC);
                    $col1=0;
                    $col2=1;
                    if ($row!=[]) {
                        echo '
                                <table border=1 cellpadding="25">
                                <tr>
                                <th>
                                 Title
                                </th>
                                </tr>
                                ';
                        for ($i=0; $i < sizeof($row) ; $i++) { 
                            echo '
                                <tr>
                                <td>'.
                                $row[$i]['title'].
                                '</td>
                                </tr>
                                ';
                            if($i==sizeof($row)-1){
                                echo '</table>';
                            }
                        }
                    }
                    mysqli_close($mysqli);
                ?>
              </div>
            </div>
          </div>
    </div>
</body>
<!-- <script src='js/recipe.js'></script> -->
<script src='sideboard.js'></script>
<script>
    openPosts();   
</script>
  
</html>