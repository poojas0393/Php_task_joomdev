<?php
/*------------------------------------------------------  Loggedin Redirect  ----------------------------------------------------*/
function logged_in_redirect() {
    if (logged_in() === true) {
        header('Location: ./');
        exit();
    }
}

/*-------------------------------------- Web Pages protected if user not logged in Function -------------------------------------*/
function protect_page() {
    if (logged_in() === false) {
        header('Location: ./');
        exit();
    }
}


/*---------------------------------------------------------  Send sms  ----------------------------------------------------------*/
function emailSend($to,$subject,$htmlContent,$headers) {	
	if(mail($to,$subject,$htmlContent,$headers)) {
		return true;
	} else {
		return false;
	}
}

/*---------------------------------------------------------  Send sms  ----------------------------------------------------------*/
function smsSend($contact, $message) {
		//request parameters array
	$params = array(
		'user'      => 'Munadi01',
		'key'       => '044b1aab5dXX',
		'mobile'    => $contact,
		'message'   => $message,
		'senderid'  => 'Munadi',
		'accusage'  => '1'
	);
	
	//merge API url and parameters
	$apiUrl = "http://sms.munadi.in/submitsms.jsp?";
	foreach($params as $key => $val){
		$apiUrl .= $key.'='.urlencode($val).'&';
	}
	$apiUrl = rtrim($apiUrl, "&");
	
	//API call
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $apiUrl);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	
	curl_exec($ch);
	curl_close($ch);	
}

/*------------------------------------------  User Activations by email verification  -------------------------------------------*/
function activate($email, $email_code) {
        
}

/*-----------------------------------------------------  User Registration  ------------------------------------------------------*/
function registerVendor($register_data) {
	$result =rowInsert('vendor_account', $register_data);
	if($result===true) {
		return true;
	} elseif($result===false) {
		return false;
	}
}

/*-----------------------------------------------------  User Registration  ------------------------------------------------------*/
function registerUser($register_data) {
	$result =rowInsert('admin_users', $register_data);
	
	$encrypt 	= md5($register_data['email']);
	$email 		= $register_data['email'];
	$ecode 		= $register_data['email_code'];
	
	if($result===true) {
		$to = $register_data['email'];
		$subject = "Activate your account";
		
		// Get HTML contents from file
		//$htmlContent  = file_get_contents("mailbox/varify1.html");
		$htmlContent = '<html>
			<head>
				<title>Welcome to City Delivery</title>
			</head>
			<body>
				<h1>Thanks you for joining with us!</h1>
				<table cellspacing="0" style="border: 2px dashed #FB4314; width: 300px; height: 200px;padding: 15px;">
					<tr>
						<td style="text-align: center;">
							<h2>Click the button for activate your account</h2>
						</td>
					</tr>
					<tr>
						<td style="text-align: center;">
							<a style="background-color: #239CFF;color: #fff;text-decoration: none;border-radius: 2px;padding: 10px;" href="http://rvtechnosols.com/46f86faa6bbf9ac94a7e459509a20ed0/city4f8936efd07abcf41da694c5ff0b572f/activate?x=rv'.$encrypt.'ts&e='.$email.'&c='.$ecode.'">Activate Your Account</a>
						</td>
					</tr>
				</table>
			</body>
			</html>';
		
		// Set content-type for sending HTML email
		$headers = "MIME-Version: 1.0" . "\r\n";
		$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
		
		// Additional headers
		$headers .= 'From: City Delivery <demo@rvtechnosols.com>' . "\r\n";
		// $headers .= 'Cc: rvtechnosols@gmail.com' . "\r\n";
		
		if(mail($to,$subject,$htmlContent,$headers)) {
			return true;
		} else {
			return false;
		}
	} elseif($result===false) {
		return false;
	}
}

/*----------------------------------------------  All Active User Count in db  --------------------------------------------------*/
function loginCount() {
    
}

/*----------------------------------------------------  User Session Start  ----------------------------------------------------*/
function logged_in() {
    return (isset($_SESSION['rvadminloginId']) && !empty($_SESSION['rvadminloginId'])) ? true : false;
}

/*---------------------------------------  Vendors Email id is already exists Functions  ---------------------------------------*/ 
function vendorEmailExists($email) {
    $condition = array('email' => $email,);
	$result = rowCount('vendor_account', $condition);
	if($result=='1') { return true; } elseif($result<'1') { return false; } elseif($result>'1') { return false; }
}
/*-------------------------------------- Slug is already exists Functions -----------------------------------*/ 
function slugExists($slug, $table) {
    $condition = array('slug' => $slug,);
	$result = rowCount($table, $condition);
	if($result=='1') { return true; } elseif($result<'1') { return false; } elseif($result>'1') { return false; }
}
/*-----------------------------------------  User Email id is already exists Functions  -----------------------------------------*/ 
function emailExists($email) {
    $condition = array('email' => $email,);
	$result = rowCount('employees', $condition);
	if($result=='1') { return true; } elseif($result<'1') { return false; } elseif($result>'1') { return false; }
}

/*-----------------------------------------  User Contact No is already exists Functions  ---------------------------------------*/ 
function contactExists($contact) {
    $condition = array('contact' => $contact,);
	$result = rowCount('employees', $condition);
	if($result=='1') { return true; } elseif($result<'1') { return false; } elseif($result>'1') { return false; }
}

/*--------------------------------------------  Username is already exists Functions  -------------------------------------------*/ 
function usernameExists($username) {
    $condition = array('username' => $username,);
	$result = rowCount('employees', $condition);
	if($result=='1') { return true; } elseif($result<'1') { return false; } elseif($result>'1') { return false; }
}

/*-------------------------------------------  User is active or Not active Functions  -----------------------------------------*/ 
function userActive($email) {
    $condition = array(
        'email' => $email,
        'active' => '1'
    );
	$result = rowCount('employees', $condition);
	if($result=='1') { return true; } elseif($result<'1') { return false; } elseif($result>'1') { return false; }
}

/*---------------------------------------------------  Normal log in Functions  --------------------------------------------------*/ 
function loginVerify($username, $password) {
    $condition = array(
		'email' => $username,
		'password' => md5($password),
	);
	$result = rowCount('employees', $condition);
	if($result=='1') {
        $condition = array( 'email'  => $username );
        $tabledata = rowSelect('employees', $condition, 'id');
        $tableList = $tabledata['data'];
        return $tableList[0]['id'];        
    } elseif($result<'1') { return false; } elseif($result>'1') { return false; }
}

/*---------------------------------------------------  Secure log in Functions  --------------------------------------------------*/ 
function securelogin($username, $password) {
    
}
?>