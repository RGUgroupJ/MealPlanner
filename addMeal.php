<?php
include 'connection.php';


//get values
if (isset($_POST["btn"])) {
    if(isset($_POST['name'])){
        $name= $_POST['name'];
    } else {
        $name= '';
    }
    
    if(isset($_POST['description'])){
        $description= $_POST['description'];
    } else {
        $description= '';
    }
    if(isset($_POST['recipe'])){
        $recipe= $_POST['recipe'];
    } else {
        $recipe= '';
    }
    
    if(isset($_POST['diabetes'])){
        $diabetes= true;
    } else {
        $diabetes= false;
    }
    if(isset($_POST['hbp'])){
        $hbp= true;
    } else {
        $hbp= false;
    }
    if(isset($_POST['obesity'])){
        $obesity= true;
    } else {
        $obesity= false;
    }
    if(isset($_POST['food_category'])){
        $food_category= $_POST['food_category'];
    } else {
        $food_category= '';
    }
    if(isset($_POST['index'])){
        $index= $_POST['index'];
    } else {
        $index= 0;
    }
    if(isset($_POST['calories'])){
        $calories= $_POST['calories'];
    } else {
        $calories= 0;
    }
    if(isset($_POST['sf'])){
        $sf= $_POST['sf'];
    } else {
        $sf= 0;
    }
    if(isset($_POST['sodium'])){
        $sodium= $_POST['sodium'];
    } else {
        $sodium= 0;
    }
    
    if (isset($_FILES["image"])) {
        $image_file = $_FILES["image"];
        $address= "/images/" .time().$image_file["name"];
        echo $address;
        move_uploaded_file(
            // Temp image location
            $image_file["tmp_name"],
        
            // New image location, __DIR__ is the location of the current PHP file
            __DIR__ . "/images/".time().$image_file["name"]
        );
    }
 
    if(            
        isset($_POST['name'])
        &&isset($_POST['description'])
        &&isset($_POST['food_category'])
        &&isset($_POST['recipe'])
        &&isset($_POST['index'])
        &&isset($_POST['calories'])
        &&isset($_POST['sf'])
        &&isset($_POST['sodium'])
        &&isset($image_file)
        ){
         $userid= time().'gl004';
            $sql = "INSERT INTO meals (id, name, description, food_category,
                recipe, diabetes, obesity, hbp, glycaemicindex, calories,
                sf, sodium, image ) VALUES ('$userid', '$name','$description',
                '$food_category','$recipe', '$diabetes','$obesity', '$hbp', 
                '$index','$calories','$sf','$sodium', '$address')
                ";
            $result = mysqli_query($mysqli, $sql);
            header("Location: addMeal.php");
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
                <form method='post' action="addMeal.php" enctype='multipart/form-data'>
                    <input type="hidden" name="upload_recipe" value="upload_recipe">
                    <label class='add_label' for="title">Name*</label>
                    <div>
                    <input class='add_input' placeholder='' type="text" name="name" required><br>
                    </div>
                    <label class='add_label' for="content">Description*</label>
                    <div>
                    <input class='add_input' placeholder='' type="text" name="description" required><br>
                    </div>
                    <label class='add_label' for="content">Recipe</label>
                    <div>
                    <textArea rows=20 cols=60 class='recipe_input' placeholder='' type="text" name="recipe" required></textArea><br>
                    </div>
                    <label class='add_label' for="content">Condition(optional)</label>
                    <div>
                    <input type="checkbox" id="diabetes" name="diabetes" value='diabetes'>
                    <label for="diabetes">diabetes</label>
                    </div>
                    <div>
                        <input type="checkbox" id="hbp" name="hbp" value='hbp'>
                        <label for="hbp">high blood pressure</label>
                    </div>
                    <div>
                        <input type="checkbox" id="obesity" name="obesity" value='obesity'>
                        <label for="obesity">obesity</label>
                    </div>
                    <div>
                    <label class='add_label' for="content">Category</label>
                        <select name="food_category" class='mid-select' id="">
                            <option disabled selected>select food category</option>
                            <option value="breakfast" >Breakfast</option>
                            <option value="lunch">Lunch</option>
                            <option value="dinner" >Dinner</option>
                            <option value="any">Any</option>
                        </select>
                    </div>
                    <h4>Nutrition Information</h4>
                    <div class='flex'>
                    <label class='ni_label1' for="title">Glycaemic index*:</label>
                    <div>
                        <input class='num_input' placeholder='' type="number" name="index" required><br>
                    </div>
                    </div>
                    <div class='flex'>
                    <label class='ni_label' for="content">calories*:</label>
                    <div>
                    <input class='num_input' placeholder='' type="number" name="calories" required><br>
                    </div>
                    </div>
                    <div class='flex'>
                    <label class='ni_label' for="content">Saturated Fat*:</label>
                    <div>
                    <input class='num_input' placeholder='' type="number" name="sf" required><br>
                    </div>
                    </div>
                    <div class='flex'>
                    <label class='ni_label' for="content">Sodium*:</label>
                    <div>
                    <input class='num_input' placeholder='' type="number" name="sodium" required><br>
                    </div>
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
    openMeals();   
</script>

  
</html>