<!DOCTYPE html>
<html>
    <head>
        <title> Access database </title>
                        <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<style>
    .panel-body{
        background-color: black;
    }
    
    
</style>
    </head>
    <body>
        
        
        <?php 
        
          $myconn = new mysqli(
        'localhost',
        'srjclewisjackson',
        '',
        'mock_online_store'
    );
        $mySQL = "SELECT  `id` 
                FROM  `users` 
                WHERE  `username` =  ?
                AND  `password` =  ?";
    
        $myStatement = $myconn -> prepare($mySQL);
        
        $myusername = $_POST['username'];
        $myPassword = $_POST['password'];
        
        $myStatement -> bind_param('ss',$myusername, $myPassword);
        
        $myStatement -> execute();
        
        $myStatement -> bind_result($id);
        
        if($myStatement -> fetch()){
            
            $myStatement -> close();
            
            $mySQL2 = "SELECT `item`,`product name`,`deparment`,`price`,`discription` FROM `products`";
            
            $nextStatement = $myconn -> prepare($mySQL2);
            
            $nextStatement -> execute();
            
            $nextStatement -> bind_result($item, $productName, $department, $price, $discription);
            ?> <div class='container'>     <?php
            while($nextStatement -> fetch()){
               
              ?>
              
<div class='row'>  
   <div class='panel panel-default'>
       <div class="panel-body">
            <ul class="list-group list-group-flush">
  <li class="list-group-item">Item: <?php echo $item ?></li>
  <li class="list-group-item">Product Name: <?php echo $productName ?> </li>
  <li class="list-group-item">Department:  <?php echo $department ?></li>
  <li class="list-group-item">Price:  <?php echo $price ?></li>
  <li class="list-group-item">Discription:  <?php echo $discription ?></li>
</ul> 
           
           
       </div>

</div> 
</div>

        <?php
         
            }
           ?> </div>   <?php 
            $nextStatement -> close();
            
            
            
        } else {
             $myStatement -> close();
            echo "login failed!";
        }
        
        $myconn -> close();
        ?>

    </body>
</html>