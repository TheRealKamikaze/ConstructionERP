<?php include('head.php');
	include 'connection.php';
	session_start();
 ?>

	<!-- Hero section -->
	<section class="hero-section set-bg" data-setbg="img/bg.jpg">
		<div class="container hero-text text-white">
			<h2>Find your home with us!</h2>
			<p>Search below from our available projects<br>Click to enquire about them!.</p>
			<!-- <a href="#" class="site-btn">VIEW DETAIL</a> -->
		</div>
	</section>
	<!-- Hero section end -->


	<!-- Filter form section -->
	


	<!-- Review section -->
	<?php
						//if(isset($_GET['name']) || isset($_POST['submitEnquiry']))
						//{
							// $projectName = $_GET['name'];
							$sql = "SELECT * FROM projectReview /*WHERE projectName = '$projectName'*/";
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
						//}
				?>
	<!-- Review section end-->


	<!-- Blog section -->
				</div>
				<?php 
					// $conn = mysqli_connect("localhost","root","","construction");
					$sql = "SELECT * FROM news";
					$result = mysqli_query($conn, $sql);
					$newsFound = 0;
					if(mysqli_num_rows($result) > 0)
					{
						$newsFound = 1;
						echo '<section class="blog-section spad">
									<div class="container">
										<div class="section-title text-center">
										<h3>LATEST NEWS</h3>
										<p>News featuring us.</p>
									</div>
									<div class="row">';

						while($row = mysqli_fetch_assoc($result))
						{
							echo '<div class="col-lg-4 col-md-6 blog-item">
										<img src="'.$row['newsImage'].'" alt="">
										<h5>Housing confidence hits record high as prices skyrocket</h5>
										<div class="blog-meta">
											<span><i class="fa fa-newspaper-o"></i>'.$row['newsPaperName'].'</span>
											<span><i class="fa fa-clock-o"></i>'.$row['newsDate'].'</span>
										</div>
										<p>'.$row['newsDescription'].'</p>
								 </div>';
						}
						echo "</div>
							</div>
						</section>";
					}
				?>

<?php include('footer.php'); ?>