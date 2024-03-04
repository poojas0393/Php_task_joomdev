<?php
include_once('./rvcore_web/init.php');
protect_page();
//  logged_in_redirect();
include_once('./templete/header.php');

if (isset($_GET['id']) && !empty($_GET['id'])) {
    $data = get_webcontent($_GET['id']);
    //print_r($data);
}
    
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
                    <h4>Edit Web content of <?php echo ucwords(str_replace("_"," ",$data['section'])) ?></h4>
                </div>

                <div class="form-body">
                    <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
                        <input type="hidden" id="hidden-input" name="id" value="<?php echo isset($data['id'])? $data['id'] : ''; ?>">

                    <div class="form-group">
                        <label for="focusedinput" class="col-sm-2 control-label">Page Title</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="focusedinput" name="title" value="<?php echo isset($data['title'])? $data['title'] : ''; ?>"  required="required">
                            <p class="note">Example: Joint Replacement / Bone treatments</p>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">Description</label><br>
                        <div class="col-sm-10">
                            <textarea id="mytextarea" required="required" name="body" style="height: 500px"><?php echo isset($data['body'])? $data['body'] : ''; ?>
                            </textarea>                         
                        </div>
                    </div>

                    <div class="form-group">
                            <label class="col-sm-2 control-label">Picture</label>
                            <div class="col-sm-3">
                                <input type="file" name="image" class="form-control" value="<?php echo isset($data['image'])? $data['image'] : ''; ?>">
                            </div>
                            <label class="col-sm-1 control-label">Alt Text </label>
                            <div class="col-sm-2">
                                <input type="text" name="alt_text" class="form-control" value="<?php echo isset($data['alt_text'])? $data['alt_text'] : ''; ?>">
                            </div>
                            <label class="col-sm-2 control-label">Title Text </label>
                            <div class="col-sm-2">
                                <input type="text" name="image_title" class="form-control" value="<?php echo isset($data['image_title'])? $data['image_title'] : ''; ?>">
                            </div>
                        </div>

                    <div class="form-group">
                        <label for="meta-title" class="col-sm-2 control-label">Meta Title</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="meta-title" name="seo_title" 
                            value="<?php echo isset($data['seo_title'])? $data['seo_title'] : ''; ?>" >
                        <p class="note">Example: Oncology Treatment 10 best hospitals | medcureindia</p>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="meta-des" class="col-sm-2 control-label">Meta Desciption</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" rows="5" id="meta-des" name="seo_description"><?php echo isset($data['seo_description'])? $data['seo_description'] : ''; ?></textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="meta-title" class="col-sm-2 control-label">Meta Keywords</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control1" id="meta-title" name="seo_keywords" value="<?php echo isset($data['seo_keywords'])? $data['seo_keywords'] : ''; ?>" >
                        <p class="note">Example: medical tourism, cosmetic surgery in India, knee replacement, Lasik Surgery</p>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" name="edit_webcontent" class="btn btn-primary btn-lg text-center">Submit</button>
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