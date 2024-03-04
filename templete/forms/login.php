<div id="page-wrapper">
    <div class="main-page login-page ">
        <?php echo output_errors($errors); ?>
        <h2 class="title1">Login</h2>
        <div class="widget-shadow">
            <div class="login-body">
                <form action="" method="post">
                    <input type="email" class="user" name="email" placeholder="Enter Your Email">
                    <input type="password" name="password" class="lock" placeholder="Password">
                    <input type="submit" name="signin" value="Sign In">
                </form>
            </div>
        </div>
    </div>
</div>