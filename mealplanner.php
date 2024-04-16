
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
  <?php
  include 'navbar.php';
  ?>
    <div class="blog-top-container">      
      <div>
        <h3>pick a plan</h3>
        <form method='post' action="mealplanner.php">
        <select name="plan" id="plan">
            <option value="1d">1 Day</option>
            <option value="1w">1 Week</option>
            <option value="1m">1 Month</option>
        </select>*
        <input type="submit" value='submit'>
        </form>
      </div>  
      <div>
        <?php
            if(isset($_POST['plan'])){
                $user_id= $_SESSION['planneruserid'];
                    $hbp= false;
                    $diabetes= false;
                    $obesity= false;
                    $conditionsquery= "SELECT bp, obesity, db from conditions where user_id='$user_id'";
                    $sql= "SELECT name, description, image from meals";
                    // $query= "SELECT user_id, meal_id, date_for, TIMEDIFF(time(), date_for) as diff from newmeals where user_id='$user_id' AND diff/7<2";
                    $result = mysqli_query($mysqli, $sql);
                    // $queryresult = mysqli_query($mysqli, $query);
                    $conditionsresult= mysqli_query($mysqli, $conditionsquery);
                    // $queryArray = $queryresult -> fetch_all(MYSQLI_ASSOC);
                    $conditionsArray = $conditionsresult -> fetch_all(MYSQLI_ASSOC);
                    if($conditionsArray!=[]){
                    if($conditionsArray[0]['bp']==true&& 
                    $conditionsArray[2]==false && 
                    $conditionsArray[1]==false){
                        $hbp= true;
                        $newquery0= "SELECT name, description, image from meals where sodium<10 AND sf<10 AND food_category='breakfast'";
                        $newquery0result= mysqli_query($mysqli, $newquery0);
                        $newquery0Array = $newquery0result -> fetch_all(MYSQLI_ASSOC);
                        $breakfast= $newquery0Array;

                        $newquery0= "SELECT name, description, image from meals where sodium<10 AND sf<10 AND food_category='lunch'";
                        $newquery0result= mysqli_query($mysqli, $newquery0);
                        $newquery0Array = $newquery0result -> fetch_all(MYSQLI_ASSOC);
                        $lunch= $newquery0Array;

                        $newquery0= "SELECT name, description, image from meals where sodium<10 AND sf<10 AND food_category='dinner'";
                        $newquery0result= mysqli_query($mysqli, $newquery0);
                        $newquery0Array = $newquery0result -> fetch_all(MYSQLI_ASSOC);
                        $dinner= $newquery0Array;

                        $newquery0= "SELECT name, description, image from meals where sodium<10 AND sf<10 AND food_category='any'";
                        $newquery0result= mysqli_query($mysqli, $newquery0);
                        $newquery0Array = $newquery0result -> fetch_all(MYSQLI_ASSOC);
                        $any= $newquery0Array;
                    }
                    if($conditionsArray['diabetes']==true&& 
                    $conditionsArray['bp']==false && 
                    $conditionsArray['obesity']==false){
                        $diabetes= true;
                        $newquery0= "SELECT name, description, image from meals where glycaemicindex<10 AND calories<10 AND sf<10 AND food_category='breakfast'";
                        $newquery0result= mysqli_query($mysqli, $newquery0);
                        $newquery0Array = $newquery0result -> fetch_all(MYSQLI_ASSOC);
                        $breakfast= $newquery0Array; 

                        
                        $newquery1= "SELECT name, description, image from meals where glycaemicindex<10 AND calories<10 AND sf<10 AND food_category='lunch'";
                        $newquery1result= mysqli_query($mysqli, $newquery1);
                        $newquery1Array = $newquery1result -> fetch_all(MYSQLI_ASSOC);
                        $lunch= $newquery1Array; 

                        
                        $newquery1= "SELECT name, description, image from meals where glycaemicindex<10 AND calories<10 AND sf<10 AND food_category='dinner'";
                        $newquery1result= mysqli_query($mysqli, $newquery1);
                        $dinner= $newquery0result; 
                        $newquery1Array = $newquery1result -> fetch_all(MYSQLI_ASSOC);
                        $dinner= $newquery1Array; 

                        $newquery1= "SELECT name, description, image from meals where glycaemicindex<10 AND calories<10 AND sf<10 AND food_category='any'";
                        $newquery1result= mysqli_query($mysqli, $newquery1);
                        $newquery1Array = $newquery1result -> fetch_all(MYSQLI_ASSOC);
                        $any= $newquery1Array; 
                    }
                    if($conditionsArray['obesity']==true&& 
                    $conditionsArray['diabetes']==false && 
                    $conditionsArray['bp']==false){
                        $obesity= true;
                        $diabetes= true;
                        $newquery0= "SELECT name, description, image from meals where glycaemicindex<10 AND calories<10 ";
                        $newquery0result= mysqli_query($mysqli, $newquery0);
                        $newquery0Array = $newquery0result -> fetch_all(MYSQLI_ASSOC);
                    }
                    if($conditionsArray['bp']==true && $conditionsArray['diabetes']==true && $conditionsArray['obesity']==true){
                        $hbp= true;
                        $newquery0= "SELECT name, description, image from meals 
                        where sodium<10 AND sf<10 AND glycaemicindex<10 AND calories<10";
                        $newquery0result= mysqli_query($mysqli, $newquery0);
                        $newquery0Array = $newquery0result -> fetch_all(MYSQLI_ASSOC);
                    }
                    if($conditionsArray['bp']==true && $conditionsArray['diabetes']==true && $conditionsArray['obesity']==false){
                        $diabetes= true;
                        $newquery0= "SELECT name, description, image from meals 
                        where sodium<10 AND glycaemicindex<10 AND calories<10";
                        $newquery0result= mysqli_query($mysqli, $newquery0);
                        $newquery0Array = $newquery0result -> fetch_all(MYSQLI_ASSOC);
                    }
                    if($conditionsArray['bp']==false && $conditionsArray['diabetes']==true && $conditionsArray['obesity']==true){
                        $obesity= true;
                        $newquery0= "SELECT name, description, image from meals 
                        where sf<10 AND glycaemicindex<10 AND calories<10 AND food_category='breakfast'";
                        $newquery0result= mysqli_query($mysqli, $newquery0);
                        $newquery0Array = $newquery0result -> fetch_all(MYSQLI_ASSOC);
                        $breakfast= $newquery0Array;

                        $newquery0= "SELECT name, description, image from meals 
                        where sf<10 AND glycaemicindex<10 AND calories<10 AND food_category='lunch'";
                        $newquery0result= mysqli_query($mysqli, $newquery0);
                        $newquery0Array = $newquery0result -> fetch_all(MYSQLI_ASSOC);
                        $lunch= $newquery0Array;

                        $newquery0= "SELECT name, description, image from meals 
                        where sf<10 AND glycaemicindex<10 AND calories<10 AND food_category='dinner'";
                        $newquery0result= mysqli_query($mysqli, $newquery0);
                        $newquery0Array = $newquery0result -> fetch_all(MYSQLI_ASSOC);
                        $dinner= $newquery0Array;

                        $newquery0= "SELECT name, description, image from meals 
                        where sf<10 AND glycaemicindex<10 AND calories<10 AND food_category='any'";
                        $newquery0result= mysqli_query($mysqli, $newquery0);
                        $newquery0Array = $newquery0result -> fetch_all(MYSQLI_ASSOC);
                        $any= $newquery0Array;
                    }
                }
            
                    if($hbp==false && $diabetes==false && $obesity==false){
                        $newquery0= "SELECT name, description, image from meals 
                        where food_category='breakfast'";
                        $newquery0result= mysqli_query($mysqli, $newquery0);
                        $newquery0Array = $newquery0result -> fetch_all(MYSQLI_ASSOC);
                        
                        $breakfast= $newquery0Array;
                        $newquery0= "SELECT name, description, image from meals 
                        where food_category='lunch'";
                        $newquery0result= mysqli_query($mysqli, $newquery0);
                        $newquery0Array = $newquery0result -> fetch_all(MYSQLI_ASSOC);
                        $lunch= $newquery0Array;

                        $newquery0= "SELECT name, description, image from meals 
                        where food_category='dinner'";
                        $newquery0result= mysqli_query($mysqli, $newquery0);
                        $newquery0Array = $newquery0result -> fetch_all(MYSQLI_ASSOC);
                        $dinner= $newquery0Array;

                        $newquery0= "SELECT name, description, image from meals 
                        where food_category='dinner'";
                        $newquery0result= mysqli_query($mysqli, $newquery0);
                        $newquery0Array = $newquery0result -> fetch_all(MYSQLI_ASSOC);
                        $any= $newquery0Array;
                    }
                    
                    
                if($_POST['plan']=='1d'){

                    if ($breakfast!=[]) {
                        $randbreakfast= array_rand($breakfast);
                    } else {
                        $randbreakfast=[];
                    }
                    if ($lunch!=[]) {
                        $randlunch= array_rand($lunch);
                    }else {
                        $randlunch=[];
                    }
                    if ($dinner!=[]) {
                        $randdinner= array_rand($dinner);
                    }else {
                        $randdinner=[];
                    }
                    if ($any!=[]) {
                        $randany= array_rand($any);
                    }else {
                        $randany=[];
                    }
                    $meal_id= time().'ml';
                    
                    if($breakfast!=[]){
                        $bname= $breakfast[$randbreakfast]['name'];
                        $bimage= $breakfast[$randbreakfast]['image'];
                        $bdesc= $breakfast[$randbreakfast]['description'];
                    }
                    if($lunch!=[]){
                        $lname= $lunch[$randlunch]['name'];
                        $limage= $lunch[$randlunch]['image'];
                        $ldesc= $lunch[$randlunch]['description'];
                    }
                    if($dinner!=[]){
                        $dname= $dinner[$randdinner]['name'];
                        $dimage= $dinner[$randdinner]['image'];
                        $ddesc= $dinner[$randdinner]['description'];
                    }

                    if($breakfast!=[]){
                        echo '<div>
                        <h4>Breakfast</h4>
                            <img src='.$bimage.' />
                            <div>'.$bname.'</div>
                            <div>'.$bdesc.'</div>
                        </div>';
                    }
                    if($lunch!=[]){
                        echo '<div>
                    <h4>Launch</h4>
                        <img src='.$limage.' />
                        <div>'.$lname.'</div>
                        <div>'.$ldesc.'</div>
                    </div>';
                    }
                    if($dinner!=[]){
                        echo '<div>
                    <h4>Dinner</h4>
                        <img src='.$limage.' alt=img>
                        <div>'.$lname.'</div>
                        <div>'.$ldesc.'</div>
                    </div>';
                    }
                }   
                if($_POST['plan']=='1w'){
                    $days= array('Monday', 'Tuesday','Wednesday', 'Thursday','Friday', 'Saturday','Sunday');
                    for ($i=0; $i < 7; $i++) { 
                        if ($breakfast!=[]) {
                            $randbreakfast= array_rand($breakfast);
                        } else {
                            $randbreakfast=[];
                        }
                        if ($lunch!=[]) {
                            $randlunch= array_rand($lunch);
                        }else {
                            $randlunch=[];
                        }
                        if ($dinner!=[]) {
                            $randdinner= array_rand($dinner);
                        }else {
                            $randdinner=[];
                        }
                        if ($any!=[]) {
                            $randany= array_rand($any);
                        }else {
                            $randany=[];
                        }
                        $meal_id= time().'ml';
                        
                        if($breakfast!=[]){
                            $bname= $breakfast[$randbreakfast]['name'];
                            $bimage= $breakfast[$randbreakfast]['image'];
                            $bdesc= $breakfast[$randbreakfast]['description'];
                        }
                        if($lunch!=[]){
                            $lname= $lunch[$randlunch]['name'];
                            $limage= $lunch[$randlunch]['image'];
                            $ldesc= $lunch[$randlunch]['description'];
                        }
                        if($dinner!=[]){
                            $dname= $dinner[$randdinner]['name'];
                            $dimage= $dinner[$randdinner]['image'];
                            $ddesc= $dinner[$randdinner]['description'];
                        }
                        echo '<h3>'.$days[$i].'</h3>';
                        if($breakfast!=[]){
                            echo '<div>
                            <h4>Breakfast</h4>
                                <img src='.$bimage.' />
                                <div>'.$bname.'</div>
                                <div>'.$bdesc.'</div>
                            </div>';
                        }
                        if($lunch!=[]){
                            echo '<div>
                        <h4>Lunch</h4>
                            <img src='.$limage.'/>
                            <div>'.$lname.'</div>
                            <div>'.$ldesc.'</div>
                        </div>';
                        }
                        if($dinner!=[]){
                            echo '<div>
                        <h4>Dinner</h4>
                            <img src='.$limage.'/>
                            <div>'.$lname.'</div>
                            <div>'.$ldesc.'</div>
                        </div>';
                        }
                    }

                    
                    }  
                    if($_POST['plan']=='1m'){
                        for ($i=0; $i < 31; $i++) { 
                            if ($breakfast!=[]) {
                                $randbreakfast= array_rand($breakfast);
                            } else {
                                $randbreakfast=[];
                            }
                            if ($lunch!=[]) {
                                $randlunch= array_rand($lunch);
                            }else {
                                $randlunch=[];
                            }
                            if ($dinner!=[]) {
                                $randdinner= array_rand($dinner);
                            }else {
                                $randdinner=[];
                            }
                            if ($any!=[]) {
                                $randany= array_rand($any);
                            }else {
                                $randany=[];
                            }
                            $meal_id= time().'ml';
                            
                            if($breakfast!=[]){
                                $bname= $breakfast[$randbreakfast]['name'];
                                $bimage= $breakfast[$randbreakfast]['image'];
                                $bdesc= $breakfast[$randbreakfast]['description'];
                                
                            }
                            if($lunch!=[]){
                                $lname= $lunch[$randlunch]['name'];
                                $limage= $lunch[$randlunch]['image'];
                                $ldesc= $lunch[$randlunch]['description'];
                                
                            }
                            if($dinner!=[]){
                                $dname= $dinner[$randdinner]['name'];
                                $dimage= $dinner[$randdinner]['image'];
                                $ddesc= $dinner[$randdinner]['description'];
                            }
                            echo '<h3>Day '.$i.'</h3>';
                            if($breakfast!=[]){
                                echo '<div>
                                <h4>Breakfast</h4>
                                    <img src='.$bimage.' />
                                    <div>'.$bname.'</div>
                                    <div>'.$bdesc.'</div>
                                </div>';
                            }
                            if($lunch!=[]){
                                echo '<div>
                            <h4>Launch</h4>
                                <img src='.$limage.'/>
                                <div>'.$lname.'</div>
                                <div>'.$ldesc.'</div>
                            </div>';
                            }
                            if($dinner!=[]){
                                echo '<div>
                            <h4>Dinner</h4>
                                <img src='.$limage.' >
                                <div>'.$lname.'</div>
                                <div>'.$ldesc.'</div>
                            </div>';
                            }
                            
        
                            
                            // if()
                            
                            
                        }
    
                        
                        }  

            }  
        ?>
      </div>
    </div>
</body>
</html>