<?php include('head.php');
include 'connection.php';
session_start(); ?>
	<!-- Page top section -->
<script type="text/javascript">

		function abc()
		{
			//$('#projectFilterSubmit').on('click',function(){
				//alert("inside button click event!");
				var name = $('#projectNameFilter').val();
				var location = $('#projectLocation').val();
				//alert(name); alert(location);
				//if(!empty(name) || !empty(location))
				//{
					//alert(name);
					//alert(location);
					//alert("inside not empty name and loc");
					$.ajax({


							//type: "POST",
							url: "searchFilter.php",
							method: "POST",
							data: {name : name, location : location},
							success : function(response) {
								//alert("inside success!");
								$('#result').html(response);
							}
						  });
			//	}
				//});
		}
		
	
</script>
	<section class="page-top-section set-bg" data-setbg="img/page-top-bg.jpg">
		<div class="container text-white">
			<h2>Featured Listings</h2>
		</div>
	</section>
	<!--  Page top end -->

	<!-- Breadcrumb -->
	<div class="site-breadcrumb">
		<div class="container">
			<a href="index.php"><i class="fa fa-home"></i>Home</a>
			<span><i class="fa fa-angle-right"></i>Projects</span>
		</div>
	</div>


	<!-- filering search form -->
	<div class="filter-search">
		<div class="container">
			<form class="filter-form" method="POST" id="projectFilterForm">
				<input type="text" placeholder="Enter Name of Project" id="projectNameFilter" name="projectNameFilter">

					<?php 
						  $sql = "SELECT DISTINCT projectLocation from project";
						  $result = mysqli_query($conn,$sql);
						  if (mysqli_num_rows($result) > 0) 
						  {
						    // output data of each row
						    echo "<select name='projectLocation' id='projectLocation'>";
						    echo "<option disabled selected value> -- select an option -- </option>";
						  	while($row = mysqli_fetch_assoc($result)) 
						  	{
						  		echo "<option value='" . $row['projectLocation'] . "'>" . $row['projectLocation'] . "</option>";
						    }
						    echo "</select>";
						  } 
						  else 
						  {
						    echo "0 results";
						  }
					 ?>
				<!--<input type="submit" value="SEARCH" > -->
				<button name="projectFilterSubmit" id="projectFilterSubmit" class="site-btn fs-submit" onclick="abc(); return false;">SEARCH</button>
			</form>
		</div>
	</div>
	<div id="result" class="result">
		<?php 
		  	$sql = "SELECT * from project";
		  	$result = mysqli_query($conn,$sql);
		  	if (mysqli_num_rows($result) > 0) 
		  	{
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
		?>
		<h2 id='garbage'></h2>
	</div>


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