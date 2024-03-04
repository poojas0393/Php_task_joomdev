<?php include_once('./rvcore_web/init.php'); ?>
<!DOCTYPE HTML>
<html>
<?php
include_once('./templete/overall/head.php');

/* Logged in admin */
	if (logged_in() === true) {
		echo '<body class="cbp-spmenu-push"><div class="main-content">';
		include_once('./templete/overall/leftnav.php');
		include_once('./templete/overall/header.php');
	?>
	<!-- main content start-->
	<div id="page-wrapper" style="min-height: 560px;">
		
	</div>
	<?php
/* Logged out admin */
	} else {
		echo '<body><div class="main-content">';
		include_once('./templete/forms/login.php');
	}
include_once('./templete//footer.php'); ?>
	
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
<!-- //Bootstrap Core JavaScript -->
   
</body>
</html>