<style>
	.sidebar-left { overflow-y: scroll;position: absolute;left: 0;top: 0;right: 0;bottom: 0;}
	/* scrollbar 3 */
	#scrollbar-3::-webkit-scrollbar-track{-webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);background-color: #F5F5F5;}
	#scrollbar-3::-webkit-scrollbar{width: 6px;background-color: #F5F5F5;}
	#scrollbar-3::-webkit-scrollbar-thumb{background-color: #1E1E1E;}	
</style>
<div class="cbp-spmenu cbp-spmenu-vertical cbp-spmenu-left" id="cbp-spmenu-s1">
	<!--left-fixed -navigation-->
	<aside class="sidebar-left" id="scrollbar-3">
		<nav class="navbar navbar-inverse">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".collapse" aria-expanded="false">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<h1>
					<a class="navbar-brand" href="./">Admin Panel</a>
				</h1>
			</div>
			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<ul class="sidebar-menu">
					<li class="header">MAIN NAVIGATION</li>
					
                                         

                    <li class="treeview">
						<a href="#">
							<i class="fa fa-user-md" aria-hidden="true"></i>
							<span>Employees Management</span>
							<i class="fa fa-angle-left pull-right"></i>
						</a>
						<ul class="treeview-menu">
							<li><a href="./add-doctor"><i class="fa fa-angle-right"></i> Add Employee</a></li>
							<li><a href="./doctors"><i class="fa fa-angle-right"></i> View Employees</a></li>
						</ul>
					</li>
					
					<li class="treeview">
						<a href="#">
							<i class="fa fa-user-md" aria-hidden="true"></i>
							<span>Task Management</span>
							<i class="fa fa-angle-left pull-right"></i>
						</a>
						<ul class="treeview-menu">
							<li><a href="./report"><i class="fa fa-angle-right"></i> Report</a></li>
						</ul>
					</li>
				</ul>
			</div>
			<!-- /.navbar-collapse -->
		</nav>
    </aside>
</div>
<!--left-fixed -navigation-->