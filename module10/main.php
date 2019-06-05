
<?php
include "custom_error.inc.php";
include "SQLConnect.inc.php";
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Main Page</title>
                        <!-- Latest compiled and minified CSS -->
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    </head>
    <body>
        <?php
        
        $allData = "SELECT `id`, `title`, `publication date`, `topics`,`description`,`artist`, `photo target dir` 
                    FROM `Art_pieces`";
        $statment = $myconn -> prepare($allData);
        
        $statment -> execute();
        
        $statment -> bind_result($pid, $title, $pubDate, $topics, $discription, $artist, $photoDir);
        ?>
        <div class="container">
            <div class="row">
                <div class="col-md-7 text-right"> <h2> My DataBase</h2></div>
                <div class="col-md-5 text-right" ><button type="button" class="btn btn-default"><a href="edit_add.php?id=0">Add New Row</a></button><button type="button" class="btn btn-default"><a href="logout.php">Logout</a></button></div>
                
            </div>
               
        <table class="table table-striped table-dark">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Art</th>
      <th scope="col">Artist</th>
      <th scope="col">Title</th>
      <th scope="col">publication date</th>
      <th scope="col">Topics</th>
      <th scope="col">Discription</th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>
      <?php
        
        while($statment -> fetch()){
            ?>
            <tr>
          <th scope="row"><?php echo $pid ?></th>
               <td><img src='<?php echo $photoDir ?>'></td>
               <td><?php echo $artist ?></td>
               <td><?php echo $title ?></td>
                <td><?php echo $pubDate ?></td>
                 <td><?php echo $topics ?></td>
                  <td><?php echo $discription ?></td>
                   
                   
                   <td><button type="button" class="btn btn-light"><a href="edit_add.php?id=<?php echo $pid ?>">Edit</a></button>
                   <button type="button" class="btn btn-danger modalclick" data-id ="<?php echo $pid ?>" data-dir ="<?php echo $photoDir ?>" data-toggle="modal" data-target="#delete">Delete</button></td>
                  
          </tr>
          </div>
          
          <?php
        }
        $statment -> close();
        
        echo "  </tbody></table></div></div>";
        include "SQLDisconnect.inc.php";
        ?>
                    <div class="modal fade" id="delete" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title">Delete Row</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          <p>Are you sure you would like to Delete row?</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <form method="post" action="delete.php">
              <div class="comfirm-delete"></div>
               <button type="submit" class="btn btn-danger">Delete</button>
          </form>
          
        </div>
        
      </div>
      
    </div>
    
  </div>
  
        
        <style>
            .btn-danger a {
                color: white;
            }
            img {
                height: 150px;
                width: 150px;
            }
        </style>
        <script>
        /*global $*/
            $(document).ready(function(){
                console.log("test");
                $('.modalclick').click(function(){
                 var val = $(this).data('id');
                 var dir = $(this).data('dir');
                 console.log(dir);
                 $('.modal-body p').empty();
                 $('.modal-body p').append("Are you sure you would like to Delete row #" + val + "?")
                 $('.comfirm-delete').empty();
                 $('.comfirm-delete').append("<input type='text' class='form-control' name='id' value = '" + val +"' hidden>");
                 $('.comfirm-delete').append("<input type='text' class='form-control' name='photoDir' value = '" + dir +"' hidden>");
                
                    
                });
                
            });
            
        </script>
     
    </body>
</html>