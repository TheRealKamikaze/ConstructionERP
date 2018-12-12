<?php 
	include('head.php'); 
	include 'connection.php'; 
?>


	<!-- Page top section -->
	<section class="page-top-section set-bg" data-setbg="img/page-top-bg.jpg">
		<div class="container text-white">
			<h2>SINGLE LISTING</h2>
		</div>
	</section>
	<!--  Page top end -->

	<!-- Breadcrumb -->
	<div class="site-breadcrumb">
		<div class="container">
			<a href=""><i class="fa fa-home"></i>Home</a>
			<span><i class="fa fa-angle-right"></i>Single Listing</span>
		</div>
	</div>

	<!-- Page -->
	<section class="page-section">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 single-list-page">
					<!-- <div class="single-list-slider owl-carousel" id="sl-slider">
						<div class="sl-item set-bg" data-setbg="img/single-list-slider/1.jpg">
							<div class="sale-notic">FOR SALE</div>
						</div>
						<div class="sl-item set-bg" data-setbg="img/single-list-slider/2.jpg">
							<div class="rent-notic">FOR Rent</div>
						</div>
						<div class="sl-item set-bg" data-setbg="img/single-list-slider/3.jpg">
							<div class="sale-notic">FOR SALE</div>
						</div>
						<div class="sl-item set-bg" data-setbg="img/single-list-slider/4.jpg">
							<div class="rent-notic">FOR Rent</div>
						</div>
						<div class="sl-item set-bg" data-setbg="img/single-list-slider/5.jpg">
							<div class="sale-notic">FOR SALE</div>
						</div>
					</div> -->
					<?php  
						$projectName = $_GET['name'];
						$sql = "SELECT * FROM document where projectName = '$projectName' and documentType = 'displayImage'";
						$result = mysqli_query($conn, $sql);
						if(mysqli_num_rows($result) > 0)
						{
							echo '<div class="single-list-slider owl-carousel" id="sl-slider">';
							while($row = mysqli_fetch_assoc($result))
							{
								echo '<div class="sl-item set-bg" data-setbg="'.$row['documentLink'].'">
										  <div class="sale-notic">FOR SALE</div>
									  </div>';
							}
							echo '</div>';
						}
					?>
					<!-- <div class="owl-carousel sl-thumb-slider" id="sl-slider-thumb">
						<div class="sl-thumb set-bg" data-setbg="img/single-list-slider/1.jpg"></div>
						<div class="sl-thumb set-bg" data-setbg="img/single-list-slider/2.jpg"></div>
						<div class="sl-thumb set-bg" data-setbg="img/single-list-slider/3.jpg"></div>
						<div class="sl-thumb set-bg" data-setbg="img/single-list-slider/4.jpg"></div>
						<div class="sl-thumb set-bg" data-setbg="img/single-list-slider/5.jpg"></div>
					</div> -->
					<?php 
						$projectName = $_GET['name'];
						$sql = "SELECT * FROM document where projectName = '$projectName' and documentType = 'displayImage'";
						$result = mysqli_query($conn, $sql);
						if(mysqli_num_rows($result) > 0)
						{
							echo '<div class="owl-carousel sl-thumb-slider" id="sl-slider-thumb">';
							while($row = mysqli_fetch_assoc($result))
							{
								echo '<div class="sl-thumb set-bg" data-setbg="'.$row['documentLink'].'"></div>';
							}
							echo '</div>';
						}
					?>
					<div class="single-list-content">
						<?php
							$projectName = $_GET['name'];
							$sql = "SELECT * FROM document where projectName = '$projectName'";
							$result = mysqli_query($conn, $sql);
							if(mysqli_num_rows($result) > 0)
							{
								while($row = mysqli_fetch_assoc($result))
								{
									echo '<div class="row">
												<div class="col-xl-8 sl-title">
													<h2>'.$row['projectName'].'</h2>
													<p><i class="fa fa-map-marker"></i>'.$row['projectLocation'].'</p>
												</div>
												<div class="col-xl-4">
													<a href="#" class="price-btn">$'.$row['projectPrice'].'</a>
												</div>
										  </div>';
								}
							}
						?>
						<?php
							$projectName = $_GET['name'];
							$sql = "SELECT * FROM projectFeatures WHERE projectName = '$projectName'";
							$result = mysqli_query($conn, $sql);
							if(mysqli_num_rows($result) > 0)
							{
								echo '<h3 class="sl-sp-title">Property Details</h3>
									  <div class="row property-details-list">';
								echo '<div class="col-md-4">';
								echo '<ul>';
								while($row = mysqli_fetch_assoc($result))
								{
									echo "<li>'".$row['feature']."'</li>";
								}
								echo '</ul>';
								echo '</div>';
							}
							echo '</div>';
						?>
						<?php
								$projectName = $_GET['name'];
								$sql = "SELECT * FROM project WHERE projectName = '$projectName' ";
								$result = mysqli_query($conn, $sql);
								if(mysqli_num_rows($result) > 0)
								{
									echo '<h3 class="sl-sp-title">Description</h3>
										  <div class="description">';
									while($row = mysqli_fetch_assoc($result))
									{
										echo '<p>'.$row['projectDescription'].'</p>';
									}
									echo '</div>';
								}
							?>

						<!-- <h3 class="sl-sp-title">Property Details</h3>
						<div class="row property-details-list">
							<div class="col-md-4 col-sm-6">
								<p><i class="fa fa-check-circle-o"></i> Air conditioning</p>
								<p><i class="fa fa-check-circle-o"></i> Telephone</p>
								<p><i class="fa fa-check-circle-o"></i> Laundry Room</p>
							</div>
							<div class="col-md-4 col-sm-6">
								<p><i class="fa fa-check-circle-o"></i> Central Heating</p>
								<p><i class="fa fa-check-circle-o"></i> Family Villa</p>
								<p><i class="fa fa-check-circle-o"></i> Metro Central</p>
							</div>
							<div class="col-md-4">
								<p><i class="fa fa-check-circle-o"></i> City views</p>
								<p><i class="fa fa-check-circle-o"></i> Internet</p>
								<p><i class="fa fa-check-circle-o"></i> Electric Range</p>
							</div>
						</div> -->
						<?php
							$projectName = $_GET['name'];
							$floorPlan = 'floorPlan';
							$sql = "SELECT * FROM document WHERE projectName = '$projectName' AND documentType = '$floorPlan' ORDER BY floor";
							$result = mysqli_query($conn, $sql);
							if(mysqli_num_rows($result) > 0)
							{
								echo '<h3 class="sl-sp-title bd-no">Floorplans</h3>
									  <div id="accordion" class="plan-accordion">
									  		<div class="panel">';
								while($row = mysqli_fetch_assoc($result))
								{
									echo '<div class="panel-header" id="headingOne">
									<button class="panel-link active" data-toggle="collapse" data-target="#collapse1" aria-expanded="false" aria-controls="collapse1">"'.$row['floor'].'" Floor: <i class="fa fa-angle-down"></i></button>
								</div>
								<div id="collapse1" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
									<div class="panel-body">
										<img src="'.$row['documentLink'].'" alt="">
									</div>
								</div>';
								}
								echo '		</div>
									  </div>';
							}
						?>

						<!-- <h3 class="sl-sp-title bd-no">Video</h3>
						<div class="perview-video">
							<img src="img/video.jpg" alt="">
							<a href="https://www.youtube.com/watch?v=v13nSVp6m5I" class="video-link"><img src="img/video-btn.png" alt=""></a>
						</div> -->
							<?php		
											if(isset($_GET['name']))
											{
												$projectName = $_GET['name'];
												$sql = "SELECT * FROM project WHERE projectName = '$projectName'";
												$result = mysqli_query($conn, $sql);
												if(mysqli_num_rows($result) > 0)
												{
													echo '<h3 class="sl-sp-title bd-no">Find us on maps!</h3>
														  <div class="pos-map" id="map-canvas">';
													while($row = mysqli_fetch_assoc($result))
													{
														echo $row['mapLink'];
													}
													echo '</div>';
												}
											}
							?>
					</div>
				</div>
				<!-- sidebar -->
				<div class="col-lg-4 col-md-7 sidebar">
					<div class="author-card">
						<div class="author-img set-bg" data-setbg="img/author.jpg"></div>
						<div class="author-info">
							<h5>Gina Wesley</h5>
							<p>Real Estate Agent</p>
						</div>
						<div class="author-contact">
							<p><i class="fa fa-phone"></i>(567) 666 121 2233</p>
							<p><i class="fa fa-envelope"></i>ginawesley26@gmail.com</p>
						</div>
					</div>
					<div class="contact-form-card">
						<h5>Subscribe to mailing list!</h5>
						<form>
							<input type="text" name="enquiryName" placeholder="Your name" id="enquiryName" required>
							<input type="email" name="enquiryEmail" placeholder="Your email" id="enquiryEmail" required>
							<input type="number" name="enquiryPhoneNo" id="enquiryPhoneNo" required>
							<button id="submitEnquiry" name="submitEnquiry">SEND</button>
						</form>
					</div>
					<div class="related-properties">
						<h2>Related Property</h2>
						<div class="rp-item">
							<div class="rp-pic set-bg" data-setbg="img/feature/1.jpg">
								<div class="sale-notic">FOR SALE</div>
							</div>
							<div class="rp-info">
								<h5>1963 S Crescent Heights Blvd</h5>
								<p><i class="fa fa-map-marker"></i>Los Angeles, CA 90034</p>
							</div>
							<a href="#" class="rp-price">$1,200,000</a>
						</div>
						<div class="rp-item">
							<div class="rp-pic set-bg" data-setbg="img/feature/2.jpg">
								<div class="rent-notic">FOR Rent</div>
							</div>
							<div class="rp-info">
								<h5>17 Sturges Road, Wokingham</h5>
								<p><i class="fa fa-map-marker"></i> Newtown, CT 06470</p>
							</div>
							<a href="#" class="rp-price">$2,500/month</a>
						</div>
						<div class="rp-item">
							<div class="rp-pic set-bg" data-setbg="img/feature/4.jpg">
								<div class="sale-notic">FOR SALE</div>
							</div>
							<div class="rp-info">
								<h5>28 Quaker Ridge Road, Manhasset</h5>
								<p><i class="fa fa-map-marker"></i>28 Quaker Ridge Road, Manhasset</p>
							</div>
							<a href="#" class="rp-price">$5,600,000</a>
						</div>
						<div class="rp-item">
							<div class="rp-pic set-bg" data-setbg="img/feature/5.jpg">
								<div class="rent-notic">FOR Rent</div>
							</div>
							<div class="rp-info">
								<h5>Sofi Berryessa 750 N King Road</h5>
								<p><i class="fa fa-map-marker"></i>Sofi Berryessa 750 N King Road</p>
							</div>
							<a href="#" class="rp-price">$1,600/month</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- Page end -->
	<?php
		if($_SERVER("REQUEST_METHOD") == "POST")
		{
			if(isset($_POST['enquiryName']) && isset($_POST['enquiryEmail']) && isset($_POST['enquiryPhoneNo']))
			{
							$name = $_POST['enquiryName'];
							$phoneNo = $_POST['enquiryPhoneNo'];
							$enquiryEmail = $_POST['enquiryEmail'];
							$projectName = $_GET['name'];
							$sql = "INSERT INTO enquiry(name, emailId, phoneNo, projectName) VALUES ('$name', '$enquiryEmail', '$phoneNo', '$projectName')";
							$result = mysqli_query($conn, $sql);
			}
		} 
	?>

	<!-- Review section -->
				<?php
						if(isset($_GET['name']))
						{
							$projectName = $_GET['name'];
							$sql = "SELECT * FROM projectReview WHERE projectName = '$projectName'";
							$result = mysqli_query($conn, $sql);
							if(mysqli_num_rows($result) > 0)
							{
								echo '<section class="review-section set-bg" data-setbg="img/review-bg.jpg">
									<div class="container">
										<div class="review-slider owl-carousel">';
								while($row = mysqli_fetch_assoc($result))
								{
									echo '<div class="review-item text-white">
												<div class="rating">';
													for($i=0; $i<$row['rating']; $i++)
													{
														echo "<i class='fa fa-star'></i>";
													}
										  echo '</div>';
										  echo '<p>“'.$row["reviewMessage"].'.”</p>';
										  echo '<h5>'.$row['name'].'</h5>';
										  echo '<span>'.$row['occupation'].'</span>';
										  echo '<div class="clint-pic set-bg" data-setbg="'.$row['photo'].'"></div>
									     </div>';
								}
									echo '</div>
									</div>
								</section>';
							}
						}
				?>
	<!-- Review section end-->


	<?php include('footer.php'); ?>