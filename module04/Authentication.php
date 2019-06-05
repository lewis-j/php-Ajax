<?php 
$login_fail = true;
$file_uploaded = false;
$initail_form_state = true; 
if( $_SERVER["REQUEST_METHOD"] == "POST" ){
    $initail_form_state = false; 
    if($_POST["username"] == "lewis" && $_POST["password"] == "password"){
$target_directory = 'uploads/';
$target_file = $target_directory . basename($_FILES['myfile']['name']);
$file_uploaded = move_uploaded_file($_FILES["myfile"]["tmp_name"], $target_file);
echo $target_file;
    $login_fail = false;
}else{
    $login_fail = true;
}
}
?>
<!DOCTYPE <html></html>
<html>
    <head>
        <title>Form Authentication</title>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<link rel="stylesheet" href="styles.css">
    </head>
    <body>
        <div class="container">
            
                       
       <div class="panel panel-default">
  <div class="panel-heading header">Upload files to Module 4</div>
  <div class="panel-body">
      <?php if($login_fail){ ?>
      <form method="post" enctype="multipart/form-data">
          <div class="form-group row" id="username-input">
              <label for="username" class="col-md-2 col-form-label">Username:</label>
              <div class="col-md-10">
              <input class="form-control" type="text" id="username" name="username"  >
              <small class="form-text text-muted text-warning feedback" hidden>The username you entered is incorrect</small>
              </div>
          </div>
          <div class="form-group row" id="password-input">
              <label for="password" class="col-md-2 col-form-label">Password:</label>
  <div class="col-md-10">
    <input class="form-control" type="password" id="password" name="password" >
    <small  class="form-text text-muted text-warning feedback" hidden>The password you entered is incorrect</small>
  </div>
</div>
 <div class="form-group row" id="file-input">
    <label for="inputfile" class="col-md-2 col-form-label">File input</label>
    <div class="col-md-10">
    <input type="file" class="form-control-file" id="inputFile" name="myfile" aria-describedby="fileHelp">
    <small class="form-text text-muted text-warning feedback" hidden> Error! File upload was not successfull.</small>
  </div>
  </div>
   <button type="submit" class="btn btn-primary center-block">Submit</button>

        </form>
        <?php }else{
            echo "<h2>File was loaded successfully!</h2>";
        } ?>
        </div>
</div>         
        
                    
      </div>
      <script>
  var loginFail = <?php echo json_encode($login_fail); ?>;
var isInInitialState = <?php echo json_encode($initail_form_state); ?>;
var fileUploaded = <?php echo json_encode($file_uploaded); ?>;
  var username = <?php echo json_encode($_POST["username"]); ?>;
var password = <?php echo json_encode($_POST["password"]); ?>;

console.log(isInInitialState);
if(!isInInitialState){
   if(loginFail){
                
                if(username !== "lewis"){
         $('#username-input').addClass('has-warning');
         $("#username-input .feedback").show();
         $('#username').val("");
                }else{
                    
                   $('#username-input').removeClass('has-warning');
                   $('#username-input').addClass('has-success');
                   $("#username-input .feedback").hide(); 
                    $('#username').val(username);
                    
                }
                if(password !== "password"){
         $('#password-input').addClass('has-warning');
         $("#password-input .feedback").show();
                }else{
                    
                   $('#password-input').removeClass('has-warning');
                   $('#password-input').addClass('has-success');
                   $("#password-input .feedback").hide(); 
                    
                }
                
   }else{
                
                if(!fileUploaded){
                    $('#file-input').addClass('has-warning');
                     $("#file-input .feedback").show();
                    
                }
                
   }
            
                
       
       
       
       
       
   }
      </script>

    </body>
</html>