<?php
function get_emp($id) {
    global $conn;
    $sql="SELECT * FROM `employees` WHERE `id` ='".$id."'";
    $result = mysqli_query($conn, $sql);
    
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        return $row;
    } else {
       //header("Location: ../404");
    }
}


/************** GET ALL Patients data **********************/
function all_patient($orderby){
    global $conn;
    date_default_timezone_set('Asia/Kolkata');
    $date = date('Y-m-d h:i:s', time());
            
    $sql = "SELECT * FROM patient ORDER BY created_at $orderby ";
    
    $result = $conn->query($sql);
    //print_r($sql); exit();
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
        return $data;
    } else { return false; }
    $conn->close();
}
/************** GET PATIENT BY ID **********************/
function get_patient_byid($id){
    global $conn;
    $sql = "SELECT * FROM patient WHERE id= $id";
    
     $result = mysqli_query($conn, $sql);
    
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        //print_r($row);  
        return $row;
    } else {
       //header("Location:../404");
        echo '<h5 class="popular-empty">No data available </h5>';
    }
}
/************** GET ALL ENQUIRIES **********************/
function get_enquiry_byid($id){
    global $conn;
    $sql = "SELECT * FROM inquiries WHERE id= $id AND deleted = '0' ";
    
     $result = mysqli_query($conn, $sql);
    
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        //print_r($row);  
        return $row;
    } else {
       //header("Location:../404");
        echo '<h5 class="popular-empty">No data available </h5>';
    }
}
/************** GET ALL ENQUIRIES **********************/
function all_enquiry($orderby){
    global $conn;
    date_default_timezone_set('Asia/Kolkata');
    $date = date('Y-m-d h:i:s', time());
            
    $sql = "SELECT * FROM inquiries WHERE deleted = '0' ORDER BY created_at $orderby ";
    
    $result = $conn->query($sql);
    //print_r($sql); exit();
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
        return $data;
    } else { return false; }
    $conn->close();
}
/*********************** PLACE BY ID **********************/
function place_by_id($id){
    global $conn;
    $sql="SELECT * FROM places WHERE `id` ='".$id."' AND `active` = '1'";
    $result = mysqli_query($conn, $sql);
    
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        //print_r($row);  
        return $row;
    } else {
       //header("Location:../404");
        echo '<h5 class="popular-empty">Wrong data provided</h5>';
    }
}
/********************** DESTINATION PLACES LIST **************************/
function places(){
    global $conn;
    $sql = "SELECT * FROM places WHERE `active` = '1'";
    
    $result = $conn->query($sql);
    //print_r($sql); exit();
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
        return $data;
    } else { return false; }
    $conn->close();
}
/************************ ADD PLACES DATA ***************************************/
function add_placeentry($table,$register_data){
    $result =rowInsert($table, $register_data);
    if ($result == true) {
        return true;
    }else{
        return false;
    }
}
/************************ ADD TRANSPORT DATA ***************************************/
function add_transportentry($table,$register_data){
    $result =rowInsert($table, $register_data);
    if ($result == true) {
        return true;
    }else{
        return false;
    }
}
/************************ ADD DESTINATION DATA ***************************************/
function add_destentry($table,$register_data){
    $result =rowInsert($table, $register_data);
    if ($result == true) {
        return true;
    }else{
        return false;
    }
}
/*********************** GET DEST SLUG ***************************/
function dest_by_id($id){
    global $conn;
    $sql="SELECT * FROM destinations WHERE `id` ='".$id."'";
    $result = mysqli_query($conn, $sql);
    
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        //print_r($row);  
        return $row;
    } else {
       //header("Location:../404");
        echo '<h5 class="popular-empty">No data available </h5>';
    }
}
/*********************** GET DEST ID ***************************/
function dest_by_slug($slug){
    global $conn;
    $sql="SELECT * FROM destinations WHERE `slug` ='".$slug."'";
    $result = mysqli_query($conn, $sql);
    
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        //print_r($row);  
        return $row;
    } else {
       //header("Location:../404");
        echo '<h5 class="popular-empty">No data available </h5>';
    }
}
/********************** GET THERE DATA **************************/
function transport_data($city){
    global $conn;
    $sql="SELECT * FROM transport_dest WHERE `city` ='".$city."' AND `active` = '1'";
    $result = mysqli_query($conn, $sql);
    
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        //print_r($row);  
        return $row;
    } else {
       //header("Location:../404");
        echo '<h5 class="popular-empty">No data available right now</h5>';
    }
}
/********************** DESTINATION PLACES LIST **************************/
function places_list($city){
    global $conn;
    $sql = "SELECT * FROM places WHERE `city` ='".$city."' AND `active` = '1'";
    
    $result = $conn->query($sql);
    //print_r($sql); exit();
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
        return $data;
    } else { return false; }
    $conn->close();
}
/********************** DESTINATION DATA **************************/
function destination_list(){
    global $conn;
    $sql = "SELECT * FROM destinations WHERE `active` = '1'";
    
    $result = $conn->query($sql);
    //print_r($sql); exit();
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
        return $data;
    } else { return false; }
    $conn->close();
}
/**************************** ADD NEW BLOG **************************************************/
function add_webcontent($table, $register_data){
    $result =rowInsert($table, $register_data);
    if ($result == true) {
        return true;
    }else{
        return false;
    }
}
/********************Category data from id*****************************/
function webcontent_data($id){
    global $conn;
    $sql="SELECT * FROM `webcontent` WHERE `id` ='".$id."'";
    $result = mysqli_query($conn, $sql);
    
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        //print_r($row);  
        return $row;
    } else {
       //header("Location: ../404"); 
        echo mysqli_error($conn);
    }
}
/*############################### Get WEB CONTENT data ##########################*/
function get_webcontent($id) {
    global $conn;
    $sql="SELECT * FROM `webcontent` WHERE `id` ='".$id."'";
    $result = mysqli_query($conn, $sql);
    
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        //print_r($row);  
        return $row;
    } else {
       //header("Location: ../404");
    }
}
/**************************** ADD NEW TREATMENT CATEGORY***************************************/
function add_treat_category($table, $register_data){
    $result =rowInsert($table, $register_data);
    if ($result == true) {
        return true;
    }else{
        return false;
    }
}
/**************************** ADD NEW BLOG **************************************************/
function add_blog($table, $register_data){
    $result =rowInsert($table, $register_data);
    if ($result == true) {
        return true;
    }else{
        return false;
    }
}
/**************************** ADD NEW TREATMENT **************************************************/
function add_treatment($table, $register_data){
    $result =rowInsert($table, $register_data);
    if ($result == true) {
        return true;
    }else{
        return false;
    }
}
/********************Category data from id*****************************/
function category_data($id){
    global $conn;
    $sql="SELECT * FROM `treatments_categories` WHERE `id` ='".$id."'";
    $result = mysqli_query($conn, $sql);
    
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        //print_r($row);  
        return $row;
    } else {
       //header("Location: ../404"); 
        echo mysqli_error($conn);
    }
}
/********************check for Categories*****************************/
function check_cat_exist($category) {
    global $conn;
    $sql="SELECT * FROM `treatments` WHERE `category` ='".$category."'";
    $result = $conn->query($sql);
    //print_r($result);
    if ($result->num_rows > 0) {
        return "false";
    }else{
        return "true";
    }    
}
/*----------------------- Treatment Categories List -------------------------------*/

function treatment_cat_List($orderby) {
    global $conn;
    $sql = "SELECT * FROM treatments_categories WHERE active = '1' ORDER BY id $orderby ";
    
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
        return $data;
    } else { return false; }
    $conn->close();
}
/********************All Categories*****************************/
function get_category(){
    global $conn;
    $sql="SELECT * FROM `treatments_categories` WHERE `active` ='1'";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
        return $data;
    } else { return false; }
}
/*------------------------------------  Test Limmiter --------------------------------------*/
function limit_text($x, $length) {
	if(strlen($x)<=$length) { echo $x; } else { $y=substr($x,0,$length) . '...'; echo $y; }
}

/*----------------------------------------------  Adjust Server Time  ------------------------------------------------*/
function modifiedTime($datetime, $modified) {
	$date = new DateTime($datetime);
	$date->modify($modified);
	return $date->format('Y-m-d h:i:s');
}
/* Ex.
$datetime = date("Y-m-d h:i:sa");
echo modifiedTime($datetime, '+10 minute');	
*/
/*############################### Get doctors data ##########################*/
function get_doc_info($id) {
    global $conn;
    $sql="SELECT * FROM `doctors` WHERE `id` ='".$id."'";
    $result = mysqli_query($conn, $sql);
    
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        //print_r($row);  
        return $row;
    } else {
       //header("Location: ../404");
    }
}
/*############################### Get blog data ##########################*/
function get_blog_info($id) {
    global $conn;
    $sql="SELECT * FROM `blogs` WHERE `id` ='".$id."'";
    $result = mysqli_query($conn, $sql);
    
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        //print_r($row);  
        return $row;
    } else {
       //header("Location: ../404");
    }
}
/*------------------------------------  detect browse --------------------------------------*/
function getBrowser() { 
    $u_agent = $_SERVER['HTTP_USER_AGENT']; 
    $bname = 'Unknown';
    $platform = 'Unknown';
    $version= "";

    //First get the platform?
    if (preg_match('/linux/i', $u_agent)) {
        $platform = 'linux';
    } elseif (preg_match('/macintosh|mac os x/i', $u_agent)) {
        $platform = 'mac';
    } elseif (preg_match('/windows|win32/i', $u_agent)) {
        $platform = 'windows';
    }

    // Next get the name of the useragent yes seperately and for good reason
    if(preg_match('/MSIE/i',$u_agent) && !preg_match('/Opera/i',$u_agent)) { 
        $bname = 'Internet Explorer'; 
        $ub = "MSIE"; 
    } elseif(preg_match('/Trident/i',$u_agent)) { // this condition is for IE11
        $bname = 'Internet Explorer'; 
        $ub = "rv"; 
    } elseif(preg_match('/Firefox/i',$u_agent)) { 
        $bname = 'Mozilla Firefox'; 
        $ub = "Firefox"; 
    } elseif(preg_match('/Chrome/i',$u_agent)) { 
        $bname = 'Google Chrome'; 
        $ub = "Chrome"; 
    } elseif(preg_match('/Safari/i',$u_agent)) { 
        $bname = 'Apple Safari'; 
        $ub = "Safari"; 
    } elseif(preg_match('/Opera/i',$u_agent)) { 
        $bname = 'Opera'; 
        $ub = "Opera"; 
    } elseif(preg_match('/Netscape/i',$u_agent)) { 
        $bname = 'Netscape'; 
        $ub = "Netscape"; 
    } 
    
    // finally get the correct version number
    // Added "|:"
    $known = array('Version', $ub, 'other');
    $pattern = '#(?<browser>' . join('|', $known) .')[/|: ]+(?<version>[0-9.|a-zA-Z.]*)#';
    if (!preg_match_all($pattern, $u_agent, $matches)) {
        // we have no matching number just continue
    }

    // see how many we have
    $i = count($matches['browser']);
    if ($i != 1) {
        //we will have two since we are not using 'other' argument yet
        //see if version is before or after the name
        if (strripos($u_agent,"Version") < strripos($u_agent,$ub)){
            $version= $matches['version'][0];
        } else {
            $version= $matches['version'][1];
        }
    } else {
        $version= $matches['version'][0];
    }

    // check if we have a number
    if ($version==null || $version=="") {$version="?";}

    return array(
        'userAgent' => $u_agent,
        'name'      => $bname,
        'version'   => $version,
        'platform'  => $platform,
        'pattern'   => $pattern
    );
} 
// now try it
/*
	$ua=getBrowser();
	$yourbrowser= "Your browser: " . $ua['name'] . " " . $ua['version'] . " on " .$ua['platform'] . " reports: <br >" . $ua['userAgent'];
	print_r($yourbrowser);
*/

/*------------------------------ Current date/time in the specified time zone ------------------------------*/
function datetimeZone($zone) {
	$date = new DateTime(null, new DateTimeZone($zone));
	return $date->format('Y-m-d H:i:sP');	
}
/// Ex echo datetimeZone('asia/kolkata');
function get_treatement($id) {
    global $conn;
    $sql="SELECT * FROM `treatments` WHERE `id` ='".$id."'";
    $result = mysqli_query($conn, $sql);
    
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        //print_r($row);  
        return $row;
    } else {
       //header("Location: ../404");
    }
}
/*############################### Get doctors data ##########################*/
function get_docdata($id) {
    global $conn;
    $sql="SELECT * FROM `employees` WHERE `id` ='".$id."'";
    $result = mysqli_query($conn, $sql);
    
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        //print_r($row);  
        return $row;
    } else {
       //header("Location: ../404");
    }
}
/*############################### Get treat category data ##########################*/
function get_tcategory_data($id) {
    global $conn;
    $sql="SELECT * FROM `treatments_categories` WHERE `id` ='".$id."'";
    $result = mysqli_query($conn, $sql);
    
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        //print_r($row);  
        return $row;
    } else {
       //header("Location: ../404");
    }
}
/*############################### Get Blog data ##########################*/
function get_blogdata($id) {
    global $conn;
    $sql="SELECT * FROM `blogs` WHERE `id` ='".$id."'";
    $result = mysqli_query($conn, $sql);
    
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        //print_r($row);  
        return $row;
    } else {
       //header("Location: ../404");
    }
}
/*------------------------------------ Report List --------------------------------------*/

function taskList($orderby) {
    global $conn;
    $sql = "SELECT * FROM emp_task ORDER BY id $orderby ";
    
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
        return $data;
    } else { return false; }
    $conn->close();
}
/*------------------------------------ Doctors List --------------------------------------*/


function doctorsList($orderby) {
    global $conn;
    $sql = "SELECT * FROM employees WHERE active = '1' ORDER BY id $orderby ";
    
    $result = $conn->query($sql);
    //print_r($result); exit();
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
        return $data;
    } else { return false; }
    $conn->close();
}
/*------------------------------------ Blogs List --------------------------------------*/

function blogsList($orderby) {
    global $conn;
    $sql = "SELECT * FROM blogs WHERE active = '1' ORDER BY id $orderby ";
    
    $result = $conn->query($sql);
    //print_r($result); exit();
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
        return $data;
    } else { return false; }
    $conn->close();
}
/*------------------------------------  treatmentsList --------------------------------------*/

function treatmentsList($orderby) {
    global $conn;
    $sql = "SELECT * FROM treatments WHERE active = '1' ORDER BY id $orderby ";
    
    $result = $conn->query($sql);
    //print_r($result); exit();
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
        return $data;
    } else { return false; }
    $conn->close();
}

/*---------------------------------------- Get Domain Name from URL ----------------------------------------*/
function getDomain($url){
    $pieces = parse_url($url);
    $domain = isset($pieces['host']) ? $pieces['host'] : '';
    if(preg_match('/(?P<domain>[a-z0-9][a-z0-9\-]{1,63}\.[a-z\.]{2,6})$/i', $domain, $regs)){
        return $regs['domain'];
    }
    return FALSE;
}
//echo getDomain("http://example.com"); // outputs 'example.com'
//echo getDomain("http://www.example.com"); // outputs 'example.com'
//echo getDomain("http://mail.example.co.uk"); // outputs 'example.co.uk'

/*-------------------------------------------- Get URL Segments --------------------------------------------*/
function urlSegments($url='') {
	if(empty($url)) { $url = $_SERVER['REQUEST_URI']; }
	return explode("/", parse_url($url, PHP_URL_PATH));	
}
/*
$uriSegments = urlSegments();
print_r($uriSegments);
echo $uriSegments[1]; //returns codex
echo $uriSegments[2]; //returns foo
echo $uriSegments[3]; //returns bar

// Get Last URL Segment
$lastUriSegment = array_pop($uriSegments);
echo $lastUriSegment; //returns bar
*/

/*------------------------------------------- Validate input data ------------------------------------------*/
function validInput($data) {
	if(preg_match("/^([a-zA-Z' ]+)$/",$data)){
		echo 'Valid name given.';
	}else{
		echo 'Invalid name given.';
	}
}


/*-------------------------------- Output Functions for All Errors Displays --------------------------------*/
function output_errors($errors) { return implode('', $errors); }
// Ex output_errors($errors);

/*--------------------------------------------  Get IP Address  --------------------------------------------*/
function getUserIpAddr(){
    if(!empty($_SERVER['HTTP_CLIENT_IP'])){
        //ip from share internet
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    }elseif(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
        //ip pass from proxy
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    }else{
        $ip = $_SERVER['REMOTE_ADDR'];
    }
    return $ip;
}
//  echo 'User Real IP - '.getUserIpAddr();

/*------------------------- Auto copyrights ( Start date with error protection ) --------------------------*/
function auto_copyright($year = 'auto'){
	if(intval($year) == 'auto'){ $year = date('Y'); }
	if(intval($year) == date('Y')){ echo intval($year); }
	if(intval($year) < date('Y')){ echo intval($year) . ' - ' . date('Y'); }
	if(intval($year) > date('Y')){ echo date('Y'); }
}
// ex
//  auto_copyright(); auto_copyright("2010");

?> 