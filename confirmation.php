<?php
$conn=new mysqli('localhost','apondifo_root','4qq^5jkX$==u','apondifo_referral_system');
 ?>

<?php
  $userID = $_GET['userid'];
 
  if(!empty($userID)){

    $sqlSelectSpecClient = mysqli_query($conn, "select * from auth where ID = '$userID'") or die(mysqli_error());
    $sqlchangestatus =  mysqli_query($conn, "UPDATE `auth` SET `Confirmed`= 'YES' WHERE ID = '$userID'") or die(mysqli_error());;
    $getClientInfo = mysqli_fetch_array($sqlSelectSpecClient);

    $facity1=$getClientInfo["Email"];
    $facity=$getClientInfo["Firstname"];
    $facit1=$getClientInfo["Lastname"];
    
                         	    $to =  $facity1 ;
                            $subject = "CONFIRMATION! Universal Care Referral System";
                            $message = '<html><body><center>';          
                            $message .= '<table rules = "all" border="0" cellpadding="10">';
                            $message .= "<tr style='background: #eee;'><td colspan='2'><strong>Dear " .$facity." ".$facit1.",</strong></td></tr>";
                            $message .= "<tr><td colspan='2'><strong>This</strong> email confirm that your account is now activated. You can now use your credentials that you used while registering to login into the system.</td></tr>";                
                            $message .= "<tr><td>Want to visit the system now??  <a href='www.apondiform.com/Clinical/Auth'>Click here</a></td></tr>";
                             $message .= "</table>";             
                            $message .= "</center></body></html>";   
                            $headers .= "MIME-Version: 1.0\r\n";
                            $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
                            mail($to, $subject, $message, $headers) or die("Error!");
                         	
                         	 
           echo  '<script> window.location="adminreceived.php?action=true";</script>'; 
                  
         
  }
 ?>