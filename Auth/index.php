<?php


/*------------------------------------------------------------------------*/

/*-----  PHP AJAX login,registration using database by php-gym.com  ------*/

/*------------------------------------------------------------------------*/
	$error = "";
	$msg ="";
	error_reporting(0);

	if(isset($_POST) && isset($_POST['type'])){
		 $mysqli = new mysqli('localhost','apondifo_root','4qq^5jkX$==u','apondifo_referral_system');
		if($mysqli->connect_errno){
			echo '{"error":1,"message":"Unable to connect with database."}';
			exit();
		}
		if($_POST['type'] == "login" && isset($_POST['ID_NO'],$_POST['password'])){
			$e = htmlentities($_POST['ID_NO'],ENT_QUOTES);
			$p = md5($_POST['password']);
			$query = $mysqli->query("SELECT * FROM `auth` WHERE `ID/Passport No.` ='$e' AND Confirmed = 'YES' AND `Password`='$p'");
			
			if($query->num_rows ==1){
				@ob_start();
session_start();
				$_SESSION['db_login'] = $query->fetch_assoc();
				echo '{"error":0,"redir":"okk"}';
			}else{
				echo '{"error":1,"message":"Invalid ID No. or Password or Wait to be confirmed first"}';
			}
			
		}
		else if($_POST['type'] == "reset" && isset($_POST['ID_NO'],$_POST['passwrd'],$_POST['password_again'])){
			
			$e = htmlentities($_POST['ID_NO'],ENT_QUOTES);
			$p = md5($_POST['passwrd']);
 

			if(strlen($_POST['ID_NO']) < 4 || strlen($_POST['ID_NO']) > 20){
			
					echo '{"error":1,"message":"ID/Passport number must between 4 & 20 characters.","focus":"MRS"}';
				
			}
			else if(strlen($_POST['passwrd']) < 4 || strlen($_POST['passwrd']) > 15){
			
					echo '{"error":1,"message":"Password must between 4 & 15 characters.","focus":"passwrd"}';
			
			}else if($_POST['passwrd'] != $_POST['password_again']){
			
					echo '{"error":1,"message":"Password not matched","focus":"password_again"}';
			
			}
			else{
			$query = $mysqli->query(" SELECT 'Password' FROM auth WHERE `ID/Passport No.`='$e'");
            if($query->num_rows ==1)
            {
			$query = $mysqli->query("UPDATE auth SET Password='$p' WHERE `ID/Passport No.`='$e'");
			 echo '{"error":0,"message":"Password Changed Successfull","redir":"none"}';
			}
		  else{
		  	echo '{"error":1,"message":"Unsuccssfull, Passport/ID No. not found "}';
		  }		
		  

		}
			
		}else if($_POST['type']=="register" && isset($_POST['ID_NO'],$_POST['Phone_Number'],$_POST['facility'],$_POST['facility1'],$_POST['email'],$_POST['firstname'],$_POST['lastname'],$_POST['passwd'],$_POST['confpasswd'])){
			
			$_POST['firstname'] = htmlentities($_POST['firstname'],ENT_QUOTES);
			$_POST['lastname'] = htmlentities($_POST['lastname'],ENT_QUOTES);
			$_POST['ID_NO'] = htmlentities($_POST['ID_NO'],ENT_QUOTES);
			$_POST['facility1'] = htmlentities($_POST['facility1'],ENT_QUOTES);
			$_POST['email'] = htmlentities($_POST['email'],ENT_QUOTES);
			$_POST['Phone_Number'] = htmlentities($_POST['Phone_Number'],ENT_QUOTES);
			$_POST['facility'] = htmlentities($_POST['facility'],ENT_QUOTES);
			$_POST['passwd'] = htmlentities($_POST['passwd'],ENT_QUOTES);
			
			$f = $_POST['firstname'];
			$l = $_POST['lastname'];
			$r = $_POST['Phone_Number'];
			$w = $_POST['facility1'];
			$g = $_POST['email'];
			$n = $_POST['facility'];
			$other=$_POST['specify'];
			$e = $_POST['ID_NO'];
			$p = md5($_POST['passwd']);
				$query = $mysqli->query("SELECT * FROM `auth` WHERE `ID/Passport No.` ='$e'");
				if($query->num_rows > 0){
					echo '{"error":1,"message":"ID/Passport No. already exists.","focus":"ID_NO"}';
				}else if(strlen($_POST['firstname']) < 4 || strlen($_POST['firstname']) > 25){
		
					echo '{"error":1,"message":"Firstname must between 4 & 25 characters.","focus":"firstname"}';
				
				}else if(strlen($_POST['lastname']) < 4 || strlen($_POST['lastname']) > 15){
			
					echo '{"error":1,"message":"Lastname must between 4 & 15 characters.","focus":"lastname"}';
				
				}
				else if(strlen($_POST['facility']) < 2 || strlen($_POST['facility']) > 30){
			
					echo '{"error":1,"message":"Invalid Facility name","focus":"lastname"}';
				
				}
				
				else if(strlen($_POST['passwd']) < 4 || strlen($_POST['passwd']) > 15){
			
					echo '{"error":1,"message":"Password must between 4 & 15 characters.","focus":"passwd"}';
			
				}else if($_POST['passwd'] != $_POST['confpasswd']){
			
					echo '{"error":1,"message":"Password not matched","focus":"confpasswd"}';
				
				}
				else{
				     $qw= $mysqli->query("INSERT INTO `auth`(`Firstname`, `Lastname`, `Designation`,`Facility`, `ID/Passport No.`,`Email`, `Phone_Number`, `Confirmed`, `Password`)  VALUES ('$f','$l','$w $other','$n','$e','$g','$r','NO','$p')");
				       if ($qw) {
				       	
                         	    
                         	$to = "bakarisalim91@gmail.com";
                        
                         	    
                        
                            $subject = "New user signed up!";
                            $message = '<html><body><center>';          
                            $message .= '<table rules = "all" border="0" cellpadding="10">';
                            $message .= "<tr style='background: #eee;'><td colspan='2'><strong>Dear Admin!</strong></td></tr>";
                            $message .= "<tr><td colspan='2'><strong>New user</strong> has Signed up in Clinical Referral System! Kindly confirm him or her. </td></tr>";                
                            $message .= "<tr><td>Want to visit the system now??  <a href='www.apondiform.com/Clinical/Auth'>Click here</a></td></tr>";
                             $message .= "</table>";             
                            $message .= "</center></body></html>";   
                            $headers .= "MIME-Version: 1.0\r\n";
                            $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
                            mail($to, $subject, $message, $headers) or die("Error!");
                         	
                         	 echo '{"error":0,"message":"Registration completed successful!! Kindly wait for a confirmation mail","redir":"none"}';
                         	# code...
                         
							

				       	# code...
				       }
			            
                        

                   
			
			}
			
		}
		
		exit();
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Universal Care Referral System</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
    
	<!-- Include stylesheets for better appearance of login form -->
    
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/animate.css" rel="stylesheet">
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<style type="text/css">
		body{padding-top:20px;background-color:#f9f9f9;}
	</style>
	
	<script src="js/jquery-1.11.3.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	
</head>
<body>
	<h4 class="text-center" style="color: black"><b>Universal Care Referral System</b></h4>                  
	<div class="w3-container">
	    <div class="w3-card-4">
		<div id="loginbox" style="margin-top:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2"> 
			
           <div class="panel panel-info" >
                	<div class="panel-heading">
                        <div class="panel-title">Sign In<div class="pull-right"><a href="../Adminlogin.php">Admin??</a></div></div>
                  	</div>     
			<div style="padding-top:30px" class="panel-body">
			      <?php echo $msg;?>
                    <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>
                            
                    <form id="loginform" class="form-horizontal" role="form">
                                    
				<div style="margin-bottom: 25px" class="input-group">
					<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                        <input id="login-username" type="text" class="form-control" name="ID_NO" value="" placeholder="ID/Passport No.">                                        
				</div>
                                
				<div style="margin-bottom: 25px" class="input-group">
					<span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                        <input id="login-password" type="password" class="form-control" name="password" placeholder="password">
				</div>

                <div style="margin-top:10px" class="form-group">
                                    <!-- Button -->
					<div class="col-sm-12 controls">
						<input type="hidden" name="type" value="login">
						<button type="submit" id="btn-login" class="btn btn-success pull-right" >Login </button>
					</div>
                </div>
                                
                <div class="form-group" style="margin-bottom:0px;">
					<div class="col-md-12 control">
						<div style="border-top: 1px solid #bce8f1; padding-top:15px; padding-left:10px; font-size:85%; margin: 0 -15px;" >Forgot your password! 
							<a href="#" onClick="$('#loginbox').hide(); $('.panel').removeClass('animated shake'); $('#forgot').show()" style = "color:blue">Click here</a>
                       </div>
						<div style="border-top: 1px solid #bce8f1; padding-top:15px; padding-left:10px; font-size:85%; margin: 0 -15px;" >Don't have an account! 
							<a href="#" onClick="$('#loginbox').hide(); $('.panel').removeClass('animated shake'); $('#signupbox').show()" style ="color:blue">Sign Up Here</a>
                       </div>
                       
                                    	
                    </div>
                </div>    
			</form>     
			</div>                     
		</div>  
        	</div>
       <div id="forgot" style="display:none; margin-top:50px" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2"> 
		        <br>                   
        <div class="panel panel-info" >
            <div class="panel-heading">
                <div class="panel-title">Reset Password</div>
            </div>     
			<div style="padding-top:30px" class="panel-body">
			      <?php echo $msg;?>  
                <div style="display:none" id="forgot-alert" class="alert alert-danger col-sm-12"></div>                        
                <form id="forgot" class="form-horizontal" role="form">
                                 
				<div style="margin-bottom: 25px" class="input-group">
					<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                        <input id="login-username" type="text" class="form-control" name="ID_NO" value="" placeholder="ID/Passport No.">                                        
				</div>
                                
				<div style="margin-bottom: 25px" class="input-group">
					<span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                        <input id="login-password" type="password" class="form-control" name="passwrd" placeholder="new password">
				</div>
				<div style="margin-bottom: 25px" class="input-group">
					<span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                        <input id="login-password" type="password" class="form-control" name="password_again" placeholder="Confirm new password">
				</div>
				  <div style="margin-top:10px" class="form-group">
                                    <!-- Button -->
					<div class="col-sm-12 controls" >
						<input type="hidden" name="type" value="reset">
						<button type="submit" id="btn-forgot" class="btn btn-success pull-right" >Reset</button>
					</div>
                                </div>
                                <div class="form-group" style="margin-bottom:0px;">
					<div class="col-md-12 control">
						<div style="border-top: 1px solid #bce8f1; padding-top:15px; padding-left:10px; font-size:85%; margin: 0 -15px;" >Back login page! 
							<a href="#" onClick="$('#loginbox').show(); $('.panel').removeClass('animated shake'); $('#signupbox').hide();$('#forgot').hide()" style = "color: blue">Click here</a>
                                       		</div>
                                    	</div>
                                </div>    
			</form>     
			</div>                     
		</div>  
        	</div>
		<div id="signupbox" style="display:none; margin-top:50px" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
			<div class="panel panel-info">
				<div class="panel-heading">
					<div class="panel-title">Sign Up</div>
                       </div>  
                       <div class="panel-body" >
					    <form id="signupform" class="form-horizontal" name="signup" role="form" style="text-align:left;">
						  <div id="signupalert" style="display:none" class="alert alert-danger">
							<p>Error:</p>
							<span></span>
						</div>
						      <div class="form-group">
							    <label for="firstname" class="col-md-4 control-label">First Name</label>
							   <div class="col-md-8">
								<input type="text" class="form-control" name="firstname" placeholder="First Name">
							   </div>
						       </div>
						     <div class="form-group">
				                <label for="lastname" class="col-md-4 control-label">Last Name</label>
				                	    <div class="col-md-8">
				                        	<input type="text" class="form-control" name="lastname" placeholder="Last Name">
				                    	</div>
				              </div>
				              <div class="form-group">
							 <label for="Facility" class="col-md-4 control-label">Designation</label>
							     <div class="col-md-8">
                                <select name="facility1" class="form-control login-field" id="login-form" required >
                                 <option value="" selected>Select</option><br>
                       	          <option value="Doctor">Doctor</option>
                    	          <option value="Clinical Officer" >Clinical Officer</option>
                                  <option value="Nurse">Nurse</option>
                                  <option value="Retention/Outreach worker">Retention/Outreach worker</option>
                                  <option value="">Other (Specify)</option>
                                 </select>
                                
                                 </div>
                             </div>
                           <div class="form-group" id="other">
                           	  <label class="col-md-4 control-label">Specify:</label>
                              	<div class="col-md-8">
                                <input type="none" name="specify" placeholder="Specify" class="form-control"  id="specify" /></div>
                            </div>
                             <div class="form-group">
				                <label for="facility" class="col-md-4 control-label">Facility</label>
				                	  <div class="col-md-8">
				                        	<input type="text" class="form-control" name="facility" placeholder="Your Facility">
				                    </div>
				               </div>
						      <div class="form-group">
				                <label for="ID_NO" class="col-md-4 control-label">ID/Passport No.</label>
				                	  <div class="col-md-8">
				                        	<input type="text" class="form-control" name="ID_NO" placeholder="National ID/Password Number">
				                    </div>
				               </div>
				               <div class="form-group">
				                <label for="email" class="col-md-4 control-label">Email Address</label>
				                	  <div class="col-md-8">
				                        	<input type="email" class="form-control" name="email" placeholder="Email address">
				                    </div>
				               </div>
				               <div class="form-group">
				                <label for="Phone_Number" class="col-md-4 control-label">Phone No.</label>
				                	  <div class="col-md-8">
				                        	<input type="number" class="form-control" name="Phone_Number" placeholder="Phone Number">
				                    </div>
				               </div>
				            
				                <div class="form-group">
				                	<label for="password" class="col-md-4 control-label">Password</label>
				                	<div class="col-md-8">
				                		<input type="password" class="form-control" name="passwd" placeholder="Password">
				                	</div>
				                </div>
				                <div class="form-group">
				                	<label for="password" class="col-md-4 control-label">Confirm Password</label>
				                	<div class="col-md-8">
				                		<input type="password" class="form-control" name="confpasswd" placeholder="Confirm Password">
				                	</div>

				                </div>				                
				                
				                <div class="form-group">
				                	<!-- Button -->                                        
				                	<div class="col-md-offset-4 col-md-8">
				                		<input type="hidden" name="type" value="register">
				                        	<button id="btn-signup"  type="submit" class="btn btn-info pull-right"><i class="glyphicon glyphicon-hand-right "></i> &nbsp;Sign Up</button>
				                	</div>
				                </div>
						<div class="form-group" style="margin-bottom:0px;">
							<div class="col-md-12 control">
								<div style="border-top: 1px solid #bce8f1; padding-top:15px; padding-left:10px; font-size:85%; margin: 0 -15px;" >Already have an account! 
									<a href="#" onClick="$('#signupbox').hide();$('#forgot').hide();$('.panel').removeClass('animated shake'); $('#loginbox').show()" style="color:blue">Login Here</a>
				                       		</div>
				                    	</div>
				                </div> 
                   
					</form>
                         	</div>
			</div>
		</div>
		</div>
	</div>
	 <script type="text/javascript">
         window.onload=function() {
         var other = document.getElementById('other');;
            other.style.display = 'none';
           document.getElementsByName('facility1')[0].onchange = function() {other.style.display = (this.value=='')? '' : 'none'};
};
</script>

	<script>
		$('form').submit(function(e){
			e.preventDefault();
			var $this = $(this);
			$this.parent().parent().removeClass('animated shake');
			$this.parent().find('.alert').remove();
			var submit = true;
			var form = document.getElementsByName('signup')[0];

			var btn = $(this).find('button');
			$this.find('input[type="text"],input[type="password"]').attr('style','');
		
			$this.find('input[type="text"],input[type="password"]').each(function(){
				if($(this).val()==""){
					$(this).focus().css({'border-color':'#f44','box-shadow':'0 0 8px #f44'});
					submit = false;
					$this.parent().parent().addClass('animated shake');
					return false;
				}
			
			});
			if(submit == true){
				btn.button('loading');
				$.post('index.php',$(this).serialize(),function(data){
					if(data.error == 1){
						$this.parent().prepend('<div class="alert alert-danger">'+data.message+'</div>');
						$this.parent().parent().addClass('animated shake');
						if(data.focus && data.focus != "undefined"){
							$('input[name="'+data.focus+'"]').focus().css({'border-color':'#f44','box-shadow':'0 0 8px #f44'});
						}
					}else{
						if(data.redir == "okk"){
							$this.parent().prepend('<div class="alert alert-success">Login successfull, redirecting...</div>');
							window.location = 'home.php';
						}else{

                            	$this.parent().prepend('<div class="alert alert-success">'+data.message+'</div>');

							
						}
					}
				},"JSON").error(function(){
					alert('Request not complete.');
				}).always(function(){
                    form.reset();
					btn.button('reset')
					 });
			}
			setTimeout(function(){
				
			},100)
			
		});
	</script>
</body>
</html>
