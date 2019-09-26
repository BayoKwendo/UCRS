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

   require_once 'includes/header.php'; ?>

<div class="row">
	<div class="col-md-12">
		<div class="col-md-8 col-sm-offset-2">
			<!-- <div class="search_box ">
                    <form method="post" id="searchform" action="adminreceived.php" class="text-right">  
                        <input type="text" name="filter" placeholder="Search Client" maxlength="100" id="search">
                      
                        <button type="submit" name="submit" id="submit"><i class="fa fa-search"></i></button>
                    
                    </form>
			  </div><hr> -->
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
		<div class="panel panel-default">
			<div class="panel-heading">
				<i class="glyphicon glyphicon-check"></i>Transfer In/Out Report
			</div>
			<!-- /panel-heading -->
			<div class="panel-body">
				
				<form class="form-horizontal" action="php_action/getOrderReport.php" method="post" id="getReportForm">
				   <div class="form-group">
				    <label for="facility" class="col-sm-2 control-label">Facility</label>
				     <div class="col-sm-10">
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
				  <div class="form-group">
				     <label for="transfer" class="col-sm-2 control-label">Transfer</label>
				     <div class="col-sm-10">
				    <select name="transfer" class="form-control"  required >
                      <option value="" selected>Select</option><br>
                      <option value="Transferred In" >Transferred In</option>
                      <option value="Transferred Out">Transferred Out</option>
                     </select>
				    </div>
				  </div>
				  <div class="form-group">
				    <label for="startDate" class="col-sm-2 control-label">Start Date</label>
				    <div class="col-sm-10">
				      <input type="text" class="form-control" id="startDate" name="startDate" placeholder="Start Date" />
				    </div>
				  </div>
				  <div class="form-group">
				    <label for="endDate" class="col-sm-2 control-label">End Date</label>
				    <div class="col-sm-10">
				      <input type="text" class="form-control" id="endDate" name="endDate" placeholder="End Date" />
				    </div>
				  </div>
				  <div class="form-group">
				    <div class="col-sm-12"><br>
				      <button type="submit" name="button" class="btn btn-success pull-right" id="generateReportBtn"> <i class="glyphicon glyphicon-ok-sign"></i> Generate</button>
				    <a href="adminreceived.php" class="btn btn-primary pull-left"><i class="glyphicon glyphicon-hand-left"></i> home</a>
				    </div>
				  </div>
				</form>

			</div>
			<!-- /panel-body -->
		</div>
	</div>
	<!-- /col-dm-12 -->
</div>
<!-- /row -->

<script src="custom/js/reports.js"></script>

