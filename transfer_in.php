<?php
@ob_start();
session_start();
   require_once 'php_action/db_connect.php';
   ?>
<?php
  $clientID = $_GET['clientid'];

  if(!empty($clientID)){
    $sqlSelectSpecClient = mysqli_query($conn, "select * from transfer_out where id = '$clientID'") or die(mysqli_error());
    $sqlchangestatus =  mysqli_query($conn, "UPDATE `transfer_out` SET `Confirmation`= 'YES' WHERE ID = '$clientID'") or die(mysqli_error());;
    $getClientInfo = mysqli_fetch_array($sqlSelectSpecClient);
    
    $facity1=$getClientInfo["Facility_transferred_out"];
    $date1=$getClientInfo['Date_of_Birth'];
    $date2=$getClientInfo['Date_enrolled_into_clinic'];
    $phone1=$getClientInfo['phone_number']; 
    $idno=$getClientInfo['Id_No.'];
    $date3=$getClientInfo['Date_initiated_into_Haart'];
    $regimen=$getClientInfo['Regimen'];
    $vl=$getClientInfo['Last_VL_Count'];
    $vltest=$getClientInfo['Date_of_VL_Test'];
    $comment=$getClientInfo['Additional_Comment2'];


  }
 ?>
<!DOCTYPE html>
<html>

	<head>
		    <title>Universal Care Referral System</title>
        <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
     <link rel="stylesheet" href="css/bootstrap.min.css" media="screen" >
        <link rel="stylesheet" href="css/bootstrap.min.css" media="screen" >
        <link rel="stylesheet" href="css/font-awesome.min.css" media="screen" >
        <link rel="stylesheet" href="css/animate-css/animate.min.css" media="screen" >
        <link rel="stylesheet" href="css/icheck/skins/flat/blue.css" >
         <link href="font/css/font-awesome.css" rel="stylesheet" />
          <link rel="stylesheet" href="css/toastr/toastr.min.css" media="screen" >
        <link rel="stylesheet" href="css/main.css" media="screen" >
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
         <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/js/bootstrap-select.min.js"></script>
       <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/css/bootstrap-select.min.css" rel="stylesheet" />
        <script src="js/modernizr/modernizr.min.js"></script>
            <script type="text/javascript">
         window.onload=function() {
         var other = document.getElementById('other');;
            other.style.display = 'none';
           document.getElementsByName('designation')[0].onchange = function() {other.style.display = (this.value=='')? '' : 'none'};
};
</script>

	</head>
        </head>
    <body style="background-color: #f9f9f9" >

        <header>
      
		<!-- <body>
		</head>
        <header>
            <section id="stuck_container">
				  <!=============================
							  Stuck menu
				  ==========================	<div class="container" id="navver"">
					
						  <div class="row">
							<div class="col-md-12 ">
							  <!-................Nav..............-->
				
								 <!--  -->
			<!--  -->	 
			<section>
				<div class="container">
					<div class="col-md-12">
             
						 <div class="col-md-8 col-md-offset-2" style="background-color:#CCFFFF">
              <br><a href="Auth/logout.php" class="color-danger text-center pull-right"><i class="fa fa-sign-out"></i> Logout</a>
						       <?php 
                            if (@$_GET['action']=='true') {
                                  echo "<h5 class='text-center' style='color: green'>Data saved successful.. please continue</h5>";
                 # code...
                                 }
                                  ?>
					<h5 class="h5 text-center" style="color: darkblue"><b>UCRS Transfer In Form</b></h5>              
			    <form action="connect.php" method="POST">
		        <div class="col-md-8 col-md-offset-2 form-group">
		          <br><label>Date transferred In:</label>
				  <input type="date" name="date1" placeholder="Enter date" class="form-control" class="form-control login-field"  id="login-email" required />
				  <span class="help-block" id="error"></span>
				</div> 
                <div class="col-md-8 col-md-offset-2 form-group">
                  <br><label>Facility transferred TO:</label>
                   <select name="facility1" class="form-control login-field selectpicker" id="login-form" data-live-search="true" required >
                                <option value="" selected>Select</option><br>
                                <option data-tokens="Ampath Module 1" value="Ampath Module 1" >Ampath Module 1</option>
                                <option data-tokens="Ampath Module 2" value="Ampath Module 2">Ampath Module 2</option>
                                <option data-tokens="Ampath Module 3" value="Ampath Module 3" >Ampath Module 3</option>
                                <option data-tokens="Ampath Module 4" value="Ampath Module 4" >Ampath Module 4</option>
                                <option data-tokens="Rafiki Center" value="Rafiki Center">Rafiki Center</option>
                                <option data-tokens="TB Clinic" value="TB Clinic" >TB Clinic</option>
                                <option data-tokens="MCH" value="MCH" >MCH</option>
                                <option data-tokens="Research (ACTG; AMC)" value="Research (ACTG; AMC)">Research (ACTG; AMC)</option>
                                <option data-tokens="Oncology" value="Oncology" >Oncology</option>
                                <option data-tokens="MTRH" value="MTRH" >MTRH</option>
                      </select>
                </div>
                <div class="col-md-8 col-md-offset-2 form-group">
                  <br><label>Facility transferred FROM:</label>
                  <input type="text" name="facility2"  class="form-control login-field" id="login-no" value="<?php echo $facity1; ?>" required disabled />
                  <span class="help-block" id="error"></span>
                </div>
               <div class="col-md-8 col-md-offset-2 form-group">
                 <br><h4><b>Demographics:</b></h4>                   
				  <label><b>Date of Birth:</b></label>
                  <input type="date" name="Date_of_birth" value="<?php echo $date1; ?>" class="form-control login-field" id="login-no" required disabled />
                  <span class="help-block" id="error" disabled></span>
                </div>
                <div class="col-md-8 col-md-offset-2 form-group" class="row">
                   <br><label>Gender:</label><br> 
                   <i style="font-size: ">Male</i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input name="genders" class="sub" type="radio" value="Male" required="">
                   <br>
                   <i style="font-size: ">Female</i>&nbsp;&nbsp;&nbsp;&nbsp;<input name="genders" class="sub" type="radio" value="Female" required="">
                </div>
			    <div class="col-md-8 col-md-offset-2 form-group">
				   <br><label> CCC No/Hospital No:</label>
					<input type="text" name="cccNo" placeholder="CCC No/Hospital No" class="form-control login-field" id="id" />
				    <br>
					<span class="help-block" id="error"></span>
				</div>
				<div class="col-md-8 col-md-offset-2 form-group">
			                  
					<label>Phone Number:</label>
					<input type="Number" name="phone1" value="<?php echo $phone1; ?>" class="form-control login-field"  id="fullname" required/>		
				</div>
               <div class="col-md-8 col-md-offset-2 form-group">
                        
                  <br><label>ID Number(Optional):</label>
                  <input type="Number" name="idno" value="<?php echo $idno; ?>" class="form-control login-field"  id="fullname" />   
              </div>
			  <div class="col-md-8 col-md-offset-2 form-group">
                  <br><h4><b>HIV Care Information:</b></h4>
					<label>Date enrolled into care</label>
					<input type="Date" name="date3" value="<?php echo $date2; ?>" class="form-control" class="form-control login-field"  id="login-email" required disabled />
   			  </div>
              <div class="col-md-8 col-md-offset-2 form-group">
                    <br><h4><b> ART Summary: </b></h4>  
                    <label>Date initiated on HAART:</label>
                    <input type="Date" name="date4" value="<?php echo $date3; ?>" class="form-control login-field"  id="fullname" disabled />   
              </div>
		      <div class="col-md-8 col-md-offset-2 form-group">
                    <label><b>Regimen:</b></label>
                    <input type="text" name="regimen" value="<?php echo $regimen; ?>" class="form-control login-field"  id="regimen" disabled /> 
              </div>
              <div class="col-md-8 col-md-offset-2 form-group">
                    <label><b>Last VL Count:</b></label>
                    <input type="Number" name="vl" value="<?php echo $vl; ?>" class="form-control login-field"  id="vl" disabled/> 
              </div>
               <div class="col-md-8 col-md-offset-2 form-group">
                    <label><b>Date of Last VL Test:</b></label>
                    <input type="date" name="vltest" value="<?php echo $vltest; ?>" class="form-control login-field"  id="vl" disabled/> 
              </div>
               <div class="col-md-8 col-md-offset-2 form-group">
                <label><b>Additional Comment:</b></label> 
                  <textarea type="text" name="vltextarea" >
                    <?php echo $comment; ?>

                  </textarea>
              </div>

              <div class="col-md-8 col-md-offset-2 form-group">
                    <br><h4><b>Contact Person:</b></h4>            
                    <label>FullName:</label>
                    <input type="text" name="fullname" placeholder="Enter name" class="form-control login-field"  id="fullname" required/>   
              </div>
              <div class="col-md-8 col-md-offset-2 form-group">
                    <br><label>Designation:</label>
                    <select name="designation" class="form-control login-field" id="login-form" required >
                            <option value="" selected>Select</option><br>
                       	    <option value="Doctor">Doctor</option>
                    	    <option value="Clinical Officer" >Clinical Officer</option>
                            <option value="Nurse">Nurse</option>
                            <option value="Retention/Outreach worker">Retention/Outreach worker</option>
                            <option value="">Other</option>
                    </select>
                                
               </div>
                   <div class="col-md-8 col-md-offset-2 form-group">
                              <label id="other">Specify:<br>
                               <input type="text" name="specify" placeholder="Specify" class="form-control login-field"  id="specify" />
                             </label>
                            </div>
               <div class="col-md-8 col-md-offset-2 form-group">
                  <br><label>Phone Number:</label>
                  <input type="Number" name="phonenumber" placeholder="Enter Phone No." class="form-control login-field"  id="fullname" required/>   
              </div>
               <div class="col-md-8 col-md-offset-2 form-group">
                <label><b>Additional Comment:</b></label> 
                  <textarea type="text" name="textarea" required="" >
                  </textarea>
              </div>
              <div class="text-right"> 
			  <div class="col-md-4 col-md-offset-4 form-group">
			    <br><br><input type="submit" name="btn-register" class="col-md-10 col-md-offset-2 btn btn-primary btn-small" value="Submit" /><br><br><br>
			  </div>					
		      </div>
              

			  </form>
			  </div>
			  </div>
			  </div>
			</section>
			<footer>
		</div>
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
        <script>
            $(function(){

                // Counter for dashboard stats
                $('.counter').counterUp({
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
                toastr["success"]( "Thank you for Confirmation that you have receive the client! Kindly proceed and fill his/her transferred in form below");

            });
        </script>
          <style type="text/css">
          textarea{
            width: 100%;
            height: 80px;
            padding: 12px 20px;
            box-sizing: border-box;
            border: 2px solid #ccc;
            border-radius: 4px;
            background-color: #ffffff;
            font-size: 16px;
            resize: none;
          }
        </style>
	</html>