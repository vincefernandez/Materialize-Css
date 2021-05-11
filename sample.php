<?php 
if(isset($_POST['Submit'])){
echo "Hello world";

}
    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
  <form action="sample.php" method="POST">
    <button name="Submit">hello</button>
    </form>
</body>
</html>