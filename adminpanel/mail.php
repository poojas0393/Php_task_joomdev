<?php
	include_once('./rvcore_web/init.php');
	protect_page();
//	logged_in_redirect();
	include_once('./templete/header.php');


	if(isset($_GET['inbox']) && empty($_GET['inbox'])) {
		$updateData = array('status' => '0'); $condition = array('type' => '1'); $result = rowUpdate('mailbox', $updateData, $condition);
	} elseif(isset($_GET['sent']) && empty($_GET['sent'])) {
		$updateData = array('status' => '0'); $condition = array('type' => '2'); $result = rowUpdate('mailbox', $updateData, $condition);
	} elseif(isset($_GET['draft']) && empty($_GET['draft'])) {
		$updateData = array('status' => '0'); $condition = array('type' => '3'); $result = rowUpdate('mailbox', $updateData, $condition);
	} elseif(isset($_GET['spam']) && empty($_GET['spam'])) {
		$updateData = array('status' => '0'); $condition = array('type' => '4'); $result = rowUpdate('mailbox', $updateData, $condition);
	} elseif(isset($_GET['trash']) && empty($_GET['trash'])) {
		$updateData = array('status' => '0'); $condition = array('type' => '5'); $result = rowUpdate('mailbox', $updateData, $condition);
	}
?>

		<!-- main content start-->
		<div id="page-wrapper">
			<div class="main-page">
				<h2 class="title1">Mail Page</h2>
				<div class="col-md-4 compose-left">
					<?php include_once('./templete/widgets/mailnav.php'); ?>
					<div class="chat-grid widget-shadow">
						<ul>
							<li class="head"><i class="fa fa-user" aria-hidden="true"></i>Friends (Online) </li>
						<?php
							$admindata = rowSelect('admin_users', '', 'id', 'fname', 'lname', 'email', 'contact', 'profile');
							$adminList = $admindata['data'];
							foreach($adminList as $admins) {
						?>
							<li><a href="#">
									<div class="chat-left">
										<img class="img-circle" src="<?php echo $admins['profile']; ?>" alt="">
										<label class="small-badge"></label>
										<!--<label class="small-badge bg-green"></label>-->
									</div>
									<div class="chat-right">
										<p><?php echo $admins['fname'].' '.$admins['lname']; ?></p>
										<h6><?php echo $admins['email']; ?></h6>
									</div>
									<div class="clearfix"> </div>	
								</a>
							</li>
						<?php } ?>
						</ul>
					</div>
				</div>
				<div class="col-md-8 compose-right widget-shadow">
					<div class="panel-default">
						<div class="panel-heading">
						<?php
							if(isset($_GET['inbox']) && empty($_GET['inbox'])) { echo '<i class="fa fa-inbox"></i> Inbox'; $condition = array('type' => '1',);
							} elseif(isset($_GET['sent']) && empty($_GET['sent'])) { echo '<i class="fa fa-envelope"></i> Sent'; $condition = array('type' => '2',);
							} elseif(isset($_GET['draft']) && empty($_GET['draft'])) { echo '<i class="fa fa-file-text"></i> Draft'; $condition = array('type' => '3',);
							} elseif(isset($_GET['spam']) && empty($_GET['spam'])) { echo '<i class="fa fa-flag"></i> Spam'; $condition = array('type' => '4',);
							} elseif(isset($_GET['trash']) && empty($_GET['trash'])) { echo '<i class="fa fa-trash"></i> Tarsh'; $condition = array('type' => '5',); }
						?>
						</div>
						<div class="inbox-page">
<!--							<h4>Today</h4>-->
						<?php
							$maildata = rowSelect('mailbox', $condition, 'id', 'type', 'email', 'subject', 'message', 'reply_for', 'created');
							if($maildata===false) {
								echo 'Not found...!';
							} else {
							$mailList = $maildata['data'];
							foreach($mailList as $mailbox) {
						?>
							<div class="inbox-row widget-shadow" id="accordion" role="tablist" aria-multiselectable="true">
								<div class="mail "><input type="checkbox" class="checkbox"></div>
								<div class="mail"><img src="images/i0.png" alt=""/></div>
								<div class="mail mail-name"> <h6><?php echo limit_text($mailbox['email'], '6'); ; ?></h6> </div>
								<a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo $mailbox['id']; ; ?>" aria-expanded="true" aria-controls="collapseOne">
									<div class="mail"><p><?php echo limit_text($mailbox['subject'], '40'); ; ?></p></div>
								</a>
								<div class="mail-right dots_drop">
									<div class="dropdown">
										<a href="#"  data-toggle="dropdown" aria-expanded="false">
											<p><i class="fa fa-ellipsis-v mail-icon"></i></p>
										</a>
										<ul class="dropdown-menu float-right">
											<li><a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne"><i class="fa fa-reply mail-icon"></i>Reply</a></li>
											<li><a href="#" title=""><i class="fa fa-download mail-icon"></i>Archive</a></li>
											<li><a href="#" class="font-red" title=""><i class="fa fa-trash-o mail-icon"></i>Delete</a></li>
										</ul>
									</div> 
								</div>
								<div class="mail-right"><p><?php echo $mailbox['created']; ; ?></p></div>
								<div class="clearfix"> </div>
								<div id="collapse<?php echo $mailbox['id']; ; ?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
									<div class="mail-body">
										<p><?php echo $mailbox['message']; ; ?></p>
										<form>
											<input type="text" placeholder="Reply to sender" required="">
											<input type="submit" value="Send">
										</form>
									</div>
								</div>
							</div>
						<?php } } ?>
						</div>	
					</div>
				</div>
				<div class="clearfix"> </div>	
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