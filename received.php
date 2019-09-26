<?php
@ob_start();
session_start();
   require_once 'php_action/db_connect.php';
   ?>
<!DOCTYPE html>
 <html>
	<head>
	<title>Universal Care Referral FORM</title>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width,initial-scale=1">
		<link href="css/1.css" rel="stylesheet" type="text/css" />
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		 <link href="css/1.css" rel="stylesheet" type="text/css" />
		<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
		 <link href="font/css/font-awesome.css" rel="stylesheet" />
		<link href='https://fonts.googleapis.com/css?family=Roboto+Condensed:400,700,300'
		rel='stylesheet' type='text/css' />
		 <link rel="shortcut icon" href="images/asawa.jpg"/>
		 <link rel="stylesheet" href=".css"/>
		 <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
 <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" />
 <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/js/bootstrap-select.min.js"></script>
		 <br>
		  	<div class="container">
		  		<a href="home.php" class="btn btn-primary pull-left"><i class="glyphicon glyphicon-hand-left"></i> home</a>
		  		<body style="background-color: #f9f9f9">
				<!-- <div class="search_box ">
                    <form method="post" id="searchform" action="received.php" class="text-right">
                        
                        <input type="Date" name="filter" placeholder="Search..." maxlength="100" id="search">
                      
                        <button type="submit" name="submit" id="submit"><i class="fa fa-search"></i></button>
                    
                    </form>
			    </div> -->
			</div>
			<hr>
			<div class="container">
			  	<div class="col-md-6 col-md-offset-3">
		         <div class="panel panel-success">
			      <div class="panel-heading">
				   <a  style="text-decoration:none;color:black;">
					Received
					 <span class="badge pull pull-right"><?php
					 $clinicNameID = $_GET['clinicid'];  
					 $result = mysqli_query($conn, "SELECT * FROM transfer_out WHERE Facility_transferred_in = '$clinicNameID' AND Confirmation = 'NO' ");
					 $countClient = $result->num_rows; echo $countClient; ?></span> 	
				   </a>
			      </div> <!--/panel-hdeaing-->
		          </div> <!--/panel-->
		         </div>
		     </div>
		    

		  <style type="text/css">
            #search{
              max-width: 40%;
              border: 1px solid maroon;
               border-bottom-left-radius: 8px;
               border-top-left-radius: 8px;
            }
            #submit{
              background: maroon;
              border: 1px solid maroon;
              color: white;
              text-decoration: bold;
              margin-left: -7px;
              cursor: pointer;
              border-bottom-right-radius: 8px;
              border-top-right-radius: 8px;
            }
            #submit:hover{
              background: lightblue;
             /* transition: all 0.45s;*/
            }
        </style>
			<!--/header-middle-->
			<div class="container">
           <?php
          //$filter = isset($_POST['filter']) ? $_POST['filter'] : '';
				if(isset($_POST['submit']))
				{
					$filter = $_POST['filter'];
					$result = mysqli_query($conn, "SELECT * FROM transfer_out where Date_of_Birth like '%$filter%' or  Gender like '%$filter%'");
                          if($result->num_rows == 0) 
                            {
                                echo "<h3 class='text-center' style='color:red'>Results for $filter not found</h3>";
	          	            }
						
                    
				}
				else
				{
					
                    $clinicNameID = $_GET['clinicid'];

                    if(!empty($clinicNameID))
                      {
                      $sqlSelectSpecClinic = mysqli_query($conn, "select * from transfer_out where Facility_transferred_in = '$clinicNameID' and Confirmation = 'NO' ");
                      $getClientInfo = mysqli_fetch_array($sqlSelectSpecClinic);
                      $countClient = $sqlSelectSpecClinic->num_rows;
    
                      }


                }
					
				if($sqlSelectSpecClinic->num_rows >0){
					?>
				        <div class=" container">
					      <div class="row">
				           <div class="col-md-10 col-md-offset-1">
                            <table class="table table-bordered table-responsive">
                                 <thead class="bg-primary">
                                 <th>Date of Birth</th>
                                 <th>Gender</th>
                                 <th></th>
                                </thead>
                            <tbody>
                <?php				
				while($row=mysqli_fetch_array($result)){
					$clientID = $row["ID"];
					echo '
                            <tr>
                            <td class="text-center"> '.$row['Date_of_Birth'].'</td>
                            <td class="text-center">'.$row['Gender'].'</td>
					        <td class="text-center"><a id="btn" class="confirmation" href="transfer_in.php?clientid='.$clientID.'">Confirm?</a></td>
					        </tr>
                            
                              <script type="text/javascript">
        	                   $(".confirmation").on("click", function(){
        		                 return confirm("Are you sure?");
        	                    });
                               </script>
					        ';	

					}
					       ?>
					       </tbody>
					        </table>
					       </div>
				         </div>
				         </div>
				         <?php
				}
				else{
                      echo  '<script> window.location="referral.php?action=success";</script>';

				}
				?>
            </div> 
        </div></div>