<!-- header-starts -->
<div class="sticky-header header-section ">
	<div class="header-left">
		<!--toggle button start-->
		<button id="showLeftPush"><i class="fa fa-bars"></i></button>
		<div class="clearfix"> </div>
	</div>
	<div class="header-right">
		<div class="profile_details">		
			<ul>
				<li class="dropdown profile_details_drop">
					<a href="./profile" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
						<div class="profile_img">	
							<span class="prfil-img"><img src="" alt=""> </span> 
							<div class="user-name" style="float: none;">
								<p><?php echo $userdata['name']; ?></p>
								<span>Test</span>
							</div>
							<i class="fa fa-angle-down lnr"></i>
							<i class="fa fa-angle-up lnr"></i>
							<div class="clearfix"></div>	
						</div>	
					</a>
					<ul class="dropdown-menu drp-mnu">
						<li> <a href="./settings"><i class="fa fa-cog"></i> Settings</a> </li>
						<li> <a href="./profile"><i class="fa fa-suitcase"></i> Profile</a> </li> 
						<li> <a href="./logout"><i class="fa fa-sign-out"></i> Logout</a> </li>
					</ul>
				</li>
			</ul>
		</div>
		<div class="clearfix"> </div>				
	</div>
	<div class="clearfix"> </div>	
</div>
<!-- //header-ends -->