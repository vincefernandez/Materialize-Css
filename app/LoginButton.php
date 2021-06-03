<?php
require_once('classes.php');
$userdetails = $student->get_user_data(); 
$awit = $student->getSessionName();
//COPY THIS EVERY PAGES PARA BUMALIK PAG HINDI  NAKA SET ANG Userdetails GEGE
$ForNotsetSession = "";
if(!isset($_SESSION['login'])){
    
    $variableAwit =  "<a href='login.php'>Login</a>";
    echo "$variableAwit";
   }
if(isset($_SESSION['login'])){
    echo "<a class='dropdown-trigger' href='' data-target='dropdown1'>$awit<i class='material-icons right'>arrow_drop_down</a></i>";
   
}
?>  