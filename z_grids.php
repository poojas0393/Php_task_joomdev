<?php
	include_once('./rvcore_web/init.php');
	protect_page();
//	logged_in_redirect();
	include_once('./templete/header.php');
?>


		<!-- main content start-->
		<div id="page-wrapper">
			<div class="main-page">
				<h2 class="title1">Grid system</h2>
				<div class="grids widget-shadow">
					<div class="form-group">
						<div class="row">
							<div class="col-md-12">
								<input type="text" class="form-control1" placeholder=".col-md-12">
							</div>
							<div class="clearfix"> </div>
						</div>
					</div>
					<div class="form-group">
						<div class="row">
							<div class="col-md-2 grid_box1">
								<input type="text" class="form-control1" placeholder=".col-md-2">
							</div>
							<div class="col-md-10">
								<input type="text" class="form-control1" placeholder=".col-md-10">
							</div>
							<div class="clearfix"> </div>
						</div>
					</div>
					<div class="form-group">
						<div class="row">
							<div class="col-md-3 grid_box1">
								<input type="text" class="form-control1" placeholder=".col-md-3">
							</div>
							<div class="col-md-9">
								<input type="text" class="form-control1" placeholder=".col-md-9">
							</div>
							<div class="clearfix"> </div>
						</div>
					</div>
					<div class="form-group">
						<div class="row">
							<div class="col-md-4 grid_box1">
								<input type="text" class="form-control1" placeholder=".col-md-4">
							</div>
							<div class="col-md-8">
								<input type="text" class="form-control1" placeholder=".col-md-8">
							</div>
							<div class="clearfix"> </div>
						</div>
					</div>	
					<div class="form-group">
						<div class="row">
							<div class="col-md-5 grid_box1">
								<input type="text" class="form-control1" placeholder=".col-md-5">
							</div>
							<div class="col-md-7">
								<input type="text" class="form-control1" placeholder=".col-md-7">
							</div>
							<div class="clearfix"> </div>
						</div>
					</div>
					<div class="form-group">
						<div class="row">
							<div class="col-md-6 grid_box1">
								<input type="text" class="form-control1" placeholder=".col-md-6">
							</div>
							<div class="col-md-6">
								<input type="text" class="form-control1" placeholder=".col-md-6">
							</div>
							<div class="clearfix"> </div>
						</div>
					</div>	
					<div class="form-group">
						<div class="row">
							<div class="col-md-4 grid_box1">
								<input type="text" class="form-control1" placeholder=".col-md-4">
							</div>
							<div class="col-md-4 grid_box1">
								<input type="text" class="form-control1" placeholder=".col-md-4">
							</div>
							<div class="col-md-4">
								<input type="text" class="form-control1" placeholder=".col-md-4">
							</div>
							<div class="clearfix"> </div>
						</div>
					</div>	
					<div class="form-group">
						<div class="row">
							<div class="col-md-2 grid_box1">
								<input type="text" class="form-control1" placeholder=".col-md-2">
							</div>
							<div class="col-md-8 grid_box1">
								<input type="text" class="form-control1" placeholder=".col-md-8">
							</div>
							<div class="col-md-2">
								<input type="text" class="form-control1" placeholder=".col-md-2">
							</div>
							<div class="clearfix"> </div>
						</div>
					</div>	
					<div class="form-group">
						<div class="row">
							<div class="col-md-3 grid_box1">
								<input type="text" class="form-control1" placeholder=".col-md-3">
							</div>
							<div class="col-md-3 grid_box1">
								<input type="text" class="form-control1" placeholder=".col-md-3">
							</div>
							<div class="col-md-3 grid_box1">
								<input type="text" class="form-control1" placeholder=".col-md-3">
							</div>
							<div class="col-md-3">
								<input type="text" class="form-control1" placeholder=".col-md-3">
							</div>
							<div class="clearfix"> </div>
						</div>
					</div>	
					<div class="form-group mb-n">
						<div class="row">
							<div class="col-md-2 grid_box1">
								<input type="text" class="form-control1" placeholder=".col-md-2">
							</div>
							<div class="col-md-2 grid_box1">
								<input type="text" class="form-control1" placeholder=".col-md-2">
							</div>
							<div class="col-md-2 grid_box1">
								<input type="text" class="form-control1" placeholder=".col-md-2">
							</div>
							<div class="col-md-2 grid_box1">
								<input type="text" class="form-control1" placeholder=".col-md-2">
							</div>
							<div class="col-md-2 grid_box1">
								<input type="text" class="form-control1" placeholder=".col-md-2">
							</div>
							<div class="col-md-2">
								<input type="text" class="form-control1" placeholder=".col-md-2">
							</div>
							<div class="clearfix"> </div>
						</div>
					</div>	
				</div>
				<h3 class="title1">Bootstrap Grid Details</h3>
				<div class="grid-bottom widget-shadow">
					<table class="table table-bordered table-striped no-margin grd_tble">
						<thead>
							<tr>
								<th></th>
								<th>
									Extra small devices
									<small>Phones (&lt;768px)</small>
								</th>
								<th>
									Small devices
									<small>Tablets (≥768px)</small>
								</th>
								<th>
									Medium devices
									<small>Desktops (≥992px)</small>
								</th>
								<th>
									Large devices
									<small>Desktops (≥1200px)</small>
								</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<th>Suitable for</th>
								<td>Phones</td>
								<td>Tablets</td>
								<td>Small Laptops</td>
								<td>Laptops & Desktops</td>
							</tr>
							<tr>
								<th>Grid behaviour</th>
								<td>Horizontal at all times</td>
								<td>Collapsed to start, horizontal above breakpoints</td>
								<td>Collapsed to start, horizontal above breakpoints</td>
								<td>Collapsed to start, horizontal above breakpoints</td>
							</tr>
							<tr>
								<th>Max container width</th>
								<td>None (auto)</td>
								<td>750px</td>
								<td>970px</td>
								<td>1170px</td>
							</tr>
							<tr>
								<th>Class prefix</th>
								<td><code>.col-xs-</code></td>
								<td><code>.col-sm-</code></td>
								<td><code>.col-md-</code></td>
								<td><code>.col-lg-</code></td>
							</tr>
							<tr>
								<th># of columns</th>
								<td >12</td>
								<td >12</td>
								<td >12</td>
								<td >12</td>
							</tr>
							<tr>
								<th>Column Width</th>
								<td>Auto</td>
								<td>~62px</td>
								<td>~81px</td>
								<td>~97px</td>
							</tr>
							<tr>
								<th>Gutter width</th>
								<td>30px (15px on each side of a column)</td>
								<td>30px (15px on each side of a column)</td>
								<td>30px (15px on each side of a column)</td>
								<td>30px (15px on each side of a column)</td>
							</tr>
							<tr>
								<th>Nestable</th>
								<td>Yes</td>
								<td>Yes</td>
								<td>Yes</td>
								<td>Yes</td>
							</tr>
							<tr>
								<th>Offests</th>
								<td>Yes</td>
								<td>Yes</td>
								<td>Yes</td>
								<td>Yes</td>
							</tr>
							<tr>
								<th>Column Ordering</th>
								<td>Yes</td>
								<td>Yes</td>
								<td>Yes</td>
								<td>Yes</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	<?php include_once('./templete/overall/footer.php'); ?>
	</div>
	
	<!-- side nav js -->
	<script src='js/SidebarNav.min.js' type='text/javascript'></script>
	<script>
      $('.sidebar-menu').SidebarNav()
    </script>
	<!-- //side nav js -->
	
	<!-- Classie --><!-- for toggle left push menu script -->
		<script src="js/classie.js"></script>
		<script>
			var menuLeft = document.getElementById( 'cbp-spmenu-s1' ),
				showLeftPush = document.getElementById( 'showLeftPush' ),
				body = document.body;
				
			showLeftPush.onclick = function() {
				classie.toggle( this, 'active' );
				classie.toggle( body, 'cbp-spmenu-push-toright' );
				classie.toggle( menuLeft, 'cbp-spmenu-open' );
				disableOther( 'showLeftPush' );
			};
			
			function disableOther( button ) {
				if( button !== 'showLeftPush' ) {
					classie.toggle( showLeftPush, 'disabled' );
				}
			}
		</script>
	<!-- //Classie --><!-- //for toggle left push menu script -->
		
	<!--scrolling js-->
	<script src="js/jquery.nicescroll.js"></script>
	<script src="js/scripts.js"></script>
	<!--//scrolling js-->
	
	<!-- Bootstrap Core JavaScript -->
   <script src="js/bootstrap.js"> </script>
   
</body>
</html>