<?php 
include_once("app/classes.php");
$user = $student->loginUser();
$userdetails = $student->get_user_data();
print_r($userdetails);
?>
<!DOCTYPE html>
  <html>
    <head>
      <!--Import Google Icon Font-->
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
       <!--Import jQuery Library-->
  <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
  <!--Import materialize.js-->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" />   
  
</head>

    <body>
     <form action="login.php" method="POST">
<div id="contact" class="section section-contact scrollspy">
    <div class="container">
        <div class="row">
            <div class="col s12 ">
                <div class="card-panel teal white-text center">
                    <i class="material-icons fa-4x">email</i>
                    <h4>Contact Us For Booking</h4>
                    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Ipsam, quasi</p>
                    
                </div>
                
            </div>
            <div class="col s12">
                <div class="card-panel grey lighten-4">
                    <h5 class="center">Please Fill out Form</h5>
                    <div class="input-field ">
                        <input type="text" placeholder="Student Number" name="studno" required>
                        
                    </div>
                    <div class="input-field ">
                        <input type="text" placeholder="First Name" name="Fname" required>
                        
                    </div>
                    <div class="input-field">
                        <input type="text" placeholder="Last Name" name="Lname" required>
                        
                    </div>
                   
                   
                    <input type="submit" value="Submit" class="btn" name="Submit" required>
                </div>
            </div>
        </div>
    </div>
</div>

</form>
    </body>
  </html>
        