<?php 
include "custom_error.inc.php";
    include "SQLConnect.inc.php";
    ?>
<!DOCTYPE html>
<html>
    <head>
        <title>Delete Row</title>
    </head>
    <body>
        <?php
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            
            print "was post method";
            
            $SQLDelete = "DELETE FROM `Art_pieces` 
            WHERE `id` = ?";
            
            try{
            $statement = $myconn -> prepare($SQLDelete);
            
            $statement -> bind_param('i',$_POST['id']);
            
            $statement -> execute();
            
              if( $statement -> affected_rows > 0){
                print "<h3>Row deleted </h3>"; 
            }else{
               print "<h3>No rows affected </h3>"; 
            }
            
            $statement -> close();
            }
            catch(Exception $e){
                include "e_message.inc.php";
                }
                
                try{
            $absPath = realpath ( $_POST['photoDir'] );
            
            if(is_writable ( $absPath )){
                if(unlink($absPath)){
                    print "<h3>File ".$absPath." successfully deleted!</h3>";
                }else{
                    print "<h3>Error deleting file ".$absPath."!</h3>";
                    
                }
            }
            }catch(Exception $e){
                include "e_message.inc.php";
            }
            }
            

        
        print "<a href='main.php' class='btn btn-default'>Go to main</a>";
        
        ?>

    </body>
</html>