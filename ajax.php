<?php
require_once('../config.php');
require_once('../includes/functions.php');
require_once('../includes/languages.php');

if($_REQUEST['newstar'] == 'login') {
	session_start();
	$username = $_REQUEST['name'];
	$password = md5($_REQUEST['password']);
	$q = mysql_query("SELECT * FROM users WHERE username='".$username."' OR email='".$username."' AND password='".$password."' AND active='1'");
	$num_row = mysql_num_rows($q);
	$row = mysql_fetch_array($q);
	if($num_row == 1) {
		echo 'true';
		$_SESSION['username'] = $row['username'];
		$_SESSION['email'] = $row['email'];
		$_SESSION['id'] = $row['id'];
		
	} else {
		echo $LANG['TITLE_WRONG_USERNAME_OR_PASSWORD'];
	}
}

if($_REQUEST['newstar'] == 'register') {
	session_start();
	$username = $_REQUEST['name'];
	$email = $_REQUEST['email'];
	$password = md5($_REQUEST['password']);
	if($username || $email || $password) {
	$insert = mysql_query("INSERT INTO users (username, email, password) VALUES ('".$username."', '".$email."', '".$password."')");
	$q = mysql_query("SELECT * FROM users WHERE username='".$username."' OR email='".$username."' AND password='".$password."' AND active='1'");
	$num_row = mysql_num_rows($q);
	$row = mysql_fetch_array($q);
	if($num_row == 1) {
			echo 'true';
			$_SESSION['username'] = $row['username'];
			$_SESSION['email'] = $row['email'];
			$_SESSION['id'] = $row['id'];
	} else {
		$num_username = mysql_num_rows(mysql_query("SELECT * FROM users WHERE username='".$username."'"));
		if($num_username != 1) {
			echo $LANG['TITLE_USERNAME_TAKEN'];
		} else {
			echo $LANG['TITLE_FILL_OUT'];
		}
	}
	} else {
		echo $LANG['TITLE_FILL_OUT'];
	}
}

if($_REQUEST['newstar'] == 'new_playlist') {
	session_start();
	$title = $_POST['title'];
	if($title == '') { echo "error"; } else {
	$author = $_SESSION['id'];
	$insert = mysql_query("INSERT INTO playlists (playlist_name, playlist_author) VALUES ('".$title."', '".$author."')");
	$select = mysql_query("SELECT * FROM playlists WHERE playlist_author='".$author."' and playlist_status='1' ORDER BY id DESC");
	while($playlists = mysql_fetch_array($select)) {
			echo '<tr class="playlist_tr" id="playlist_id_'.$playlists['id'].'">
					<td style="float: left;"><a href="'.WEBSITE_URL.'/play?view=playlist&id='.$playlists['id'].'" class="playlist_title">'.$playlists['playlist_name'].'</a></td>
    				<td style="float: right;"><span playlist_id="'.$playlists['id'].'" class="remove_x"></span></td>
				</tr>';
	}
	}
}

if($_REQUEST['newstar'] == 'remove_playlist') {
	$playlist_id = $_POST['id'];
	$insert = mysql_query("UPDATE playlists SET playlist_status='0' WHERE id='".$playlist_id."'");
}

?>