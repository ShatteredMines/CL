<?php
	require_once('includes/config.php');
	require_once('includes/functions.php');
	
	$ownerIP = $_SERVER['REMOTE_ADDR'];
	$myUser = $_SESSION['username'];
	$myID = $_SESSION['userID'];
	
	if(!empty($myUser)) {
		$info = $db->fetchAll("SELECT * FROM members WHERE username = ?", array($myUser));
		foreach($info as $data) {
			$myRank = $data['rank'];
		}
	}
?>

<!doctype html>
<html lang="en">
	<head>
		<?php siteTitle($siteName,$pageName); ?>
		<meta name="description" content="In Development">
		<meta name="keywords" content=""/>
		<meta name="author" content="">
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="css/main.css" rel="stylesheet">
		<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
		
		<?php if ($pageName == "Community Forums") { ?>
			<link rel="stylesheet" href="http://cdn.jsdelivr.net/emojione/1.3.0/assets/css/emojione.min.css"/>
			<link rel="stylesheet" href="/shoutbox/assets/css/shoutbox.css"  />
		<?php } ?>
		
		<?php if ($pageName == "Community Chat") { ?>
			<link rel="stylesheet" href="http://cdn.jsdelivr.net/emojione/1.3.0/assets/css/emojione.min.css"/>
			<link rel="stylesheet" href="/shoutbox/assets/css/shoutbox.css"  />
		<?php } ?>
		
		<script>
			(function(doc){var addEvent='addEventListener',type='gesturestart',qsa='querySelectorAll',scales=[1,1],meta=qsa in doc?doc[qsa]('meta[name=viewport]'):[];function fix(){meta.content='width=device-width,minimum-scale='+scales[0]+',maximum-scale='+scales[1];doc.removeEventListener(type,fix,true);}if((meta=meta[meta.length-1])&&addEvent in doc){fix();scales=[.25,1.6];doc[addEvent](type,fix,true);}}(document));
		</script>
		
		
	</head>
<body>				