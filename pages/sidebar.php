<?php
	// If not logged in, send to login page
	if(!$user->is_logged_in()){ header('Location: login'); exit(); }
	
	if(!empty($myUser)) {
		$db->update('UPDATE members SET lastActive = NOW() WHERE username = ?', array($_SESSION['username']));
	}
?>
<style>
	.sidebar {
	background-color: gray;
	width: 350px;
	height: 100%;
	
	}
	.proflepicture {
	
	}
</style>

<div class="sidebar">
	<div class="proflepicture">
	<img width="100px" height="100px" src="https://cravatar.eu/helmavatar/ShatteredMines<?php// echo $ownerName; ?>/150.png">
	</div>
	Welcome, <?php echo $myUser; ?>!
</div>