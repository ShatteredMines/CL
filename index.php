<?php
	$pageName = 'Welcome!';
	require_once('pages/header.php');
	require_once('pages/sidebar.php');
	$action = $_GET['action'];
	
	if(!empty($myUser)) {
		$db->update('UPDATE members SET lastActive = NOW() WHERE username = ?', array($_SESSION['username']));
	}
	
	$onlineCount = $db->count('SELECT COUNT(*) FROM members WHERE lastActive >= NOW() - 1500');           
?>

<div class="container">
    <div class="row">   	
    	<div class="col-lg-9"> 
            <div class="panel panel-default">
                <div class="panel-heading"><i class="fa fa-bar-chart"></i> The Launch! (<a href="#" style="color:#fff;">Read more</a>)</div>
				<div class='panel-body' style='padding-top: 5px;'>    
					Welcome to the new website! This is still work in progress, so bare with it while we are working on it :) We are planning on having it done in a month or two!
				</div>
			</div>
		</div>
		
        <!--<div class="col-lg-3">
			<div class="panel panel-default">
                <div class="panel-heading"><i class="fa fa-user"></i> Welcome, <?php if(!$user->is_logged_in()) { ?>Guest<?php } else { echo $myUser; }?>!</div>
				<div class="panel-body">
                    <center>
						
						<div class="welcomeText" style="display: none;">
							
							<?php if(!$user->is_logged_in()) { ?>
								<div class="welcomebuttons">
									<a class="btn btn-sm btn-primary btn-welcome" href="login"><i class="fa fa-user"></i> Login</a>  
								</div>                    
								<?php } else { ?>  
								
								<div class="welcomebuttons">
									<a class="btn btn-sm btn-success btn-welcome" href="forums" style="width: 100%;"><i class="fa fa-comments"></i> Community Forums</a>
									<a class="btn btn-sm btn-danger btn-welcome" href="profile?id=<?php echo $myID; ?>" style="width: 100%; margin-top:5px;"><i class="fa fa-user"></i> View My Profile</a>
								</div>
							<?php } ?>
						</div>                
						
					</center>   
				</div>
			</div>        
			-->
		</div>      
	</div>    
</div>

<?php
	require_once('pages/footer.php');
?>