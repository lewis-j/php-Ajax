<?php
include "SQLConnect.inc.php";
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Edit Row</title>
                                <!-- Latest compiled and minified CSS -->
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    </head>
    <body>
        <?php
        if(isset($_GET['id'])){
            $retrieveQuery =  "SELECT `title`, `publication date`, `topics`,`description`, `artist`, `photo target dir` 
                    FROM `Art_pieces` 
                    WHERE `id` = ?";
                    
                    $retrieveState = $myconn -> prepare($retrieveQuery);
                    
                    $id = $_GET['id'];
                    
                    $retrieveState -> bind_param("i", $id);
                    
                    $retrieveState -> execute();
                    
                    $retrieveState -> bind_result($title, $pubDate, $topics, $description, $artist, $photoDir);
                    
                    if(!($retrieveState -> fetch())){
                       $title = "";
                       $pubDate = "";
                       $topics="";
                       $description = "";
                       $artist = "";
                       $photoDir = "";
                       $id = 0;
                        
                    }
                    
                    $retrieveState -> close();
            ?>
                <div class="container">
             <div class="row">
                <div class="col-md-4"> <h2> My DataBase</h2></div>
                <div class="col-md-8 text-right" ><button type="button" class="btn btn-default"><a href="logout.php">Logout</a></button></div>
                
            </div>
                <form method="post" enctype="multipart/form-data" action="insert_update.php">
                    
            <input type="text" class="form-control" name="id" value = '<?php echo htmlspecialchars($id); ?>' hidden>
            <input type="text" class="form-control" name="photoDir" value = '<?php echo htmlspecialchars($photoDir); ?>' hidden>
           
  
     
     
          <div class="form-group row">
         <label for="inpute_file" class="col-md-2 col-form-label"><img src="<?php echo $photoDir ?>"></label>
         <div class="col-md-10">
             <input type="file" class="form-control-file" id="input_file" name="myfile" aria-describedby="fileHelp">
         </div>
         
     </div>
     <div class="form-group row">
         <label for="artist" class="col-md-2 col-form-label">Artist Name</label>
         <div class="col-md-10">
             <input type="text" class="form-control" id="artist" name="artist" value='<?php echo htmlspecialchars($artist); ?>'>
         </div>
     </div>
          <div class="form-group row">
         <label for="title" class="col-md-2 col-form-label">Title</label>
         <div class="col-md-10">
             <input type="text" class="form-control" id="title" name="title" value='<?php echo htmlspecialchars($title); ?>'>
         </div>
     </div>
     <div class="form-group row">
         <label for="pubDate" class="col-md-2 col-form-label">Publication Date</label>
         <div class="col-md-10">
             <input type="text" class="form-control" id="pubDate" name="pubDate" value='<?php echo htmlspecialchars($pubDate); ?>'>
         </div>
     </div>
          <div class="form-group row">
         <label for="topics" class="col-md-2 col-form-label">Topic</label>
         <div class="col-md-10">
             <input type="text" class="form-control" id="topics" name="topics" value='<?php echo htmlspecialchars($topics); ?>'>
         </div>
     </div>
          <div class="form-group row">
         <label for="description" class="col-md-2 col-form-label">Description</label>
         <div class="col-md-10">
             <textarea type="text" class="form-control"  rows="10" cols="30" id="description" name="description"><?php echo $description; ?></textarea>
         </div>
     </div>
     <div class="row">
         <div class="col-md-12 text-center">
             <button type="submit" class="btn btn-primary">Enter</button>
             <button type="button" class="btn btn-primary" id="mainlist" ><a href="main.php">Main List</a></button>
         </div>
     </div>

     
     </form>
      
    
     </div>";
            
            
            <?php
        }
        
        include "SQLDisconnect.inc.php";
        ?>
        
        <style>
            img {
                height: 75px;
                width: 75px;
            }
            #mainlist a{
                
                color:white;
            }
            
            
            
        </style>
    </body>
</html>