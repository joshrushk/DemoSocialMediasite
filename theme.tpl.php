<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta name="viewport" content="user-scalable=no, width=device-width, initial-scale=1.0, maximum-scale=1.0">
<? if($_REQUEST['view'] == 'play') { ?>
<?  $cal = $_REQUEST['cal'];
	$a = @simplexml_load_file("https://gdata.youtube.com/feeds/api/videos/$cal"); ?>
<title><? echo $a->title; ?></title>
<meta name="description" content="<? echo $a->title; ?>">
<meta name="keywords" content="<? echo str_replace(" ", ",", strip_tags(trim($a->title))); ?>">
<? } else { ?>
<title><? echo $settings['title']; ?></title>
<meta name="description" content="<? echo $settings['description']; ?>">
<meta name="keywords" content="<? echo $settings['keywords']; ?>">
<? } ?>
<link rel="stylesheet" type="text/css" href="<? echo WEBSITE_URL; ?>/themes/default/main.css" />
<script type='text/javascript' src='http://code.jquery.com/jquery-1.11.1.js'></script>
</head>

<body <?php if($_GET['cal']) { ?>onload="play('<?=$_GET['cal'];?>');mylist();"<?php } ?>>

<div id="header">
<div class="wrapper">
	<div class="topmenu">
		<ul>
			<li><a href="<? echo WEBSITE_URL; ?>/" <? if($_SESSION['username'] != '') { ?> style="font-size: 13px;"<? } ?>><? echo $LANG['TITLE_HOME']; ?></a></li>
			<li><a href="<? echo WEBSITE_URL; ?>/?view=top&top=playlists" <? if($_SESSION['username'] != '') { ?> style="font-size: 13px;"<? } ?>><? echo $LANG['TITLE_TOP_PLAYLIST']; ?></a></li>
			<? if($_SESSION['username'] != '') { ?>
				<? if($members['admin'] == '1') { ?><li><a href="<? echo WEBSITE_URL; ?>/play?view=admin" <? if($_SESSION['username'] != '') { ?> style="font-size: 13px; font-weight: bold;"<? } ?>>ADMIN</a></li><? } ?>
				<li><a href="<? echo WEBSITE_URL; ?>/play?view=profile&sub_view=profile" <? if($_SESSION['username'] != '') { ?> style="font-size: 13px; font-weight: bold;"<? } ?>><? echo $LANG['TITLE_EDIT_PROFILE']; ?></a></li>
				<li><a href="<? echo WEBSITE_URL; ?>/play?view=profile&sub_view=logout" <? if($_SESSION['username'] != '') { ?> style="font-size: 13px; font-weight: bold;"<? } ?>><? echo $LANG['TITLE_LOGOUT']; ?></a></li>
			<? } ?>
		</ul>
	</div>
	<div <? if($_SESSION['username'] != '') { ?>id="responsive_headers_button"<? } ?> class="headers_button">
	<? if($_SESSION['username'] == '') { ?>
    	<a href="#newstar_login" class="header_button" id="newstar_modal" style="right: 20px; background: #0B79F1;"><? echo $LANG['TITLE_LOGIN']; ?></a>
        <a href="#newstar_register" class="header_button" id="register_newstar_modal" style="text-indent: 24px;"><? echo $LANG['TITLE_REGISTER']; ?></a>
	<? } else { ?>
		<a href="#newstar_playlists" class="header_button" id="newstar_modal" style="width: 160px; right: 20px; background: #0B79F1;"><? echo $LANG['TITLE_MY_PLAYLISTS']; ?></a>
        <a href="<? echo WEBSITE_URL; ?>/play?view=bookmarks" class="header_button" style="width: 160px; text-indent: 24px;"><? echo $LANG['TITLE_MY_BOOKMARKS']; ?></a>
	<? } ?>
    </div>
</div>
</div>


<div class="wrapper" <? if($_REQUEST['view'] == 'play') { ?> id="wrapper" style="padding-bottom: 36px;"<? } else { ?> style="padding-bottom: 36px;"<? } ?>><div>
<?php
include($_SERVER['DOCUMENT_ROOT'].'/themes/default/template/'.$view.'.tpl.php');
?>
</div></div>


<footer>
  <div class="wrapper">
    			<div class="left-side float-left">
					<p class="float-left off-white-text"><? echo FOOTER_TITLE; ?></p>
				</div>
				
				<div class="right-side float-right">
					<ul class="horizontal">
						<li>
							<a href="<? echo FACEBOOK_PAGE; ?>" target="_blank" class="icon-link"><img src="<? echo WEBSITE_URL; ?>/themes/default/images/icon-twitter.png"></a>
						</li>
						<li>
							<a href="<? echo TWITTER_PAGE; ?>" target="_blank" class="icon-link"><img src="<? echo WEBSITE_URL; ?>/themes/default/images/icon-fb.png"></a>
						</li>
					</ul>
				</div>
  </div>
</footer>

<? if($_SESSION['username'] == '') { ?>
<div id="newstar_login" class="modal_box" style="display:none;">
<div style="padding: 0px 110px;"><h1 style="font-size: 28px;"><? echo $LANG['TITLE_LOGIN']; ?></h1></div>
    <form class="pure-form" action="" method="POST" style="padding-bottom: 20px;">
		<center style="width: 297px;"><span id="error-message-newstar" style="color: #ed0016; font-size: 15px; text-align: center;">Error!</span></center>
    	<fieldset class="pure-group">
        	<input type="text" id="newstar-username" class="pure-input-1-2" placeholder="<? echo $LANG['TITLE_USERNAME']; ?>">
        	<input type="password" id="newstar-password" class="pure-input-1-2" placeholder="<? echo $LANG['TITLE_PASSWORD']; ?>">
        </fieldset>
    	<input id="newstar_login_button" type="submit" name="submit" class="pure-button pure-input-1-2 pure-button-primary" value="<? echo $LANG['TITLE_SIGNIN']; ?>">
	</form>
</div>
<div id="newstar_register" class="modal_box" style="display:none;">
<div style="padding: 0px 90px;"><h1 style="font-size: 28px;"><? echo $LANG['TITLE_REGISTER']; ?></h1></div>
    <form class="pure-form" action="" method="POST" style="padding-bottom: 20px;">
		<center style="width: 297px;"><span id="register-error-message-newstar" style="display: none; color: #ed0016; font-size: 15px; text-align: center;">Error!</span></center>
    	<fieldset class="pure-group">
        	<input type="text" id="register-newstar-username" class="pure-input-1-2" placeholder="<? echo $LANG['TITLE_USERNAME']; ?>">
			<input type="email" id="register-newstar-email" class="pure-input-1-2" placeholder="<? echo $LANG['TITLE_EMAIL']; ?>">
        	<input type="password" id="register-newstar-password" class="pure-input-1-2" placeholder="<? echo $LANG['TITLE_PASSWORD']; ?>">
        </fieldset>
    	<input id="register_newstar_login_button" type="submit" name="submit" class="pure-button pure-input-1-2 pure-button-primary" value="<? echo $LANG['TITLE_REGISTER']; ?>">
	</form>
</div>
<? } else { ?>
<div id="newstar_playlists" class="modal_box" style="display:none;">
    <span class="create_new_playlist">
        <span class="playlist_input">
		<form class="pure-form">
            <input class="new-playlist-title" name="playlist_name" placeholder="<? echo $LANG['TITLE_ENTER_NEW_PLAYLIST']; ?>" maxlength="150" dir="" required>
            <input id="create_playlist" type="submit" value="<? echo $LANG['TITLE_CREATE']; ?>" name="create_playlist">
		</form>
        </span>
    </span>
	<span class="my_playlists">
	<?  $playlists_sql = mysql_query("SELECT * FROM playlists WHERE playlist_author='".$members['id']."' and playlist_status='1' ORDER BY id DESC");
		if(mysql_num_rows($playlists_sql == 0)) { ?>
		<table id="playlists-table" style="display: none;">
			<tbody class="playlists-table-content">
			</tbody>
		</table>
		<span class="no_playlist"><? echo $LANG['TITLE_NO_PLAYLISTS']; ?></span>
	<?  } else {  ?>
		<table id="playlists-table">
			<tbody class="playlists-table-content">
			<?  while($playlists = mysql_fetch_array($playlists_sql)) {	?>
				<tr class="playlist_tr" id="playlist_id_<? echo $playlists['id']; ?>">
					<td style="float: left;"><a href="<? echo WEBSITE_URL; ?>/play?view=playlist&id=<? echo $playlists['id']; ?><? if($_REQUEST['cal'] != '') { ?>&video_id=<? echo $_REQUEST['cal']; ?><? } ?>" class="playlist_title"><? echo $playlists['playlist_name']; ?></a></td>
    				<td style="float: right;"><span playlist_id="<? echo $playlists['id']; ?>" class="remove_x"></span></td>
				</tr>
			<?  }  ?>
			</tbody>
		</table>
	<?  }  ?>
	</span>
</div>
<? } ?>


<script type="text/javascript">var switchTo5x=true;</script>
<script type="text/javascript" src="http://w.sharethis.com/button/buttons.js"></script>
<script type="text/javascript">stLight.options({publisher: "3aafca10-ca09-45cc-8187-e15ac5bee405", doNotHash: false, doNotCopy: false, hashAddressBar: false});</script>
<script type="text/javascript" src="<? echo WEBSITE_URL; ?>/themes/default/js/main.js"></script>
<script type="text/javascript" src="<? echo WEBSITE_URL; ?>/themes/default/js/newstar.js"></script>
<script type="text/javascript" src="<? echo WEBSITE_URL; ?>/themes/default/js/base.js"></script>
<script>
$(document).ready(function() {if (window.history && history.pushState) {historyedited = false;$(window).bind('popstate', function(e) {if (historyedited) {loadContent(location.pathname + location.search);}});doPager();}});function doPager() {$('.nav2 a').click(function(e) {e.preventDefault();loadContent($(this).attr('href'));history.pushState(null, null, $(this).attr('href'));historyedited = true;});}function loadContent(url) {$('#Mouse_Results').empty().addClass('loading').load(url + ' .Mouse_Music_Playlist', function() {$('#Mouse_Results').removeClass();doPager();});}document.location='/play?'+'?mouse_search='+document.getElementById('mouse_search').value +'&p='+document.getElementById('p').value;$(document).ready(function(){$("form#mouse_music").submit(function(){if ($("#mouse_music_search_value").val() == ""){hatavar("<?=$LANG['Enter_Search_Name'];?> ",1000); } else { $('.Trending_Videos').remove(); $.ajax({type:'GET',url:'<? echo WEBSITE_URL; ?>/requests/mouse_form.php',data:$("form#mouse_music").serialize(),success: function(res){$('.Trending_Videos').remove();$('.Mouse_Results').html(res);$.scrollTo('.Mouse_Results', 800);},error: function(){$('.Mouse_Results').html("Error. Please Try Again.");}});}return false;});function hatavar(mesaj,sure) {var mesaj;var sure;$.blockUI({message: ''+mesaj,timeout:sure});};});</script>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&appId=694517970611482&version=v2.0";
  fjs.parentNode.insertBefore(js, fjs);
}(document, "script", "facebook-jssdk"));</script>
</body>
</html>