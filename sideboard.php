<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class='sideboard'>
        <a href='planner.php'>Home</a>
        <a class='mainOption' href='dashboard.php'>Dashboard</a>
        <a class='mainOption' href='createAdmin.php'>Create Admin</a>
        <a class='mainOption' onclick='openMeals()'>Meals</a>
        <a class='option2' href='adminMeals.php'>View Meals</a>
        <a class='option2' href='addMeal.php'>Add Meal</a>
        <a class='mainOption' onclick='openPosts()'>Posts</a>
        <a class='option2' href='viewPosts.php'>View Posts</a>
        <a class='option2' onclick='openMeals' href='addPost.php'>Add Post</a>
        <a class='mainOption' href='logout.php'>Log out</a>
    </div>
</body>
<script src='sideboard.js'></script>
</html>