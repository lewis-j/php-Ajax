<!DOCTYPE html> 
<html>
    <head>
    <title>PHP webpage for hiking</title>
            <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
    <?php
    
    
    
    if($_SERVER["REQUEST_METHOD"] == "POST"){
     
     $myArray = [array(
                        "trail" => 'Willow Creek Raod Trail',
                        "distance" => '6.8 Miles',
                        "elevationGain" => '1099 feet',
                        "routeType" => 'Out and Back',
                        "difficulty" => 'Moderate'
                    ),
                 array(
                        "trail" => 'Kortum Trail',
                        "distance" => '8.9 Miles',
                        "elevationGain" => '931 feet',
                        "routeType" => 'Out and Back',
                        "difficulty" => 'Easy'
                     ),
                      array(
                        "trail" => 'Pomo Caynon Trail to Shell Beach',
                        "distance" => '7.2 Miles',
                        "elevationGain" => '1463 feet',
                        "routeType" => 'Out and Back',
                        "difficulty" => 'Moderate'
                     ),
                      array(
                        "trail" => 'Islands in the Sky',
                        "distance" => '4.0 Miles',
                        "elevationGain" => '928 feet',
                        "routeType" => 'Loop',
                        "difficulty" => 'Moderate'
                     ),
                      array(
                        "trail" => 'Lower Russian River Paddle',
                        "distance" => '5.8 Miles',
                        "elevationGain" => '0 feet',
                        "routeType" => 'Point to point',
                        "difficulty" => 'Easy'
                     )
                 ];
     
      $selection = $_POST["trail"];
      $isChecked = $_POST["checked"];
      $selection = intval($selection);
      ?>
      <div class="container">
      <div class="row">
      <div class="panel panel-default">
              <div class="panel-heading">
                <h2><?php echo $myArray[$selection]['trail']; ?> </h2> 
              </div>
              <div class="panel-body">
         <dl>
             <?php if($isChecked == 2){ ?>
          <dt class="col-md-3">Trail</dt>
          <dd class="col-md-9"><?php echo $myArray[$selection]['trail']; ?></dd>
          <dt class="col-md-3">Distance</dt>
          <dd class="col-md-9"><?php echo $myArray[$selection]['distance']; ?></dd>
          <dt class="col-md-3">Elevation Gain</dt>
          <dd class="col-md-9"><?php echo $myArray[$selection]['elevationGain']; ?></dd>
         <?php }else {?>
          <dt class="col-md-3">Trail</dt>
          <dd class="col-md-9"><?php echo $myArray[$selection]['trail']; ?></dd>
          <dt class="col-md-3">Distance</dt>
          <dd class="col-md-9"><?php echo $myArray[$selection]['distance']; ?></dd>
          <dt class="col-md-3">Elevation Gain</dt>
          <dd class="col-md-9"><?php echo $myArray[$selection]['elevationGain']; ?></dd>
          <dt class="col-md-3">Route Type</dt>
          <dd class="col-md-9"><?php echo $myArray[$selection]['routeType']; ?></dd>
          <dt class="col-md-3">Difficulty</dt>
          <dd class="col-md-9"><?php echo $myArray[$selection]['difficulty']; ?></dd>
          
          <?php } ?>
      
      <a href="WebApp.html" class="btn btn-default">Go Back</a>
      </div>
      </div>
      </div>
      </div>
      
      
        
        
  <?php    }else{
  ?>
  <div class="container">
      <div class="row">
          <div class="panel panel-defualt">
              <div class="panel-heading">Warning!</div>
              <div class="panel-body">
                  ERROR: No from data was submitted!   
              </div>
          </div>
      </div>
      
  </div>
  
  
  
  
  
  <?php
  }?>
</body>
    
</html>
