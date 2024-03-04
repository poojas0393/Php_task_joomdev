<?php
include_once('./rvcore_web/init.php');
protect_page();
//	logged_in_redirect();
include_once('./templete/header.php');

    
if (isset($_GET['success']) && empty($_GET['success']) ) {
	$errors[] = '<div class="alert alert-success alert-dismissable">
				  <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
				  <strong>Success!</strong> Order status Updated successfully.
				<meta http-equiv="refresh" content="5;url=./order" /></div>';
} elseif (isset($_GET['error']) && empty($_GET['error']) ) {
	$errors[] = '<div class="alert alert-danger alert-dismissable">
				  <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
				  <strong>Error!</strong> something went wrong please try again later..!
				</div>
				<meta http-equiv="refresh" content="5;url=./order" />';
}

?>
<script src='https://cloud.tinymce.com/stable/tinymce.min.js?apiKey=5czk9463grlhldnuq09qg8lxu0iul2br64amd8oenyjbe5e9'></script>
 <script>
  /*tinymce.init({
    selector: '#mytextarea'

  });*/
  	tinymce.init({
	  selector: "#mytextarea",  // change this value according to your HTML
	  theme: 'modern',
	  plugins: 'print preview fullpage powerpaste searchreplace autolink directionality advcode visualblocks visualchars fullscreen image link media template codesample table charmap hr pagebreak nonbreaking anchor toc insertdatetime advlist lists textcolor wordcount tinymcespellchecker a11ychecker imagetools mediaembed  linkchecker contextmenu colorpicker textpattern help',
	  toolbar1: 'formatselect | bold italic strikethrough forecolor backcolor | link | alignleft aligncenter alignright alignjustify  | numlist bullist outdent indent  | removeformat',
	  image_advtab: true,
	  templates: [
	    { title: 'Test template 1', content: 'Test 1' },
	    { title: 'Test template 2', content: 'Test 2' }
	  ],
	  content_css: [
	    '//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
	    '//www.tinymce.com/css/codepen.min.css'
	  ]
	});
  </script>
<!-- main content start-->
<div id="page-wrapper">
											
	<div class="main-page">
    <?php echo output_errors($errors); ?>
        <div class="forms">
	      <div class="form-grids row widget-shadow" data-example-id="basic-forms"> 
                <div class="form-title">
                    <h4>Add Employee</h4>
                </div>

                <div class="form-body">
                    <form class="form-horizontal" name="emp_form" action="" method="post" enctype="multipart/form-data">
                        <input type="hidden" id="hidden-input" name="my-hidden-input">

							
                        <div class="form-group">
                            <label for="focusedinput" class="col-sm-2 control-label">Firstname</label>
							<div class="col-sm-4">
                                <input type="text" class="form-control" id="focusedinput" name="emp_fname" value="<?php echo isset($_POST['emp_fname'])? $_POST['emp_fname'] : ''; ?>"  required="required">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="focusedinput" class="col-sm-2 control-label">Lastname</label>
							<div class="col-sm-4">
                                <input type="text" class="form-control" id="focusedinput" name="emp_lname" value="<?php echo isset($_POST['emp_lname'])? $_POST['emp_lname'] : ''; ?>"  required="required">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="focusedinput" class="col-sm-2 control-label">Email</label>
							<div class="col-sm-4">
                                <input type="text" class="form-control" id="focusedinput" name="email" value="<?php echo isset($_POST['email'])? $_POST['email'] : ''; ?>" >
                            </div>
                        </div>

                        <div class="form-group">

                            <label for="focusedinput" class="col-sm-2 control-label">Contact number</label>
							<div class="col-sm-4">
                                <input type="text" class="form-control" id="focusedinput" name="contact_number" value="<?php echo isset($_POST['contact_number'])? $_POST['contact_number'] : ''; ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="focusedinput" class="col-sm-2 control-label">Password</label>
							<div class="col-sm-4">
                                <input type="text" class="form-control" id="focusedinput" name="password" value="<?php echo isset($_POST['password'])? $_POST['password'] : ''; ?>" >
                            </div>
                            <button onclick="generatePassword()" class="btn btn-sm btn-primary">Generate Password</button>
                            <p id="demo"></p>
                        </div>

                    <div class="form-group">
                    	<div class="col-sm-offset-2 col-sm-10">
                    		<button type="submit" name="add_emp" class="btn btn-primary btn-lg text-center">Submit</button>
                    	</div>
	                </div>
                    </form>
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

		function generatePassword(length = 12) {
		    let generatedPassword = "";

		    const validChars = "0123456789" +
		        "abcdefghijklmnopqrstuvwxyz" +
		        "ABCDEFGHIJKLMNOPQRSTUVWXYZ" +
		        ",.-{}+!\"#$%/()=?";

		    for (let i = 0; i < length; i++) {
		        let randomNumber = crypto.getRandomValues(new Uint32Array(1))[0];
		        randomNumber = randomNumber / 0x100000000;
		        randomNumber = Math.floor(randomNumber * validChars.length);

		        generatedPassword += validChars[randomNumber];
		    }
		    emp_form.password.value = generatedPassword;
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