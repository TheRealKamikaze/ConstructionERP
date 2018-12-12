<?php include('head.php'); ?>

	<!-- Page top section -->
	<section class="page-top-section set-bg" data-setbg="img/page-top-bg.jpg">
		<div class="container text-white">
			<h2>Subscribe to our mailing list</h2>
		</div>
	</section>
	<!--  Page top end -->

	<!-- Breadcrumb -->
	<div class="site-breadcrumb">
		<div class="container">
			<a href=""><i class="fa fa-home"></i>Home</a>
			<span><i class="fa fa-angle-right"></i>Contact us</span>
		</div>
	</div>

	<!-- page -->
	<section class="page-section blog-page">
		<div class="container">
			<div id="map-canvas">
				<div class="mapouter"><div class="gmap_canvas"><iframe width="932" height="400" id="gmap_canvas" src="https://maps.google.com/maps?q=K.J.%20Somaiya%20College%20of%20Engineering&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe><a href="https://www.pureblack.de">webdesign agentur</a></div><style>.mapouter{text-align:right;height:400px;width:932px;}.gmap_canvas {overflow:hidden;background:none!important;height:400px;width:932px;}</style></div>
			</div>
			<div class="contact-info-warp">
				<p><i class="fa fa-map-marker"></i>ANT Builders, Mumbai, Maharashtra</p>
				<p><i class="fa fa-envelope"></i>amit.mahajan@somaiya.edu</p>
				<p><i class="fa fa-phone"></i>+91-8828301921</p>
			</div>
			<div class="row">
				<div class="col-lg-6">
					<img src="https://www.droneii.com/wp-content/uploads/2016/07/contact-us-banner.jpg" height="400px">
				</div>
				<div class="col-lg-6">
					<div class="contact-right">
						<div class="section-title">
							<h3>Get in touch</h3>
							<p>Recieve updates about our upcoming properties!</p>
						</div>
						<form class="contact-form" method="POST" name="mailingList" id="mailingList">
							<div class="row">
								<div class="col-md-6">
									<input type="text" placeholder="Your name" id="name" name="name" required>
								</div>
								<div class="col-md-6">
									<input type="text" placeholder="Your email" id="emailId" name="emailId" required>
								</div>
								<div class="col-md-12">
									<textarea  placeholder="Your message" id="extraMsg" name="extraMsg"></textarea>
									<input placeholder="Your number" type="text" name="phoneNo" id="phoneNo" required>
									<input type="submit" name="mailingList" id="mailingList" value="Subscribe to our list!">
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</section>

	<?php 

		if($_SERVER['REQUEST_METHOD'] == "POST")
		{
			if(isset($_POST['mailingList']))
			{
				$name=$emailId=$extraMsg='';
				$phoneNo = '';
				if(!empty($_POST['emailId']))
				{
					$emailId = $_POST['emailId'];
				}
				if(!empty($_POST['name']))
				{
					$name = $_POST['name'];
				}
				if(!empty($_POST['phoneNo']))
				{
					$phoneNo = $_POST['phoneNo'];
				}
				if(!empty($_POST['extraMsg']))
				{
					$extraMsg = $_POST['extraMsg'];
				}
				else
				{
					$extraMsg = "No Message";
				}

				include 'connection.php';
				$sql = "INSERT INTO mailingList(name, emailId, extraMsg, phoneNo) values ('$name', '$emailId', '$extraMsg', '$phoneNo')";
				$result = mysqli_query($conn,$sql);
				if($result)
					echo "<script type='text/javascript'> alert('Subscribed to mailing list!'); </script>";
			}
		}


	?>
	<!-- page end -->


	<!-- Clients section -->
	<!-- <div class="clients-section">
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
	</div> -->
	<!-- Clients section end -->


	<?php include('footer.php'); ?>