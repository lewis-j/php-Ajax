<!DOCTYPE html>
<html>
    <head>
        <title>Email Submition Example </title>
        <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<?php
$validated = true; 
if($_SERVER['REQUEST_METHOD']=="POST"){
$email = $_POST['emailAddress'];
$subject = $_POST['subject'];
$message = $_POST['message'];
if(empty($email) || empty($subject) || empty($message) ){
$validated = false;
}else{
    $validated = true;
    $sentMail = mail($email, $subject, $message); 
}
}
?>
    </head>
    <body>
        <?php 
        if($sentMail){
            ?>
            <h1 class="text-success">Mail was sent successfuly!</h1>
            <?php
        }else{
                    
         ?>
  
        <div class="container">
                       <form method="post" action="test.php">
            <div class="form-group row" id="email">
                <div class="col-md-2">
                <label for="emailAddress">Email address</label>
                </div>
                <div class="col-md-10">
                <input type="email" class="form-control" name="emailAddress" placeholder="Enter email" value= <?php echo htmlspecialchars($email); ?> >
                <small class="form-text text-muted text-warning feedback" hidden>You cannot leave this field empty.</small>
                </div>
                </div>
             <div class="form-group row" id="subject">
                 <div class="col-md-2 col-form-label">
                 <label for="subject">Subject</label>
                 </div>
                 <div class="col-md-10">
                   <input class="form-control" type="text" name="subject" placeholder="Subject" value= <?php echo htmlspecialchars($subject); ?> >
                   <small class="form-text text-muted text-warning feedback" hidden>You cannot leave this field empty.</small>
                   </div>
                   </div>
                   <div class="form-group row" id="message">
                        <label for="message">Example textarea</label>
                            <textarea class="form-control " name="message" rows="3"><?php echo htmlspecialchars($message); ?></textarea>
                            <small class="form-text text-muted text-warning feedback" hidden>You cannot leave this field empty.</small>
                     </div>
                   <div class="col-md-6">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                     </form>

            </div>
  <script>
var validated = <?php echo json_encode($validated); ?>;
var email = <?php echo json_encode($email); ?>;
var subject = <?php echo json_encode($subject); ?>;
var message = <?php echo json_encode($message); ?>;
   if(!validated){
                
                if(email === ""){
         $('#email').addClass('has-warning');
         $("#email .feedback").show();
                }else{
                    
                   $('#email').removeClass('has-warning');
                   $('#email').addClass('has-success');
                   $("#email .feedback").hide(); 
                    
                }
                if(subject === ""){
         $('#subject').addClass('has-warning');
         $("#subject .feedback").show();
                }else{
                    
                   $('#subject').removeClass('has-warning');
                   $('#subject').addClass('has-success');
                   $("#subject .feedback").hide(); 
                    
                }
                 if(message === ""){
         $('#message').addClass('has-warning');
         $("#message .feedback").show();
                }else{
                    
                   $('#message').removeClass('has-warning');
                   $('#message').addClass('has-success');
                   $("#message .feedback").hide(); 
                    
                }
                
       
       
       
       
       
   }
        </script>
<?php     
}
    ?>
           
 

    </body>
</html>