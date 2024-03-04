<?php
include_once('./rvcore_web/init.php');
protect_page();
//	logged_in_redirect();
include_once('./templete/header.php');
    
if (isset($_GET['success']) && empty($_GET['success']) ) {
	$errors[] = '<div class="alert alert-success alert-dismissable">
				  <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
				  <strong>Success!</strong> Order status Updated successfully.
				<meta http-equiv="refresh" content="5;url=./treatments" /></div>';
} elseif (isset($_GET['deleted']) && empty($_GET['deleted']) ) {
	$errors[] = '<div class="alert alert-success alert-dismissable">
				  <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
				  Article Deleted Successfully
				</div>
				<meta http-equiv="refresh" content="5;url=./treatments" />';
}

?>
<script language="JavaScript" type="text/javascript">
function checkDelete(){
    return confirm('Are you sure you want to remove this article?');
}
</script>
<script src='https://cloud.tinymce.com/stable/tinymce.min.js?apiKey=5czk9463grlhldnuq09qg8lxu0iul2br64amd8oenyjbe5e9'></script>
  <script>
  tinymce.init({
    selector: '#mytextarea'

  });
  </script>

<!-- main content start-->
<div id="page-wrapper">
											
	<div class="main-page">
    <?php echo output_errors($errors); ?>
    <div class="main-page">
				<div class="tables">
					 <div class="table-responsive bs-example widget-shadow">
						<h4>All Blogs</h4>
					<table id="example" class="table table-striped table-bordered" style="width:100%"> 
								<thead> 
									<tr> 
										<th>#</th> 
										<!-- <th>Category</th>  -->
										<th>Title</th> 
										<th>Slug</th>  
										<th>SEO Title</th> 
										<th>Created at</th> 
										<th>Action</th> 
									</tr> 
								</thead> 
							<tbody> 
<?php $result = blogsList('DESC');
$i = 1;
foreach ($result as $deals) {?>
								<tr> 
									<th scope="row"><?php echo $i; ?></th> 
									<!-- <td><?php echo $deals['category_name']; ?></td>  -->
									<td><?php echo $deals['title']; ?></td>
									<td><?php echo $deals['slug']; ?></td>
									<td><?php echo $deals['seo_title']; ?></td> 
									<td><?php echo $deals['created_at']; ?></td>
									<td style="width: 120px;"><a href="edit_blog?id=<?php echo $deals['id'];?>" class="btn btn-sm btn-primary" style="margin-right: 5px;" title="Edit"><i class="fa fa-edit"></i></a><a href="delete_blog?id=<?php echo $deals['id'];?>" class="btn btn-sm btn-danger" title="Delete"  onclick="return checkDelete()"><i class="fa fa-trash-o" aria-hidden="true"></i></a></td>
								</tr> 
<?php $i++; } ?>
							</tbody> 
						</table> 
					</div>
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