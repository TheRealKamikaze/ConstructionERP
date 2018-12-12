<?php 
	$architect = 'architect';
	include 'connection.php';
	$sql = "SELECT * FROM announcement WHERE employeeType = '$architect'";
	$result = mysqli_query($conn, $sql);
	if(mysqli_num_rows($result) > 0)
	{
			echo '<div class="container-fluid">
					<div class="row">
						<div class="col-md-12">
            				<table class="table table-striped table-condensed">
               					<thead>
					                  <tr>
					                      <th style="width:10%;">Name</th>
					                      <th style="width:10%;">Position</th>
					                      <th style="width:30%;">Announcement</th>                                          
					                  </tr>
              					</thead>   
              					<tbody>';
            while($row = mysqli_fetch_assoc($result))
            {
            	echo '<tr>
		                    <td style="width:10%;">'.$row['employeeName'].'</td>
		                    <td style="width:10%;">'.$row['employeeType'].'</td>
		                    <td style="width:30%;">'.$row['announcement'].'</td>';
				echo "</tr>";                                   
            }
            echo "				</tbody>
            				</table>
            			</div>
				</div>
			</div>";

	}
	else
	{
		echo '<div class="container-fluid">
				<div class="row">
					<h2>No Logs found!</h2>
				</div>
			  </div>';
	}
?>