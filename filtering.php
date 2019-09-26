<?php
@ob_start();
session_start();
	        require_once 'php_action/db_connect.php';
	        $result = mysqli_query($conn, "SELECT * FROM transfer_out ");
			$countClient = $result->num_rows;
			   if($result)
				{				
				 
					   $clinicNameID = $_GET['facility1']; ;
					    echo  '<script> window.location="received.php?clinicid='.$clinicNameID.'";</script>';
                    
                }    
					  ?>
					     