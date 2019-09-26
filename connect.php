<?php 
 @ob_start();
session_start(); 
  require_once 'php_action/db_connect.php';
 $date1=$_POST['date1'];
 $facity1=$_POST['facility1']; 
 $facilty2=$_POST['facility2'];
 $date2=$_POST['Date_of_birth'];
 $gender=$_POST['genders'];
 $cccNo=$_POST['cccNo'];
 $phone1=$_POST['phone1']; 
 $idno=$_POST['idno'];
 $date3=$_POST['date3'];
 $date4=$_POST['date4'];
 $regimen=$_POST['regimen'];
 $vl=$_POST['vl'];
 $full_name=$_POST['fullname'];
 $designation=$_POST['designation'];
 $other=$_POST['specify'];
 $phone2=$_POST['phonenumber'];
 $additional_comment=$_POST['textarea'];
 $vltst=$_POST['vltest'];
 $additional_comment2=$_POST['vltextarea'];
      
      if(isset($_POST['submitout']))
        {
                 $sql= "INSERT INTO `transfer_out`(`Date_transferred_out`, `Facility_transferred_out`, `Facility_transferred_in`, `Date_of_Birth`, `Gender`, `CCC/Hosp_No`, `phone_number`, `Id_No.`, `Date_enrolled_into_clinic`, `Date_initiated_into_Haart`, `Regimen`, `Last_VL_Count`,`Date_of_VL_Test`, `Additional_Comment2`, `Fullname`, `Designation`, `mobile_number`, `Additional_comment`, `Confirmation`) VALUES ('$date1','$facity1','$facilty2','$date2','$gender','$cccNo','$phone1','$idno','$date3','$date4','$regimen','$vl','$vltst','$additional_comment2','$full_name','$designation $other','$phone2','$additional_comment','NO')";

                  if(!$conn->query($sql))
                    {
	                 die("Couldnt insert into database".$conn->error);
                    }
                  else
                    {  
  // echo "You Have registered successful:";                                   
                     echo  '<script> window.location="home.php?action=success";</script>';
  
                    }
            }
          else 
            {   
                  $sql= "INSERT INTO `transfer_in`(`Date_transferred_in`, `Facility_transferred_in`, `Facility_transferred_out`, `Date_of_Birth`, `Gender`, `CCC/Hosp_No`, `phone_number`, `Id_No.`, `Date_enrolled_into_clinic`, `Date_initiated_into_Haart`, `Regimen`, `Last_VL_Count`,`Date_of_VL_Test`, `Additional_Comment2`, `Fullname`, `Designation`, `mobile_number`, `Additional_comment`) VALUES ('$date1','$facity1','$facilty2','$date2','$gender','$cccNo','$phone1','$idno','$date3','$date4','$regimen','$vl','$vltst','$additional_comment2','$full_name','$designation $other','$phone2','$additional_comment')";
                  
                  if(!$conn->query($sql))
                    {
	                 die("Couldnt insert into database".$conn->error);
                    }
                  else
                    {  
                    
                    echo  '<script> window.location="home.php?action=success";</script>';
  
                    }
            	# code...
            }  
                    ?>
                                 
