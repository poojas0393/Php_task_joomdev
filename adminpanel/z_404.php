<?php
	include_once('./rvcore_web/init.php');
	protect_page();
//	logged_in_redirect();
	include_once('./templete/header.php');
?>

		<!-- main content start-->
		<div id="page-wrapper">
			<div class="main-page">
				<h3 class="title1">404 Error Page</h3>
				<div class="error-page">
					<div class="">
						<h2>404</h2>
					</div>
					<div class="">
					<h3><i class="fa fa-warning text-yellow"></i> Oops! Page Not Found.</h3>
						<form action="#" method="post" class="search-form">
							<div class="input-group">
							  <input type="text" name="search" class="form-control" placeholder="Search" required="">

							  <div class="input-group-btn">
								<button type="submit" name="submit" class="btn btn-warning btn-flat"><i class="fa fa-search"></i>
								</button>
							  </div>
							</div>
							<!-- /.input-group -->
						  </form>
					</div>
					<p>We could not find the page you were looking for. Meanwhile, you may return to dashboard or try using the search form.</p>
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