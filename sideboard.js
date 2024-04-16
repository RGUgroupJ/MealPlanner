var adminbtn= document.getElementById('admin');
var mealFlag= false;
var postFlag= false;
const openMeals= ()=>{
    var options2= document.getElementsByClassName('option2');
    if(mealFlag==false){
        options2[0].style.display= 'block'; 
        options2[1].style.display= 'block'; 
        mealFlag= true;
    } else {
        options2[0].style.display= 'none'; 
        options2[1].style.display= 'none'; 
        mealFlag= false; 
    }

}
const openPosts= ()=>{
    var options2= document.getElementsByClassName('option2');
    if(postFlag==false){
        options2[2].style.display= 'block'; 
        options2[3].style.display= 'block'; 
        postFlag= true; 
    } else {
        options2[2].style.display= 'none'; 
        options2[3].style.display= 'none'; 
        postFlag= false; 
    }
    // for (let index = 0; index < options2.length; index++) {
    //     options2[index].style.display= 'block';        
    // }
}
