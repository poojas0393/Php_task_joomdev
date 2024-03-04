<?php
    include_once('./rvcore_web/init.php');
    protect_page();
    include_once('./templete/header.php');
?>

<div id="page-wrapper">
    <div class="main-page login-page ">
        <h2 class="title1">Change Password</h2>
        <div class="widget-shadow">
            <div class="login-body">
    <?php echo output_errors($errors); ?>
                <form action="" method="post">
                	<div class="form-group">
                        <input type="hidden" name="id" value="<?php echo isset($_GET['id'])? $_GET['id'] : ''; ?>">
                    	<input type="password" class="user form-control" name="old_password" placeholder="Current Password">
					</div>
					<div class="form-group">
                    	<input type="password" name="password" class="lock form-control" placeholder="New Password">
					</div>
                    <input type="submit" name="change_password" value="Submit">
                </form>
            </div>
        </div>
    </div>
</div>