<?php include 
    include "custom_error.inc.php";
    include "SQLConnect.inc.php"; 
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Edit DataBase </title>
    </head>
    <body>
        


<?php 

if(isset($_POST['id'])){
    

  try{  
    if($_POST['id'] != 0){
        
$target_directory = 'uploads/';
$target_file = $target_directory . basename($_FILES['myfile']['name']);
$file_uploaded = move_uploaded_file($_FILES["myfile"]["tmp_name"], $target_file);




if(!$file_uploaded){
    $target_file = $_POST['photoDir'];
}
        
        $sql_Update = "UPDATE `Art_pieces` 
                            SET `title` = ?,
                                 `publication date` = ?,
                                 `topics` = ?,
                                  `description` = ?,
                                  `artist` = ?,
                                  `photo target dir`= ?
                                  WHERE `id` = ?";
                                  
        $statement = $myconn -> prepare($sql_Update);
        
        $statement -> bind_param("ssssssi", $_POST['title'], $_POST['pubDate'], $_POST['topics'], $_POST['description'], $_POST['artist'],$target_file, $_POST['id']);
        
        print "<h2>Row was successfully updated</h2>";
        
        }else{
            
                    $target_directory = 'uploads/';
$target_file = $target_directory . basename($_FILES['myfile']['name']);
$file_uploaded = move_uploaded_file($_FILES["myfile"]["tmp_name"], $target_file);
        
        $sql_Update = "INSERT INTO `Art_pieces` 
                    (`title`, `publication date`, `topics`, `description`, `artist`, `photo target dir`)
                    VALUES (?,?,?,?,?,?)";
                    
        $statement = $myconn -> prepare($sql_Update);
        
        $statement -> bind_param("ssssss",$_POST['title'], $_POST['pubDate'], $_POST['topics'], $_POST['description'], $_POST['artist'],$target_file );
        
        print "<h2>New row was successfully added</h2>";
    }
    

    
     $statement -> execute();
     
     $statement -> close();
    
  }catch(Exception $e){
      
      include "e_message.inc.php";
  }
    
    
    
    
    
}else{
    
     print "<h2>Unautherized access to page</h2>";
    
}
?>
<button type="button"><a href="main.php">Back to main</a></button>
<button type="button"><a href="logout.php">logout</a></button>

<?php

include "SQLDisconnect.inc.php"?>
    </body>
</html>