<?php
@ob_start();
session_start();
   require_once 'php_action/db_connect.php';
   ?>
<!DOCTYPE html>
 <html>
  <head>
    <?php require_once 'includes/headers.php'; ?>
        <div class="container">
          <div class="search_box ">
                    <form method="post" id="searchform" action="search.php" class="text-right">  
                        <input type="text" name="filter" placeholder="Search..." maxlength="100" id="search">
                      
                        <button type="submit" name="submit" id="submit"><i class="fa fa-search"></i></button>
                    
                    </form>
          </div> 
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
   

        

<!-- add product -->
<div class="modal fade" id="addProductModal" tabindex="-1" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <form method="post" id="searchform" action="search.php" >  
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h5 class="modal-title"><i class="fa fa-search"></i> Search Client</h5>
         </div>
         <div class="modal-body text-center" style="max-height:450px; overflow:auto;">

                        <input type="text" name="filter" placeholder="Search..."  id="search">
                      
                        <button type="submit" name="submit" id="submit"><i class="fa fa-search"></i></button>
                    </div>
                    </form>
        
                
    </div> <!-- /modal-content -->    
  </div> <!-- /modal-dailog -->
</div> 
<!-- /add categories -->
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
      <div class="container">
          <div class="col-md-6 col-md-offset-3">
             <div class="panel panel-success">
            <div class="panel-heading">
           <a  style="text-decoration:none;color:black;">
          Number of Clients
           <span class="badge pull pull-right"><?php
           $result = mysqli_query($conn, "SELECT * FROM transfer_out ");
           $countClient = $result->num_rows; echo $countClient; ?></span>   
           </a>
            </div> <!--/panel-hdeaing-->
              </div> <!--/panel-->
             </div>
         </div>
        

      <!--/header-middle-->
      <div class="container">
           <?php
          //$filter = isset($_POST['filter']) ? $_POST['filter'] : '';
        if(isset($_POST['submit']))
        {
          $filter = $_POST['filter'];
          $result = mysqli_query($conn, "SELECT * FROM `transfer_out` where `Date_of_Birth` like '%$filter%' or  `CCC/Hosp_No` like '%$filter%' or  `phone_number` like '%$filter%' or  `Gender` like '%$filter%'");
                          if($result->num_rows == 0) 
                            {
                                echo "<h3 class='text-center'  style='color:red'>Results for $filter not found</h3>";
                          }
            
                    
        }
        else
            {?>
                      <script type="text/javascript">
                      $(document).ready(function(){
                     $('#addProductModal').modal('show');
                     });
                  </script>          
                  <?php  
                      $sqlSelectSpecClinic = mysqli_query($conn, "select * from transfer_out");
                      $getClientInfo = mysqli_fetch_array($sqlSelectSpecClinic);
                      $countClient = $sqlSelectSpecClinic->num_rows;
    
                  

                }
          
        if($countClient >0){
          ?>
                <div class=" container">
                <div class="row">
                   <div class="col-md-12">
                            <table class="table table-bordered table-responsive">
                                 <thead class="bg-primary">
                                 <th>Date of Birth</th>
                                 <th>Gender</th>
                                 <th>CCC No</th>
                                 <th>Phone No</th>
                                </thead>
                            <tbody>
                <?php       
        while($row=mysqli_fetch_array($result)){
          echo '
                            <tr>
                            <td class="text-center"> '.$row['Date_of_Birth'].'</td>
                            <td class="text-center">'.$row['Gender'].'</td>
                            <td class="text-center">'.$row['CCC/Hosp_No'].'</td>
                             <td class="text-center">'.$row['phone_number'].'</td>
                             </tr>
                            
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

          echo "<h3 class='text-center' style='color:red'>Zero clients present!</h3>";
          

        }
        ?>
            </div> 
        </div></div>