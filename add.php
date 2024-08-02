<?php
require'Login/includes/config.php';
    if(isset($_POST['add_user'])) 
    {
    
    $fname=$_POST['firstname'];
    $lname=$_POST['lastname'];   
    $email=$_POST['email']; 
    $password=($_POST['password']); 
    $gender=$_POST['gender']; 
    $dob=$_POST['dob']; 
    $uemail = $_POST['uemail'];
    $address=$_POST['address']; 
    $user_role='Employee'; 
    $phonenumber=$_POST['phonenumber']; 
    $status=1;
    
    // echo $uemail;

     $query = mysqli_query($conn,"select * from tbl_users where EmailId = '$email'")or die(mysqli_error());
     $count = mysqli_num_rows($query);
     
     $checkemail = "SELECT * FROM tbl_users WHERE uemail = '$uemail' ";
     $resultc = mysqli_query($conn, $checkemail);
     
     
     if(mysqli_num_rows($resultc) > 0){
         
          echo "<script>alert('Email is already taken'); window.location =  'index.php#cta';</script>;";
         
     }else{
         
         if ($count > 0){ ?>
     <script>
     alert('Username Already Exist'); window.location =  'index.php#cta';
    </script>
    <?php
      }else{
          
          
        $insertQuery = "INSERT INTO tbl_users(FirstName,LastName,EmailId,Password,Gender,Dob,Address,role,Phonenumber,Status, location, uemail) VALUES('$fname','$lname','$email','$password','$gender','$dob','$address','$user_role','$phonenumber','$status', 'NO-IMAGE-AVAILABLE.jpg', '$uemail') ";
        
        if(mysqli_query($conn, $insertQuery)){
            
            $to = $uemail;
                                    $subject = "Email Verification";
                                    
                                    $headers .= "MIME-Version: 1.0\r\n";
                                    $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
                                    $headers .= 'From: Anita The Game <anitathegame.online@gmail.com>';
                                    
                                    $message = '<html><body>';
                                    $message .= '<h1>Hello, World!</h1>';
                                    $message .= '</body></html>';
                                    
                                    $message = '<html><body>';
                                    
                                    $message .= '
                                    
                                        <div style="padding: 20px; background-color: #ddd;">
                                        <div style="background-color: white; border-radius: 10px">
                                            <div style="padding: 20px; border-bottom: solid 1px #ddd; font-size: 30px; font-family: Arial, Helvetica, sans-serif; color: skyblue;"><b>Anita</b></div>
                                            <div style="padding: 20px; font-family: Arial, Helvetica, sans-serif; color: gray;">
                                                <br>
                                                <div style="font-size: 25px;">
                                                    Verify Email
                                                </div>
                                                <div style="font-size: 18px;">
                                                    <p>
                                                        Welcome to Anita Homecoming, <br> '.$fname.' '.$lname.'!
                                                    </p>
                                                    <p>
                                                        To continue, please verify your email address 
                                                        by clicking the button below.
                                                    </p><br>
                                                    <div>
                                                       <a href="anitathegame.online/verify-email.php?username='.$email.'"><button style="padding: 15px; border-radius: 100px; border: solid 1px white; background-color: skyblue; color: white; font-size: 18px; ">
                                                        Verify Email Address
                                                    </button></a>
                                                    </div><br>
                                                    <p>
                                                        Thanks,<br>
                                                        Team Anita Homecoming
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    ';
                                    
                                    $message .= "</body></html>";
                                    
                                    
                                    if(mail($to, $subject, $message, $headers)){


                    
                // $notifs = "INSERT INTO `notif_status` (`noid`, `cause_id`, `status`, `kind`) VALUES (NULL, '$idCRED', '0', '1')";
                
                // if(mysqli_query($conn, $notifs)){
                     echo "<script>alert('Player Records Successfully Added'); window.location =  'index.php#cta';</script>;";
                // }
                
            }else{
                echo "error";
            }

            
            
           
            // echo "done!";
        }else{
            echo "error!";
        }
        
        
        ?>
        
        </script>
        <?php   }
         
     }
     
}

?>