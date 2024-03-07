<?php
if (isset($_POST['add_task'])) {
	$start_time 		= $_POST['start_time'];
	$stop_time 			= $_POST['stop_time'];
	$notes 				= $_POST['notes'];
	$description 		= $_POST['description']; 
	date_default_timezone_set('Asia/Kolkata');
	$date = date('Y-m-d h:i:s', time());
	$insert_data = array(
			'start_time'  		=> $start_time,
			'stop_time'			=> $stop_time,
			'notes'				=> $notes,
			'description'		=> $description,
			'created_at'		=> $date,
			'emp_id'			=> $_SESSION['rvadminloginId']		
		);

	$result  = add_blog('emp_task', $insert_data);

			if($result == true){
				$errors[] = '<div class="alert alert-success alert-dismissable">
						  <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
						  <strong>Success!</strong> Task Added successfully.
						</div><meta http-equiv="refresh" content="2;url=./add-task" />';
			}else{
				$errors[] = '<div class="alert alert-danger alert-dismissable">
						  <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
						  <strong>Error!</strong> Something went wrong.
						</div><meta http-equiv="refresh" content="2;url=./add-task" />';
				echo mysqli_error($conn);
			}

}
if (isset($_POST['change_password'])) {
	$old_password 	= $_POST['old_password'];
	$password 		= $_POST['password'];
	$id 			= $_POST['id'];
	$sql="SELECT * FROM `employees` WHERE `id` =".$id." AND `password` = '".md5($old_password)."'";
    $result = mysqli_query($conn, $sql);
    $newpassword = md5($password);
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
		date_default_timezone_set('Asia/Kolkata');
		$date = date('Y-m-d h:i:s', time());

		$sql = "UPDATE employees SET `password` ='".$newpassword."', `change_password` = 1, 
		 `last_password_change` = '".$date ."' WHERE id=$id";
			;


	    if($conn->query($sql)) {
	        $errors[] = '<div class="alert alert-success alert-dismissable">
								  <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
								  <strong>Success!</strong> Password changed successfully.
								</div><meta http-equiv="refresh" content="2;url=./add-task" />';
	    }else {
		  	$errors[] = '<div class="alert alert-danger" role="alert">
	                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	                <strong>Error!</strong> Password not changed
	            </div>';
		}

	}else{
			$errors[] = '<div class="alert alert-success alert-dismissable">
								  <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
								  <strong>Error!</strong> Password is incorrect.
								</div><meta http-equiv="refresh" content="2;url=./add-task" />';
	}
}
/*-------------------------------------------- Sign in --------------------------------------------*/
if(isset($_POST['signin'])) {
	$username 		= $_POST['email'];
	$password 		= $_POST['password'];
    //echo $username.' '.$password; die();

    if (empty($username) === true || empty($password) === true) {
        $errors[] = '<div class="alert alert-danger" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <strong>Error!</strong> You need to enter a username and password.
                    </div>';
    } else if (emailExists($username) === false) {
        $errors[] = '<div class="alert alert-danger" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <strong>Error!</strong> We can\' find that email. Have you registered..?
                    </div>';
    } else if (userActive($username) === false) {
        $errors[] = '<div class="alert alert-danger" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <strong>Error!</strong> You haven\'t activated your account...!
                    </div>';
    } else {
        if (strlen($password) > 32) {
            $errors[] = '<div class="alert alert-danger" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <strong>Error!</strong> Password property too long. maximum length is 32.
                        </div>';
        }
        $login = loginVerify($username, $password);
        
        if ($login === false) {
            $errors[] = '<div class="alert alert-danger" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <strong>Error!</strong> That username/password combination is incorrects.
                        </div>';
        } else {
        // Set the user sessions
            $_SESSION['rvadminloginId'] = $login;
            $user = get_emp($login);
            date_default_timezone_set('Asia/Kolkata');
			$date = date('Y-m-d h:i:s', time());
	         
	         $sql = "UPDATE employees SET last_login='".$date."' WHERE id=$login";
			$conn->query($sql);

			$someDate = new \DateTime($user['last_password_change']);
			$now = new \DateTime();

			if($someDate->diff($now)->days > 30) {
			  	header('Location: ./change_password.php?id='.$login);
            	exit(); 
			}else{
			 	if ($user['change_password']  == 0 ){
	            	 header('Location: ./change_password.php?id='.$login);
	            	 exit(); 
	            }else{
	            	header('Location: ./add-task.php');
	            	exit(); 
	            }
			}
        }
	}
}
 
if(isset($_POST["export"])){
      header('Content-Type: text/csv; charset=utf-8');  
      header('Content-Disposition: attachment; filename=Task-Report.csv');  
      $output = fopen("php://output", "w");  
      fputcsv($output, array('ID', 'Start time', 'Stop Time', 'Notes', 'Description','Created At','Emp id'));  
      $query = "SELECT * from emp_task ORDER BY id DESC";  
      $result = mysqli_query($conn, $query);  
      while($row = mysqli_fetch_assoc($result)){  
           fputcsv($output, $row);  
      }
      fclose($output);
}  
if(isset($_POST['add_emp'])){
	//print_r($_POST); exit;
	$required_fields = array('emp_fname','emp_lname','email','contact_number','password');
		foreach($_POST as $key=>$value) {
		if (empty($value) && in_array($key, $required_fields) === true) {
			$errors[] = '<div class="alert alert-danger" role="alert">
							<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<strong>Error! </strong>'.$key.' required.
							</div>';
				break 1;
			}
		}
		

		if (empty($errors) === true) {
			if (strlen($_POST['password']) < 8 || strlen($_POST['password']) > 32) {
			$errors[] = '<div class="alert alert-danger" role="alert">
							<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<strong>Error!</strong> Your password must be at least Min-8 and Max-32 characters .
						</div>';
			}	
			date_default_timezone_set('Asia/Kolkata');
			$date = date('Y-m-d h:i:s', time());
			$adddata = array(
					'emp_fname'		=>	isset($_POST['emp_fname'])? str_replace('\'', '', $_POST['emp_fname']): '',
					'emp_lname'		=>	isset($_POST['emp_lname'])? str_replace('\'', '', $_POST['emp_lname']): '',
					'email'			=>	isset($_POST['email'])? str_replace('\'', '', $_POST['email']): '',
					'contact_number'	=>	isset($_POST['contact_number'])? str_replace('\'', '', $_POST['contact_number']): '',
					'created_at'		=>	$date,
					'password'			=> md5($_POST['password']),	
					'active'		=>	1
			);

			$result  = add_blog('employees', $adddata);

			if($result == true){
				$errors[] = '<div class="alert alert-success alert-dismissable">
						  <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
						  <strong>Success!</strong> Doctor Added successfully.
						</div><meta http-equiv="refresh" content="2;url=./add-doctor" />';
			}else{
				$errors[] = '<div class="alert alert-danger alert-dismissable">
						  <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
						  <strong>Error!</strong> Something went wrong.
						</div><meta http-equiv="refresh" content="2;url=./add-doctor" />';
				echo mysqli_error($conn);
			}
		}
}


 

if(isset($_POST['signup'])) {
	$required_fields = array('fname', 'lname', 'email', 'password', 'passwordagain', 'contact');
//	echo '<pre>', print_r($_POST), '</pre>';
	foreach($_POST as $key=>$value) {
		if (empty($value) && in_array($key, $required_fields) === true) {
			$errors[] = '<div class="alert alert-danger" role="alert">
							<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<strong>Error!</strong> Fields marked with an asterisk (*) are required.
						</div>';
			break 1;
		}
	}
	if (empty($errors) === true) {	
/*--------------------------------------------  User Name Chaecking statement  --------------------------------------------*/
		if (emailExists($_POST['email']) === true) {
			$errors[] = '<div class="alert alert-danger" role="alert">
							<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<strong>Error!</strong> Sorry, The email id \''. $_POST['email'] . '\' is already taken.
						</div>';
		}
/*------------------------------------------  Username not contain any space  --------------------------------------------*/
		if (preg_match("/\\s/", $_POST['email']) == true) {
			$errors[] = '<div class="alert alert-danger" role="alert">
							<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<strong>Error!</strong> Your Email address must not contain any spaces.
						</div>';
		}
/*-------------------------------------------------  Valid Email of Phone Address  -------------------------------------------------*/
		if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) === false) {
			$errors[] = '<div class="alert alert-danger" role="alert">
							<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<strong>Error!</strong> A Valid email address is required.
						</div>';
		}
/*--------------------------------------------------  Password Leanght  ---------------------------------------------------*/            
		if (strlen($_POST['password']) < 8 || strlen($_POST['password']) > 32) {
			$errors[] = '<div class="alert alert-danger" role="alert">
							<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<strong>Error!</strong> Your password must be at least Min-8 and Max-32 characters .
						</div>';
		}	
/*------------------------------------------  Password & Password again are equal  ----------------------------------------*/
		if ($_POST['password'] !== $_POST['passwordagain']) {
			$errors[] = '<div class="alert alert-danger" role="alert">
							<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<strong>Error!</strong> Your password do not match.
						</div>';
		}
	}
}
if (isset($_GET['rsuccess']) && empty($_GET['rsuccess']) ) {
	$errors[] = '<div class="alert alert-success alert-dismissable">
				  <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
				  <strong>Success!</strong> You\'ve been registered successfully.<br />Please check your email to activate your account..!
				</div>
				<meta http-equiv="refresh" content="5;url=./" />';
} else {
	if (empty($_POST['signup']) === false && empty($errors) === true) {
		$register_data = array(
		// Users details					
			'fname'				=> $_POST['fname'],
			'lname'				=> $_POST['lname'],
			'email'				=> $_POST['email'],
			'contact'			=> $_POST['contact'],
			'password'			=> md5($_POST['password']),	
			
		// Get the Client's IP, Host, Port					
			'user_ip'			=> getUserIpAddr(),
//	        'user_host'         => $_SERVER['REMOTE_HOST'],
			'user_port'			=> $_SERVER['REMOTE_PORT'],

		// Email & Contact Verify codes					
			'email_code'		=> md5(($_POST['email'])),
			'contact_code'		=> substr(md5(rand(100000, 999999)), 0, 6),
			
		// Time of account create					
			'creating'			=> date("Y-m-d h:i:sa"),	
			'modified'			=> date("Y-m-d h:i:sa"),	
		);
		
		$registerUser = registerUser($register_data);
		if($registerUser===true) {
            header('Location: ./?rsuccess');
            exit(); 
		} elseif($registerUser===false) { echo 'Something error'; }		

	}
}



?>