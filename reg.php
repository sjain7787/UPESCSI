<?php
$connection = mysqli_connect("localhost","upescit8_upescsi","UPESCSI@2021s");
$db = mysqli_select_db($connection,'upescit8_register');

if(isset($_POST['reg']))
{
    $name = $_POST['name'];
    $email = $_POST['email'];
    $contact = $_POST['contact'];
    $sap = $_POST['sap'];
    $year = $_POST['year'];
    $member = $_POST['member'];
    $course = $_POST['course'];
    $mode = $_POST['mode'];
    $transaction = $_POST['transaction'];
    $dob = $_POST['dob'];
    $sex = $_POST['sex'];
    
    $result = mysqli_query($connection, "SELECT * FROM `register` WHERE `email`= '".$email."' OR `sap` = '".$sap."' ") or die("Cannot connect to database!");
    
    $user_count = mysqli_num_rows($result);

     $fileName = basename($_FILES["ss"]["name"]); 
            $fileType = pathinfo($fileName, PATHINFO_EXTENSION); 
         
        // Allow certain file formats 
            $allowTypes = array('jpg','png','jpeg', 'gif', 'jfif'); 

    if ($user_count==0) {
   

    if(in_array($fileType, $allowTypes)){ 
                $image = $_FILES['ss']['tmp_name']; 
                $imgContent = addslashes(file_get_contents($image)); 
    
        $sql = mysqli_query($connection, "INSERT INTO register (`name`, `email`, `contact`, `sap`, `year`, `member`, `course`, `mode`,`transaction`,`dob`,`sex`,`ss`) VALUES('".$name."','".$email."','".$contact."','".$sap."','".$year."','".$member."','".$course."','".$mode."','".$transaction."','".$dob."','".$sex."','". $imgContent."')") or die("Cannot connect1 to database!");

   
        if($sql){ 
               
         header('location:Thank.html');
        }
            }else{ 
           echo"<script>alert('Sorry, only JPG, JPEG, PNG, JFIF, & GIF files are allowed to upload.');window.location='registration.html';</    script>";     
     
            } 
   
    } 

        else{
        echo"<script>alert('EMAIL ID/SAP ALREADY EXIST!');window.location='index.html';</script>";
    }    
    }


?>