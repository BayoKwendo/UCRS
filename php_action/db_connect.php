
<?php 

  if(!isset($_SESSION['db_login'])){
    echo  '<script> window.location="Auth/index.php";</script>';
    exit();
  }
  elseif (isset($_SESSION['tttt']) && (time() - $_SESSION['tttt'] >= 1800)) {
    echo  '<script> window.location="Auth/logout.php";</script>'; 
  }
   $_SESSION['tttt'] = time();
$conn=new mysqli('localhost','apondifo_root','4qq^5jkX$==u','apondifo_referral_system');
 ?>