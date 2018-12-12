<?php
	if(isset($_POST['employeeName']))
	{
		echo '<div class="container">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <h3>Name</h3>
                                            </div>
                                            <div class="col-md-4">
                                                <h3 style="color:blue;">'.$_POST['employeeName'].'</h3>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <h3>Email ID</h3>
                                            </div>
                                            <div class="col-md-4">
                                                <h3 style="color:blue;">'.$_POST['employeeEmailId'].'</h3>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <h3>Phone No.</h3>
                                            </div>
                                            <div class="col-md-4">
                                                <h3 style="color:blue;">'.$_POST['employeePhoneNo'].'</h3>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <h3>Profession</h3>
                                            </div>
                                            <div class="col-md-4">
                                                <h3 style="color:blue;">'.$_POST['employeeType'].'</h3>
                                            </div>
                                        </div>
				</div>';
				//echo "hello ".$_POST['employeeName'];
	}
?>