<div id="page-wrapper">
    <div class="main-page login-page ">
        <?php echo output_errors($errors); ?>
        <h2 class="title1">Login</h2>
        <div class="widget-shadow">
            <div class="login-body">
                <form action="#" method="post">
                    <input type="email" class="user" name="email" placeholder="Enter Your Email">
                    <input type="password" name="password" class="lock" placeholder="Password">
<!--                    
    				<div class="forgot-grid">
                        <label class="checkbox"><input type="checkbox" name="checkbox" checked=""><i></i>Remember me</label>
                        <div class="forgot">
                            <a href="#">forgot password?</a>
                        </div>
                        <div class="clearfix"> </div>
                    </div>
-->
                    <input type="submit" name="signin" value="Sign In">
                    <!--<div class="registration">
                        Don't have an account ?
                        <a class="" href="signup">
                            Create an account
                        </a>
                    </div>-->
                </form>
            </div>
        </div>
    </div>
</div>