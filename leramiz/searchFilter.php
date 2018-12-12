<?php 

					// if($_SERVER['REQUEST_METHOD'] == "POST")
					// {
						if(isset($_POST['name']) || isset($_POST['location']))
						{
							//echo "inside phpScript<br>";
							$locationisSet = 0;
							$projectNameisSet = 0;
							$valueFound = 0;
							if(!empty($_POST['location']))
							{
								$location = $_POST['location'];
								$locationisSet = 1;
								//echo "location not empty<br>";
							}
							if(!empty($_POST['name']))
							{
								$projectName = $_POST['name'];
								$projectNameisSet = 1;
								//echo "name not empty<br>";
							}

						  include 'connection.php';
						  if($projectNameisSet == 1 && $locationisSet == 1)
						  {
						  	$sql = "SELECT * from project where projectName = '$projectName' and projectLocation = '$location' ";
						  	$result = mysqli_query($conn,$sql);
						  	if (mysqli_num_rows($result) > 0) 
						  	{
						  		$valueFound = 1;
						  		echo '<section class="properties-section spad" id="results">
										<div class="container">
											<div class="section-title text-center">
												<h3>PROPERTIES</h3>
											</div>
											<div class="row">';
						    
						  		while($row = mysqli_fetch_assoc($result)) 
						  		{
						  			echo '
						  				  <div class="col-md-6">
												<div class="propertie-item set-bg" data-setbg="'.$row['projectImage'].'">
													<div class="sale-notic">'.$row['architectName'].'</div>
													<div class="propertie-info text-white">
														<div class="info-warp">
															<h5><a role="button" id="getProjectDetails" href="enquiryForm.php?name='.$row['projectName'].'&link='.$row['projectImage'].'">'.$row['projectName'].'</a></h5>
															<p><i class="fa fa-map-marker"></i> '.$row['projectLocation'].'</p>
														</div>
														<div class="price">$'.$row['projectPrice'].'</div>
													</div>
												</div>
										  </div>';
						  		}
						  	}
						  }
						  if($projectNameisSet == 1 && $locationisSet == 0)
						  {
						  	$sql = "SELECT * from project where projectName = '$projectName' ";
						  	$result = mysqli_query($conn,$sql);
						  	if (mysqli_num_rows($result) > 0) 
						  	{
						  		$valueFound = 1;
						  		echo '<section class="properties-section spad" id="results">
										<div class="container">
											<div class="section-title text-center">
												<h3>PROPERTIES</h3>
											</div>
											<div class="row">';
						    
						  		while($row = mysqli_fetch_assoc($result)) 
						  		{
						  			echo '<div class="col-md-6">
												<div class="propertie-item set-bg" data-setbg="'.$row['projectImage'].'">
													<div class="sale-notic">'.$row['architectName'].'</div>
													<div class="propertie-info text-white">
														<div class="info-warp">
															<h5><a role="button" id="getProjectDetails" href="enquiryForm.php?name='.$row['projectName'].'&link='.$row['projectImage'].'">'.$row['projectName'].'</a></h5>
															<p><i class="fa fa-map-marker"></i> '.$row['projectLocation'].'</p>
														</div>
														<div class="price">$'.$row['projectPrice'].'</div>
													</div>
												</div>
										  </div>';
						  		}
						  	}
						  }
						  if($projectNameisSet == 0 && $locationisSet == 1)
						  {
						  	$sql = "SELECT * from project where projectLocation = '$location' ";
						  	$result = mysqli_query($conn,$sql);
						  	if (mysqli_num_rows($result) > 0) 
						  	{
						  		$valueFound = 1;
						  		echo '<section class="properties-section spad" id="results">
										<div class="container">
											<div class="section-title text-center">
												<h3>PROPERTIES</h3>
											</div>
											<div class="row">';
						    
						  		while($row = mysqli_fetch_assoc($result)) 
						  		{
						  			echo '<div class="col-md-6">
												<div class="propertie-item set-bg" data-setbg="'.$row['projectImage'].'">
													<div class="sale-notic">'.$row['architectName'].'</div>
													<div class="propertie-info text-white">
														<div class="info-warp">
															<h5><a role="button" id="getProjectDetails" href="enquiryForm.php?name='.$row['projectName'].'&link='.$row['projectImage'].'">'.$row['projectName'].'</a></h5>
															<p><i class="fa fa-map-marker"></i>'.$row['projectLocation'].'</p>
														</div>
														<div class="price">$'.$row['projectPrice'].'</div>
													</div>
												</div>
										  </div>';
						  		}
						  	}

						  	echo "</div>
							</section>"	;

						  }
						  if($valueFound == 0)
						  {
						  	echo '<section class="properties-section spad" id="results">
									<div class="container">
										<div class="section-title text-center">
											<h3>PROPERTIES</h3>
											<p>There are no such properties!</p>
										</div>';
							echo '<div class="row">
											<div class="col-md-3"></div>
						  					<div class="col-md-6">
												<div class="propertie-item set-bg" data-setbg="https://webhostingmedia.net/wp-content/uploads/2018/01/http-error-404-not-found.png">
													<div class="sale-notic">Not Found</div>
													<div class="propertie-info text-white">
														<div class="info-warp">
															<h5>:(</h5>
															<p><i class="fa fa-map-marker">Please search again!</i></p>
														</div>
														<div class="price">:(</div>
													</div>
												</div>
										  </div>
										  <div class="col-md-3"></div>';
							echo '</div>
								  </div>
								  </section>';
						  }
						}
					//}
				?>