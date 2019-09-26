<?php 
					$filter = $_POST['filter'];
					$result = mysqli_query($bd, "SELECT * FROM transfer_out where Date_of_Birth like '%$filter%' or  Gender like '%$filter%'");
                          if($result->num_rows == 0) 
                            {
                                echo "<h3 class='text-center' style='color:red'>Results for $filter not found</h3>";
	          	              }
	          	              else{
	          	              	echo "string";
	          	               	# code...
	          	               }
 ?>