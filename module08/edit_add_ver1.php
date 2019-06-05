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
                <h2> My DataBase</h2>
                <form method="post" action="insert_update.php">
        <table class="table table-striped table-dark">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Art</th>
      <th scope="col">Artist</th>
      <th scope="col">Title</th>
      <th scope="col">Publication Date</th>
       <th scope="col">Topics</th>
      <th scope="col">Description</th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>
         <tr>
          <th scope="row"><?php echo $id ?></th>
           <input type="text" class="form-control" name="id" value = '<?php echo htmlspecialchars($id); ?>' hidden>
            <input type="text" class="form-control" name="photoDir" value = '<?php echo htmlspecialchars($photoDir); ?>' hidden>
           
              <td><img src="<?php echo $photoDir ?>">
                  <input type="file" class="form-control-file" id="inputFile" name="myfile" aria-describedby="fileHelp"></td>
               <td><input type="text" class="form-control" name="artist" value = '<?php echo htmlspecialchars($artist); ?>'></td>
                <td><input type="text" class="form-control" name="title" value = '<?php echo htmlspecialchars($title); ?>'></td>
                 <td><input type="text" class="form-control" name="pubDate" value = '<?php echo htmlspecialchars($pubDate); ?>' ></td>
                  <td><input type="text" class="form-control" name="topics" value = '<?php echo htmlspecialchars($topics); ?>'></td>
                   <td><textarea rows="10" cols="30" name="description"><?php echo htmlspecialchars($description); ?></textarea></td>
                  <td><button type= "submit" class="btn btn-primary">Submit</button></td> 
            
             
          </tr>
     </tbody>
     </table>
     </form>
      <button type="button" class="btn btn-primary" id="mainlist" ><a href="main.php">Main List</a></button>
     </div>
     </div>
            
            
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