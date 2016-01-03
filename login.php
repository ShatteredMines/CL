<?php
	$pageName = 'Log in';
	require_once('pages/header.php');
	
	$ownerIP = $_SERVER['REMOTE_ADDR'];
	
	// If already logged in move to home page
	if( $user->is_logged_in() ){ header('Location: index'); } 
	
	// Log the user in
	if(isset($_POST['submit'])){
		
		$username = $_POST['username'];
		$password = $_POST['password'];
		
		$userData = $db->fetch('SELECT * FROM `members` WHERE username = ? AND password = ?', array($username, $password));
		
		if($userData != false) {
			if ($userData['active'] == "Yes"){
				
				$_SESSION['loggedin'] = true;
				$_SESSION['username'] = $username;
				$_SESSION['userID'] = $userData['memberID'];
				
				$db->update('UPDATE members SET lastLoginIP = ? WHERE username = ?', array($ownerIP, $username));
				
				$findFollower = $db->count('SELECT COUNT(*) FROM followers WHERE followingID = ? AND followerID = ?', array($_SESSION['userID'], $_SESSION['userID']));
				if(!$findFollower) {
					$db->insert('INSERT INTO followers (followingID, followerID) VALUES (?, ?)', array($_SESSION['userID'], $_SESSION['userID']));                
				}
				
				header('Location: index');
			}
		} else $error[] = 'Your username or password may be invalid, you can reset it <a href="#">here</a>';
	}
	
?>
<style>
	.loginbox {
	width: 25%;
	margin-top: 25%;
	margin-right: auto;
	margin-left: auto;
	}
</style>

<div class="loginbox">
	<?php
		//check for any errors
		if(isset($error)){
			foreach($error as $error){
				echo '
				
				<div class="alert alert-dismissable alert-danger">
				<button type="button" class="close" data-dismiss="alert"><i class="fa fa-remove"></i></button>
				<p><i class="fa fa-question-circle"></i> '.$error.'.</p>
				</div>
				
				';
			}
		}
		
		
		if(isset($_GET['action'])){
			
			//check the action
			switch ($_GET['action']) {
				case 'active':
				echo "<h4 class='bg-success'>Your account is now active! You may now log in.</h4>";
				break;
				case 'reset':
				echo "<h4 class='bg-success'>Please check your email for the reset link.</h4>";
				break;
				case 'resetAccount':
				echo "<h4 class='bg-success'>Your password has been changed, you may now login!</h4>";
				break;
			}
		}
		
		if(isset($_GET['action']) && $_GET['action'] == 'joined'){
			echo "<h4 class='bg-success'><i class=\"fa fa-check\"></i> Please check your email to activate your account!</h4>";
		}
		
	?>
	<form action="login.php" method="post">
		Username:<br />
		<input type="text" class="form-control" name="username" value="" />
		Password:<br />
		<input type="password" class="form-control"  name="password" value="" />
		<p>Don't have an account? <a href="#">Register</a>!</p>
		<input class="btn btn-success" name="submit" type="submit" value="Log in" />
	</form>
</div>

<?php
	require_once('pages/footer.php');
	?>