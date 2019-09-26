<?php
@ob_start();
session_start();

if(!isset($_SESSION['userId'])){
    echo  '<script> window.location="Auth/index.php";</script>';
    exit();
  }
  elseif (isset($_SESSION['tttt']) && (time() - $_SESSION['tttt'] >= 1800)) {
    echo  '<script> window.location="Auth/logout.php";</script>'; 
  }
   $_SESSION['tttt'] = time();
$conn=new mysqli('localhost','apondifo_root','4qq^5jkX$==u','apondifo_referral_system');

   
  ?>
<!DOCTYPE html>
 <html>
	<head>
	<title>Universal Care Referral System</title>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width,initial-scale=1">
		<link href="css/1.css" rel="stylesheet" type="text/css" />
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		 <link href="css/1.css" rel="stylesheet" type="text/css" />
		<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
		 <link href="font/css/font-awesome.css" rel="stylesheet" />
		<link href='https://fonts.googleapis.com/css?family=Roboto+Condensed:400,700,300'
		rel='stylesheet' type='text/css' />
		 <link rel="stylesheet" href="css/toastr/toastr.min.css" media="screen" >
		<link rel="stylesheet" href="css/icheck/skins/line/green.css" >
		 <link rel="shortcut icon" href="images/asawa.jpg"/>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
 <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" />
 <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/js/bootstrap-select.min.js"></script>

		 <link rel="stylesheet" href=".css"/>
		 <br>
		  	<div class="container">
		  		<body style="background-color: #f9f9f9">
             <a href="report.php" class="color-primary"> <i class=" glyphicon glyphicon-check"></i><b> Report </b></a>
		  			<div class="pull-right">
		  			<a href="logout.php" class="color-danger" style="color: red"><i class="fa fa-sign-out"></i> Logout</a>
		  		</div><hr>
				<div class="search_box ">
                    <form method="post" id="searchform" action="adminreceived.php" class="text-right">  
                        <input type="text" name="filter" placeholder="Search..." maxlength="100" id="search">
                      
                        <button type="submit" name="submit" id="submit"><i class="fa fa-search"></i></button>
                    
                    </form>
			    </div> 
			</div>
			<hr>
			<div class="container">
			  	<div class="col-md-6 col-md-offset-3">
		         <div class="panel panel-success">
			      <div class="panel-heading">
				  	 <a href="product.php" style="text-decoration:none;color:black;">
        Registered Users
					 <span class="badge pull pull-right"><?php
					 $result = mysqli_query($conn, "SELECT * FROM `auth` WHERE  Confirmed = 'NO' ");
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
					$result = mysqli_query($conn, "SELECT * FROM `auth` where Designation like '%$filter%' or Phone_Number like '%$filter%' or Firstname like '%$filter%' or Lastname like '%$filter%'");
                          if($result->num_rows == 0) 
                            {
                                echo "<h3 class='text-center' style='color:red'>Results for $filter not found</h3>";
	          	            }
						
                    
				}
				else
				{
					
                   
                      $sqlSelectSpecClinic = mysqli_query($conn, "select * from auth where Confirmed = 'NO' ");
                      $getClientInfo = mysqli_fetch_array($sqlSelectSpecClinic);
                      $countClient = $sqlSelectSpecClinic->num_rows;

                }
					
				if($countClient >0){
					?>
				        <div class=" container">
					      <div class="row">
				           <div class="col-md-10 col-md-offset-1">
                            <table class="table table-bordered table-responsive">
                                 <thead class="bg-primary">
                                 <th>Firstname</th>
                                 <th>Lastname</th>
                                 <th>Designation</th>
                                 <th>Facility</th>
                                 <th>ID/Passport No.</th>
                                 <th>Phone No.</th>
                                 <th>Confirmation</th>
                                </thead>
                            <tbody>
                <?php				
				while($row=mysqli_fetch_array($result)){
					$userID = $row["ID"];
					echo '
                            <tr>
                            <td class="text-center"> '.$row['Firstname'].'</td>
                            <td class="text-center">'.$row['Lastname'].'</td>
                            <td class="text-center"> '.$row['Designation'].'</td>
                            <td class="text-center"> '.$row['Facility'].'</td>
                            <td class="text-center">'.$row['ID/Passport No.'].'</td>
                            <td class="text-center"> '.$row['Phone_Number'].'</td>
					                  <td class="text-center"><a class="confirmation" href="confirmation.php?userid='.$userID.'">Confirm?</a></td>
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
                 echo "<h3 class='text-center' style='color:red'>There is NO user registered recently! Kindly visit later</h3>";
                  
				}
				?>
               </div>
              </body>
              <script src="js/jquery/jquery-2.2.4.min.js"></script>
        <script src="js/jquery-ui/jquery-ui.min.js"></script>
        <script src="js/bootstrap/bootstrap.min.js"></script>
        <script src="js/pace/pace.min.js"></script>
        <script src="js/lobipanel/lobipanel.min.js"></script>
        <script src="js/iscroll/iscroll.js"></script>

        <!-- ========== PAGE JS FILES ========== -->
        <script src="js/prism/prism.js"></script>
        <script src="js/waypoint/waypoints.min.js"></script>
        <script src="js/counterUp/jquery.counterup.min.js"></script>
        <script src="js/amcharts/amcharts.js"></script>
        <script src="js/amcharts/serial.js"></script>
        <script src="js/amcharts/plugins/export/export.min.js"></script>
        <link rel="stylesheet" href="js/amcharts/plugins/export/export.css" type="text/css" media="all" />
        <script src="js/amcharts/themes/light.js"></script>
        <script src="js/toastr/toastr.min.js"></script>
        <script src="js/icheck/icheck.min.js"></script>
        <!-- ========== THEME JS ========== -->
        <script src="js/main.js"></script>
        <script src="js/production-chart.js"></script>
        <script src="js/traffic-chart.js"></script>
        <script src="js/task-list.js"></script>
         <?php 
               if (@$_GET['action']=='true') {
                       echo'
        <script>
            $(function(){

                // Counter for dashboard stats
                $(".counter").counterUp({
                    delay: 10,
                    time: 3000
                });

                // Confirmation notification
                toastr.options = {
                  "closeButton": true,
                  "debug": false,
                  "newestOnTop": false,
                  "progressBar": false,
                  "positionClass": "toast-top-right",
                  "preventDuplicates": false,
                  "onclick": null,
                  "showDuration": "2000",
                  "hideDuration": "2000",
                  "timeOut": "5000",
                  "extendedTimeOut": "2000",
                  "showEasing": "swing",
                  "hideEasing": "linear",
                  "showMethod": "fadeIn",
                  "hideMethod": "fadeOut"
                }
                toastr["success"]( "User confirmed successful");

            });
        </script>';}?>
          </div>
      </head>
    </html>

