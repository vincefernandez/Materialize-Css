<?php

class myStudent
{

    private $server = "mysql:host=localhost;dbname=studentdb";
    private $user = "root";
    private $pass = "";

    private $option = array(
        PDO::ATTR_ERRMODE =>
        PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE =>
        PDO::FETCH_ASSOC
    );
    protected $con;

    public function OpenConnection()
    {

        try {

            $this->con = new PDO($this->server, $this->user, $this->pass, $this->option);
            return $this->con;
        } catch (PDOException $e) {
            echo "ERROR:" . $e->getMessage();
        }
    }

    public function closeConnection($con)
    {

        $this->$con = null;
    }

    public function getUsers()
    {


        $STUDENTIDNumber = $_SESSION['login'];
        $connection = $this->OpenConnection();
        $stmt = $connection->prepare("SELECT * From classlist_table where Student_Number = '$STUDENTIDNumber'");
        $stmt->execute();
        $users = $stmt->fetchAll();
        $userCount = $stmt->rowCount();

        if ($userCount > 0) {
            return $users;
        } else {
            return 0;
        }
    }

    public function loginUser()
    {


        $connection = $this->OpenConnection();


        if (isset($_POST['Submit'])) {
            $Student_Number = $_POST['studno'];

            $First_Name = $_POST['Fname'];
            $Last_Name = $_POST['Lname'];


            $stmt = $connection->prepare("SELECT * FROM classlist_table where Student_Number = ? AND First_Name = ? AND Last_Name =?");
            $stmt->execute([$Student_Number, $First_Name, $Last_Name]);
            $user = $stmt->fetch(); //Accessing the INFO
            $total = $stmt->rowCount();
            if (isset($_SESSION['login'])) {
                echo "You've already Loggin";
                header("location: /index.php");
            }
            if ($total > 0) {


                session_start();
                $_SESSION['login'] = $Student_Number;
                $STUDENTIDNumber = $_SESSION['login'];
                header("location: pages/dashboardBS.php");

                $this->get_user_data($user);
            } else {
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
    public function get_user_data()
    {

        if (!isset($_SESSION)) {
            session_start();
        }
        if (isset($_SESSION['login'])) {
            return $_SESSION['login'];
        } else {
            return null;
        }
    }


    public function logout()
    {

        if (!isset($_SESSION)) {
            session_start();
        }

        $_SESSION['login'] = null;
        unset($_SESSION['login']);
    }
    public function getFullName()
    {

        $connection = $this->OpenConnection();
        if (!isset($_SESSION['login'])) {

            $variableAwit =  "<li><a href='login.php'>Login</li></a>";
            return $variableAwit;
        }
        $STUDENTIDNumber = $_SESSION['login'];
        $stmt = $connection->query("SELECT * FROM classlist_table WHERE Student_Number = '$STUDENTIDNumber' LIMIT 1");

        while ($row = $stmt->fetch()) {
            echo $row['First_Name'] . " " . $row['Last_Name'];
        }
    }

    public function getStudentNumberData()
    {


        $STUDENTIDNumber = $_SESSION['login'];
        $connection = $this->OpenConnection();


        $stmt = $connection->query("SELECT * FROM classlist_table WHERE Student_Number = '$STUDENTIDNumber' LIMIT 1");

        while ($row = $stmt->fetch()) {
            echo $row['First_Name'] . " " . $row['Last_Name'];
        }
    }


    public function getSessionName()
    {


        $connection = $this->OpenConnection();
        if (!isset($_SESSION['login'])) {

            $variableAwit =  "<li><a href='login.php'>Login</li></a>";
            return $variableAwit;
        }
        $STUDENTIDNumber = $_SESSION['login'];
        $stmt = $connection->query("SELECT * FROM classlist_table WHERE Student_Number = '$STUDENTIDNumber' LIMIT 1");

        while ($row = $stmt->fetch()) {
            $awit = $row['First_Name'] . " " . $row['Last_Name'];
            return $awit;
        }
    }


    public function InsertBio()
    {


        if (isset($_POST['save'])) {

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




    public function SubmitBio()
    {


        if (isset($_POST['save'])) {
            $connection = $this->OpenConnection();
            $STUDENTIDNumber = $_SESSION['login'];

            $sql = "SELECT * from post_bio where Student_Number ='$STUDENTIDNumber'";
            $stmt = $connection->prepare($sql);
            $stmt->execute(['STUDENTIDNumber' => $STUDENTIDNumber]);
            $user1 = $stmt->rowCount();

            if ($user1 === 1) {
                $this->UpdateBio();
            } else {

                $this->InsertBio();
            }
        }
    }


    public function UpdateBio()
    {


        if (isset($_POST['save'])) {
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
    public function bio()
    {


        $connection = $this->OpenConnection();
        $STUDENTIDNumber = $_SESSION['login'];
        $stmt = $connection->query("SELECT * FROM post_bio where Student_Number = '$STUDENTIDNumber' Limit 1");


        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo $row['Post_Bio'];
        }
    }
    public function bioDate()
    {


        $connection = $this->OpenConnection();
        $STUDENTIDNumber = $_SESSION['login'];
        $stmt = $connection->query("SELECT * FROM post_bio where Student_Number = '$STUDENTIDNumber' Limit 1");


        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo $row['date'];
        }
    }

    public function CountAll()
    {

        $connection = $this->OpenConnection();
        $STUDENTIDNumber = $_SESSION['login'];

        $sql = "SELECT * from classlist_Table where Student_Number ='$STUDENTIDNumber'";
        $stmt = $connection->prepare($sql);
        $stmt->execute(['STUDENTIDNumber' => $STUDENTIDNumber]);
        $user1 = $stmt->rowCount();

        echo $user1;
    }

    public function fetchAllRowData()
    {

        $connection = $this->OpenConnection();
        $STUDENTIDNumber = $_SESSION['login'];
        $stmt = $connection->query("SELECT* FROM classlist_table Where Student_Number = '$STUDENTIDNumber'");
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {

?>
            <td><?php echo $row['Student_Number']; ?></td>
            <td><?php echo $row['First_Name']; ?></td>
            <td><?php echo $row['Last_Name']; ?></td>
            <td><?php echo $row['Middle_Name']; ?></td>
            <td><?php echo $row['Subject_Description']; ?></td>
            <td><?php echo $row['Section']; ?></td>
            <td><?php echo $row['Days']; ?></td>
            <td><?php echo $row['Type']; ?></td>
            <td><?php echo $row['Email_Address']; ?></td>
            </tr>
        <?php
        }
    }
    public function Schedule()
    {

        $connection = $this->OpenConnection();
        $STUDENTIDNumber = $_SESSION['login'];
        $stmt = $connection->query("SELECT* FROM classlist_table Where Student_Number = '$STUDENTIDNumber'");
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {

        ?>


            <td><?php echo $row['Subject_Code']; ?></td>
            <td><?php echo $row['Subject_Description']; ?></td>
            <td><?php echo $row['Section']; ?></td>
            <td><?php echo $row['Days']; ?></td>
            <td><?php echo $row['Type']; ?></td>

            </tr>
<?php
        }
    }
    public function Upload()
    {




        if (isset($_POST["imageUpload"]) && !empty($_FILES["file"]["name"])) {
            $file = $_FILES['file'];
            $fileName = $_FILES['file']['name'];
            $fileTmpName = $_FILES['file']['tmp_name'];
            $fileSize = $_FILES['file']['size'];
            $fileError = $_FILES['file']['error'];
            $fileType = $_FILES['file']['type'];
            $fileExit = explode('.', $fileName);
            $fileActualExit = strtolower(end($fileExit));

            $allowed = array('jpg', 'JPG', 'jpeg', 'png', 'Png', 'gif');
            if (in_array($fileActualExit, $allowed)) {
                if ($fileError === 0) {
                    if ($fileSize < 1000000) {
                        $fileNameNew = uniqid('', true) . '.' . $fileActualExit;
                        $fileDestination = '../uploads/' . $fileNameNew;

                        if (move_uploaded_file($fileTmpName, $fileDestination)) {
                            $connection = $this->OpenConnection();
                            $STUDENTIDNumber = $_SESSION['login'];
                            $date = date("Y/m/d");
                            $count = $this->CountUploadedImage();
                            if ($count > 0) {
                                //  UpdateImage
                                $stmt1 = $connection->prepare("UPDATE `upload_file` SET `File`=:File,`date`=:date WHERE Student_Number = :STUDENTIDNumber");
                                if ($stmt1->execute([
                                    'STUDENTIDNumber' => $STUDENTIDNumber,
                                    'date' => $date,
                                    'File' => $fileNameNew


                                ])) {
                                    echo "<script> alert ('Success')</script>";
                                } else {
                                    echo "<script> alert ('Error')</script>";
                                }
                            } else {
                                //  Insert IF still no Upload Image
                                $stmt = $connection->prepare("INSERT INTO upload_file(Student_Number,date,File) VALUE(:STUDENTIDNumber, :date, :File)");

                                if ($stmt->execute([
                                    'STUDENTIDNumber' => $STUDENTIDNumber,
                                    'date' => $date,
                                    'File' => $fileNameNew

                                ])) {
                                    echo "<script> alert ('Success')</script>";
                                } else {
                                    echo "<script> alert ('Error')</script>";
                                }
                            }
                        }
                    } else {
                        echo "File is too big";
                    }
                } else {
                    echo "Error Uploading the File";
                }
            } else {
                echo "failed Upload";
            }
            // print_r($file);
        }
    }

    public function CountUploadedImage()
    {
        $connection = $this->OpenConnection();
        $STUDENTIDNumber = $_SESSION['login'];

        $sql = "SELECT * from upload_file where Student_Number ='$STUDENTIDNumber'";
        $stmt = $connection->prepare($sql);
        $stmt->execute(['STUDENTIDNumber' => $STUDENTIDNumber]);
        $user1 = $stmt->rowCount();

        return $user1;
    }
    public function UploadImage()
    {
        $connection = $this->OpenConnection();
        $STUDENTIDNumber = $_SESSION['login'];

        $sql = "SELECT * from upload_file where Student_Number ='$STUDENTIDNumber' limit 1";
        $stmt = $connection->prepare($sql);
        $stmt->execute(['STUDENTIDNumber' => $STUDENTIDNumber]);
        $user1 = $stmt->rowCount();
        // var_dump($user1);
        $noPicture = "<img src='../uploads/noimage_person.png' class='img-fluid max-width' alt='Responsive image' style='height:350px'>";
        if ($user1 < 1) {
            echo "$noPicture";
        }
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $a = $row['File'];
            $getPicture =    "<img src='../uploads/$a' class='img-fluid max-width' alt='Responsive image' style='height:350px'>";


            if ($user1 > 0) {
                echo "$getPicture";
            } else {
                echo "$noPicture";
            }
        }
    }

    public function UploadAvatar()
    {
        $connection = $this->OpenConnection();
        $STUDENTIDNumber = $_SESSION['login'];

        $sql = "SELECT * from upload_file where Student_Number ='$STUDENTIDNumber' limit 1";
        $stmt = $connection->prepare($sql);
        $stmt->execute(['STUDENTIDNumber' => $STUDENTIDNumber]);
        $user1 = $stmt->rowCount();
        // var_dump($user1);
        $noPicture = "<img class='img-profile rounded-circle' src='../uploads/noimage_person.png'>";
        if ($user1 < 1) {
            echo "$noPicture";
        }
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $a = $row['File'];
            $getPicture =    "<img class='img-profile rounded-circle' src='../uploads/$a'>";


            if ($user1 > 0) {
                echo "$getPicture";
            } else {
                echo "$noPicture";
            }
        }
    }
}

$student = new myStudent();
?>