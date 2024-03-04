<?php
	include_once('./rvcore_web/init.php');
	protect_page();
//	logged_in_redirect();
	include_once('./templete/header.php');
?>

<!-- main content start-->
<div id="page-wrapper">
	<div class="main-page">
		<div class="tables">
			<div class="table-responsive bs-example widget-shadow" data-example-id="hoverable-table"> 
				<h4 class="text-center">Websites Content Management</h4>
				<table class="table table-striped table-bordered"  id="example">
					<thead>
						<tr>
							<th>#</th>
							<th>Section</th>
							<th>Slug</th>
							<th>title</th>
							<th>Last updated on</th>
							<th>Edit</th>
						</tr>
					</thead>
					<tbody>
					<?php
					$condition = '';
					$tabledata = rowSelect('webcontent', $condition, 'id', 'section', 'slug', 'title','body','seo_title','seo_description','seo_keywords','created_at','updated_at');
					$tableList = $tabledata['data'];
					foreach($tableList as $data) {
					echo '<tr>
							<th scope="row">'.$data['id'].'</th>
							<td>'.ucwords(str_replace("_"," ",$data['section'])).'</td>
							<td>'.$data['slug'].'</td>
							<td>'.substr($data['title'],0,'30').'</td>
							<td>'.$data['updated_at'].'</td>
							<td><a class="btn btn-xs btn-primary" href="webedit?id='.$data['id'].'">Edit</a></td>	
						</tr>';
					}
					?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
	
<?php include_once('./templete//footer.php'); ?>
	
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