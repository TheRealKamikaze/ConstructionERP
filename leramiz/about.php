<?php include('head.php'); include 'connection.php'; ?>


	<!-- Page top section -->
	<section class="page-top-section set-bg" data-setbg="img/page-top-bg.jpg">
		<div class="container text-white">
			<h2>About us</h2>
		</div>
	</section>
	<!--  Page top end -->

	<!-- Breadcrumb -->
	<div class="site-breadcrumb">
		<div class="container">
			<a href=""><i class="fa fa-home"></i>Home</a>
			<span><i class="fa fa-angle-right"></i>About us</span>
		</div>
	</div>

	<!-- page -->
	<section class="page-section">
		<div class="container">
			<img class="mb-5" src="img/about.jpg" alt="">
			<div class="row about-text">
				<div class="col-xl-6 about-text-left">
					<h5>ABOUT US</h5>
					<p>Lorem ipsum dolor sitdoni amet, consectetur donald adipis elite for. Vivamus interdum ultrices augue. Aenean dos cursus lania. Duis et fringilla leonardo. Mauris mattis sem, debut curus risus viverra sed. Vestibul vitae velit felis. Nulla placerat orci ante casat. Pellentesque ac placerat . Cras urna duis, ornare cursus purus.</p>
					<p>Ut vel auctor ligula. Aenean nec dui pretium, commodo ligula sit amet, faucibus purus. Mauris at dolor imperdiet, aliquet nisi non, vulputate est. Maecenas feugiat sagittis lacus. Mauris dinissim consequat tellus id congue. Mauris bendum mollis viverra. Vestibulum in leo placerat sollicitudin varius.</p>
				</div>
				<div class="col-xl-6 about-text-right">
					<h5>OUR QUALITY</h5>
					<p>Donec enim ipsum porta justo integer at velna vitae auctor integer congue magna at risus auctor purus unt pretium ligula rutrum integer sapien ultrice ligula luctus undo magna risus</p>
					<ul class="about-list">
						<li><i class="fa fa-check-circle-o"></i>Lorem ipsum dolor sitdoni amet, consectetur dont adipis elite vivamus interdum.</li>
						<li><i class="fa fa-check-circle-o"></i>Integer pulvinar ante nulla, ac fermentum ex congue id vestibulum ensectetur. </li>
						<li><i class="fa fa-check-circle-o"></i>Proin blandit nibh in quam semper iaculis lorem ipsum dolor salama ender.</li>
						<li><i class="fa fa-check-circle-o"></i>Mauris at dolor imperdiet, aliquet nisi non, vulputate est sit amet.</li>
					</ul>
				</div>
			</div>
		</div>
		
		<!-- Review section -->
			<?php
							$sql = "SELECT * FROM projectReview";
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
				?>
		<!-- Review section end-->

		<?php
			include 'connection.php';
			$sql = "SELECT * FROM user";
			$result = mysqli_query($conn, $sql);
			if(mysqli_num_rows($result) > 0)
			{
				echo '<section class="team-section spad pb-0">
			<div class="container">
				<div class="section-title text-center">
					<h3>OUR EMPLOYEES</h3>
					<p>Our employees who are our backbone</p>
				</div>
				<div class="row">';
				while($row = mysqli_fetch_assoc($result))
				{
					echo '<div class="col-lg-3 col-md-6">
						<div class="team-member">
							<div class="member-pic">
								<img src="'.$row['employeeImage'].'" alt="#">
								<div class="member-social">
									<a href=""><i class="fa fa-facebook"></i></a>
									<a href=""><i class="fa fa-instagram"></i></a>
									<a href=""><i class="fa fa-twitter"></i></a>
								</div>
							</div>
							<div class="member-info">
								<h5>'.$row['employeeName'].'</h5>
								<span>'.$row['employeeType'].'</span>
								<div class="member-contact">
									<p><i class="fa fa-phone"></i>'.$row['phoneNo'].'</p>
									<p><i class="fa fa-envelope"></i>'.$row['emailId'].'</p>
								</div>
							</div>
						</div>
					</div>';
				}
				echo '</div>
			</div>
		</section>';
			}
		?>
		<!-- Team section -->
		<!-- <section class="team-section spad pb-0">
			<div class="container">
				<div class="section-title text-center">
					<h3>OUR EMPLOYEES</h3>
					<p>Our employees who are our backbone</p>
				</div>
				<div class="row">
					<div class="col-lg-3 col-md-6">
						<div class="team-member">
							<div class="member-pic">
								<img src="img/team/1.jpg" alt="#">
								<div class="member-social">
									<a href=""><i class="fa fa-facebook"></i></a>
									<a href=""><i class="fa fa-instagram"></i></a>
									<a href=""><i class="fa fa-twitter"></i></a>
								</div>
							</div>
							<div class="member-info">
								<h5>Tony Holland</h5>
								<span>Real Estate  Agent</span>
								<div class="member-contact">
									<p><i class="fa fa-phone"></i>(567) 666 121 2288</p>
									<p><i class="fa fa-envelope"></i>tonyholland@gmail.com</p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section> -->
		<!-- Team section end-->
	</section>
	<!-- page end -->


	<!-- Clients section -->
	<div class="clients-section">
		<div class="container">
			<div class="clients-slider owl-carousel">
				<a href="#">
					<img src="img/partner/1.png" alt="">
				</a>
				<a href="#">
					<img src="img/partner/2.png" alt="">
				</a>
				<a href="#">
					<img src="img/partner/3.png" alt="">
				</a>
				<a href="#">
					<img src="img/partner/4.png" alt="">
				</a>
				<a href="#">
					<img src="img/partner/5.png" alt="">
				</a>
			</div>
		</div>
	</div>
	<!-- Clients section end -->


	<?php include('footer.php'); ?>