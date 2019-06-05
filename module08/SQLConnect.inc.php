<?php 



session_start();
 
 $myconn = new mysqli(   'localhost',
        'srjclewisjackson',
        '',
        'Art_collection'
   );
   
if($_SERVER['REQUEST_METHOD'] == "POST"){
    
    $myQuery = "SELECT `id` 
                FROM `users` 
                WHERE `username` = ?
                AND `password` = ?";
                
    $myStatment = $myconn -> prepare($myQuery);
    
    $myStatment -> bind_param('ss',$_POST['username'], $_POST['password']);
    
    $myStatment -> execute();
    
    $myStatment -> bind_result($userid);
    
    if($myStatment -> fetch()){
        $_SESSION['user_id'] = $userid;
    }
    $myStatment -> close();
    
}

if( !isset($_SESSION['user_id'])){
    
    
    $myconn -> close();
    
    session_destroy();
    
    header("Location: login.html");
    
    exit;
    
    
}




?>