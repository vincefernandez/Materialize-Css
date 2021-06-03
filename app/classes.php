<?php 

class myStudent {

    private $server = "mysql:host=localhost;dbname=studentdb";
    private $user = "root";
    private $pass = "";
    private $option = array(
        PDO::ATTR_ERRMODE => 
        PDO::ERRMODE_EXCEPTION, 
        PDO::ATTR_DEFAULT_FETCH_MODE => 
        PDO::FETCH_ASSOC);
    protected $con;

    public function OpenConnection(){
            try {

                $this->con = new PDO($this->server, $this->user, $this->pass, $this->option);
                return $this->con;

            } catch (PDOException $e) {
                echo "ERROR:".$e->getMessage();
            }
    }

    public function closeConnection(){
        $this->$con = null;
    }

    public function getUsers(){
        $STUDENTIDNumber = $_SESSION['login'];
        $connection = $this->OpenConnection();
        $stmt = $connection->prepare("SELECT * From classlist_table where Student_Number = '$STUDENTIDNumber'");
        $stmt->execute();
        $users = $stmt->fetchAll();
        $userCount = $stmt -> rowCount();

        if($userCount > 0 ){
            return $users;
        }
        else{
            return 0;
        }
    }

    public function loginUser(){
        $connection = $this->OpenConnection();
        
        
        if(isset($_POST['Submit'])){
            $Student_Number = $_POST['studno'];
            
            $First_Name = $_POST['Fname'];
            $Last_Name = $_POST['Lname'];
            
            
            $stmt = $connection->prepare("SELECT * FROM classlist_table where Student_Number = ? AND First_Name = ? AND Last_Name =?");
            $stmt->execute([$Student_Number,$First_Name,$Last_Name]);
            $user = $stmt->fetch(); //Accessing the INFO
            $total = $stmt->rowCount();
            if(isset($_SESSION['login'])){
                echo "You've already Loggin";
                header("location: /index.php");  
            }
            if($total > 0){
               
                
           session_start();
           $_SESSION['login'] = $Student_Number;
           $STUDENTIDNumber = $_SESSION['login'];
           header("location: pages/dashboardBS.php");
           
           $this->set_user_data($user);
           
           
            }else{
                echo "<script> alert ('Error Please Try Again'); </script>"; 
            }


        }
    }

    // public function set_user_data($array){
    //     if(!isset($_SESSION)){
    //         session_start();
            
    //     }
       
        
       
    //     $_SESSION['userdata'] = array(
    //         "Fullname" => $array['Student_Number']." ".$array['First_Name']." ".$array['Last_Name'],
           
    //     );
        
    //     return $_SESSION['userdata'];
    // }
    public function get_user_data(){
        if(!isset($_SESSION)){
            session_start();
        }
        if(isset($_SESSION['login'])){
           return $_SESSION['login'];
        }else{
            return null;
        }
        
        
    }
    

    public function logout(){
        if(!isset($_SESSION)){
            session_start();
        }

        $_SESSION['login'] = null;
        unset($_SESSION['login']);
    }
    public function getFullName(){  
        $connection = $this->OpenConnection();
        if(!isset($_SESSION['login'])){
    
            $variableAwit =  "<li><a href='login.php'>Login</li></a>";
            return $variableAwit;
           }
        $STUDENTIDNumber = $_SESSION['login'];
        $stmt = $connection->query("SELECT * FROM classlist_table WHERE Student_Number = '$STUDENTIDNumber' LIMIT 1");
       
        while($row = $stmt->fetch()){
            echo $row['First_Name']." ".$row['Last_Name'];
           
        }
    }

    public function getStudentNumberData(){  
        $STUDENTIDNumber = $_SESSION['login'];
        $connection = $this->OpenConnection();
       
        
        $stmt = $connection->query("SELECT * FROM classlist_table WHERE Student_Number = '$STUDENTIDNumber' LIMIT 1");
       
        while($row = $stmt->fetch()){
            echo $row['First_Name']." ".$row['Last_Name'];
           
        }
    }


    public function getSessionName(){  
        $connection = $this->OpenConnection();
        if(!isset($_SESSION['login'])){
    
            $variableAwit =  "<li><a href='login.php'>Login</li></a>";
            return $variableAwit;
           }
        $STUDENTIDNumber = $_SESSION['login'];
        $stmt = $connection->query("SELECT * FROM classlist_table WHERE Student_Number = '$STUDENTIDNumber' LIMIT 1");
       
        while($row = $stmt->fetch()){
            $awit = $row['First_Name']." ".$row['Last_Name'];
            return $awit;
        }
    }
   

    public function InsertBio(){
 
        if(isset($_POST['save'])){
        
        $connection = $this->OpenConnection();
        $STUDENTIDNumber = $_SESSION['login'];
        $Post = $_POST['TextArea'];
        $date = date("Y/m/d");
   

    $stmt = $connection->prepare("INSERT INTO post_bio(Student_Number,Post_Bio,date) VALUE(:STUDENTIDNumber, :Post_Bio, :date)");
    
    $stmt->execute([
        'STUDENTIDNumber' => $STUDENTIDNumber,
        'Post_Bio' => $Post,
        'date' => $date
                        
    ]);
        
   
    }
}
    
    


    public function SubmitBio(){

        if(isset($_POST['save'])){
        $connection = $this->OpenConnection();
        $STUDENTIDNumber = $_SESSION['login'];
       
      $sql="SELECT * from post_bio where Student_Number ='$STUDENTIDNumber'";
      $stmt = $connection->prepare($sql);
      $stmt->execute(['STUDENTIDNumber' => $STUDENTIDNumber]);
      $user1 = $stmt->rowCount();

        if($user1 === 1){
            $this->UpdateBio();
        }else{
           
            $this->InsertBio();
            }
        
        
       
    }
    }


    public function UpdateBio(){
 
        if(isset($_POST['save'])){
            $connection = $this->OpenConnection();
            $STUDENTIDNumber = $_SESSION['login'];
            $Post = $_POST['TextArea'];
            $date = date("Y/m/d");
        
    
       
        $stmt = $connection->prepare("UPDATE `post_bio` SET `Post_Bio`=:Post_Bio,`date`=:date WHERE Student_Number = :STUDENTIDNumber");
        $stmt->execute([
            'STUDENTIDNumber' => $STUDENTIDNumber,
            'Post_Bio' => $Post,
            'date' => $date
                            
        ]);
    
       
            
        }
        
        }
    public function bio(){
        $connection = $this->OpenConnection();
        $STUDENTIDNumber = $_SESSION['login'];
        $stmt = $connection ->query("SELECT * FROM post_bio where Student_Number = '$STUDENTIDNumber' Limit 1" );
        
    
       while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
           echo $row['Post_Bio'];
       }
    }
    public function bioDate(){
        $connection = $this->OpenConnection();
        $STUDENTIDNumber = $_SESSION['login'];
        $stmt = $connection ->query("SELECT * FROM post_bio where Student_Number = '$STUDENTIDNumber' Limit 1" );
        
    
       while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
           echo $row['date'];
       }
    }

    public function CountAll(){
        $connection = $this->OpenConnection();
        $STUDENTIDNumber = $_SESSION['login'];
       
      $sql="SELECT * from classlist_Table where Student_Number ='$STUDENTIDNumber'";
      $stmt = $connection->prepare($sql);
      $stmt->execute(['STUDENTIDNumber' => $STUDENTIDNumber]);
      $user1 = $stmt->rowCount();

        echo $user1;
    }

    public function fetchAllRowData(){
        $connection = $this->OpenConnection();
        $STUDENTIDNumber = $_SESSION['login'];
       $stmt = $connection->query("SELECT* FROM classlist_table Where Student_Number = '$STUDENTIDNumber'");
       while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
     
       ?>
           <td><?php echo $row['Student_Number'];?></td>
           <td><?php echo $row['First_Name'];?></td>
           <td><?php echo $row['Last_Name'];?></td>
           <td><?php echo $row['Middle_Name'];?></td>
           <td><?php echo $row['Subject_Description'];?></td>
           <td><?php echo $row['Section'];?></td>
           <td><?php echo $row['Days'];?></td>
           <td><?php echo $row['Type'];?></td>
           <td><?php echo $row['Email_Address'];?></td>
           </tr>
           <?php 
           }
    }
   
}   

$student = new myStudent();
?>
