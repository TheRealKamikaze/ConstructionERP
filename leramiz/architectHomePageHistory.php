<?php  
	if(isset($_POST['employeeName']))
	{
		include 'connection.php';
		$employeeName = $_POST['employeeName'];
		$employeeEmailId = $_POST['employeeEmailId'];
		$employeePhoneNo = $_POST['employeePhoneNo'];
		$employeeType = $_POST['employeeType'];

		$sql = "SELECT * FROM logs WHERE employeeName = '$employeeName' AND employeeType = '$employeeType'";
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
					                      <th style="width:10%;">Date of log</th>
					                      <th style="width:10%;">Change made</th>
					                      <th style="width:10%;">Log ID</th>
					                      <th style="width:10%;">Status</th>                                          
					                  </tr>
              					</thead>   
              					<tbody>';
            while($row = mysqli_fetch_assoc($result))
            {
            	echo '<tr>
		                    <td style="width:10%;">'.$row['employeeName'].'</td>
		                    <td style="width:10%;">'.$row['changeDate'].'</td>
		                    <td style="width:10%;">'.$row['changeMade'].'</td>
		                    <td style="width:10%;">'.$row['logId'].'</td>';
				if($row['isVerified'] == 0)
					echo '<td style="width:10%;"><span class="label label-success">Not Verified</span></td>';
				else
					echo '<td style="width:10%;"><span class="label label-success">Verified</span></td>';
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
			echo '<div class="container">
					<div class="row">
						<h2>No Logs found!</h2>
					</div>
				  </div>';
		}
	}

?>
<!-- <div class="container">
	<div class="row">
		<div class="span5">
            <table class="table table-striped table-condensed">
               <thead>
                  <tr>
                      <th>Username</th>
                      <th>Date registered</th>
                      <th>Role</th>
                      <th>Status</th>                                          
                  </tr>
              </thead>   
              <tbody>
                <tr>
                    <td>Donna R. Folse</td>
                    <td>2012/05/06</td>
                    <td>Editor</td>
                    <td><span class="label label-success">Active</span>
                    </td>                                       
                </tr>
                <tr>
                    <td>Emily F. Burns</td>
                    <td>2011/12/01</td>
                    <td>Staff</td>
                    <td><span class="label label-important">Banned</span></td>                                       
                </tr>
                <tr>
                    <td>Andrew A. Stout</td>
                    <td>2010/08/21</td>
                    <td>User</td>
                    <td><span class="label">Inactive</span></td>                                        
                </tr>
                <tr>
                    <td>Mary M. Bryan</td>
                    <td>2009/04/11</td>
                    <td>Editor</td>
                    <td><span class="label label-warning">Pending</span></td>                                       
                </tr>
                <tr>
                    <td>Mary A. Lewis</td>
                    <td>2007/02/01</td>
                    <td>Staff</td>
                    <td><span class="label label-success">Active</span></td>                                        
                </tr>                                   
              </tbody>
            </table>
            </div>
	</div>
</div> -->