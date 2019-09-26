<?php
@ob_start();
session_start();

$conn=new mysqli('localhost','apondifo_root','4qq^5jkX$==u','apondifo_referral_system');
 
  if(!isset($_SESSION['db_login'])){
    echo  '<script> window.location="Auth/index.php";</script>';
    exit();
  }
  elseif (isset($_SESSION['tttt']) && (time() - $_SESSION['tttt'] >= 1800)) {
    echo  '<script> window.location="Auth/logout.php";</script>'; 
  }
   $_SESSION['tttt'] = time();
 ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Universal Care Referral System</title>
        <link rel="stylesheet" href="css/bootstrap.min.css" media="screen" >
        <link rel="stylesheet" href="css/font-awesome.min.css" media="screen" >
        <link rel="stylesheet" href="css/animate-css/animate.min.css" media="screen" >
        <link rel="stylesheet" href="css/icheck/skins/flat/blue.css" >
         <link href="font/css/font-awesome.css" rel="stylesheet" />
          <link rel="stylesheet" href="css/toastr/toastr.min.css" media="screen" >
        <link rel="stylesheet" href="css/main.css" media="screen" >
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
 <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" />
 <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/js/bootstrap-select.min.js"></script>
 <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/css/bootstrap-select.min.css" rel="stylesheet" />
        <script src="js/modernizr/modernizr.min.js"></script>
    </head>
      

    <body class="">
        <div class="main-wrapper">

            <div class="login-bg-color bg-black-300">
                <div class="container">
                    <div class="col-md-4 col-md-offset-4">
                        <div class="panel login-box" >
                           <div class="panel-heading">
                                <div class="panel-title text-center">
                                    <h5><b>Universal Care Referral System</b></h5><br>
                                </div>
                           </div>
                           <div class="panel-body p-20">
                           <form action="filtering.php" method="get">
                             <div class="form-group">
                               <label  style="color: black"><b>Facility:</b></label>
                             <div style="margin-bottom: 25px" class="input-group">

                              <span class="input-group-addon"><i class="glyphicon glyphicon-search"></i></span>
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
                     </div>  
                             <div class="form-group mt-20">
                             <div class="">   
                              <button type="submit" class="btn btn-success btn-labeled pull-right">Proceed<span class="btn-label btn-label-right"><i class="fa fa-check"></i></span></button>
                              <div class="clearfix"></div>
                              </div>
                            </div>
                            </form>
                                <hr>
                                    <p>Want to transfer out??<a href="referral.php" style="color: blue">click here</a></p><br>
                                   <a href="search.php" class="color-primary"> <i class=" glyphicon glyphicon-search"></i> Search </a>
                                   <div class="pull-right">
                                   <a href="Auth/logout.php" class="color-danger text-center"><i class="fa fa-sign-out"></i> Logout</a>
                                   </div>
                            </div>
                        </div>
                        <!-- /.panel -->
                        <p class="text-muted text-center"><small style="color: white">Copyright © </a><?php echo date('Y'); ?></small></p>
                        <p class="text-muted text-center"><small style="color: white">Contact us: 0714366973</small></p>

                    </div>
                    <!-- /.col-md-6 col-md-offset-3 -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /. -->

        </div>
        <!-- /.main-wrapper -->

        <!-- ========== COMMON JS FILES ========== -->
        <script src="js/jquery/jquery-2.2.4.min.js"></script>
        <script src="js/jquery-ui/jquery-ui.min.js"></script>
        <script src="js/bootstrap/bootstrap.min.js"></script>
        <script src="js/pace/pace.min.js"></script>
        <script src="js/lobipanel/lobipanel.min.js"></script>
        <script src="js/iscroll/iscroll.js"></script>

        <!-- ========== PAGE JS FILES ========== -->
        <script src="js/icheck/icheck.min.js"></script>

        <!-- ========== THEME JS ========== -->
        <script src="js/main.js"></script>
        <script>
            $(function(){
                $('input.flat-blue-style').iCheck({
                    checkboxClass: 'icheckbox_flat-blue'
                });
            });
        </script>
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
               if (@$_GET['action']=='success') {
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
                toastr["success"]( "Data saved successful!");

            });
        </script>';} 
        elseif(@$_GET['action']=='true'){
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
                toastr["success"]( "Welcome to Universal Care Referral System");

            });
        </script>';

        } ?>

        <!-- ========== ADD custom.js FILE BELOW WITH YOUR CHANGES ========== -->
    </body>
</html>
